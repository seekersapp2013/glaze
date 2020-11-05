<?php
/*
Event for send notification
type :
    1 = Live Notification, System Notification, Mail Notification, SMS Noticication
    2 = System Notification, Mail Notification, SMS Notification
    3 = Mail Notification
    4 = Live Notitiaction
*/
Event::listen('spot.event', function($pusher,$settings,$data,$type = 1) {
    $persons            =   [];
    if(isset($data['persons'])){
        foreach ($data['persons'] as $person) {
            $persons[]  =   $person;
        }
    }else{
        $responsibility     =   \Spot\Shipment\Models\Settings::get('notifications', true)['responsibility'];
        if(isset($responsibility[$data['type']])){
            $responsible        =   $responsibility[$data['type']];
            if(isset($responsible['departments'])){
                foreach ($responsible['departments'] as $department) {
                    $group  =   \RainLab\User\Models\UserGroup::where('id', $department)->first();
                    //Department Managers
                    if(in_array(3,$responsible)){
                        foreach ($group->users->where('role_id', 3) as $employee) {
                            $persons[]  =   $employee->id;
                        }
                    }
                    //All Department Employees
                    if(in_array(4,$responsible)){
                        foreach ($group->users as $employee) {
                            $persons[]  =   $employee->id;
                        }
                    }
                }
                unset($responsible['departments']);
            }
            if(isset($responsible['employees'])){
                foreach ($responsible['employees'] as $employee) {
                    $persons[]  =   $employee;
                }
                unset($responsible['employees']);
            }
            if(in_array(1,$responsible)){
                $administrators  =   \RainLab\User\Models\User::where('role_id', 1)->get();
                foreach ($administrators as $administrator) {
                    $persons[]  =   $administrator->id;
                }
            }
            if(in_array(2,$responsible)){
                $supervisors  =   \RainLab\User\Models\User::where('role_id', 2)->get();
                foreach ($supervisors as $supervisor) {
                    $persons[]  =   $supervisor->id;
                }
            }
            if(in_array(6,$responsible)){
                if(isset($data['shipping_sender'])){
                    $persons[]  =   $data['shipping_sender'];
                }
            }
            if(in_array(7,$responsible)){
                if(isset($data['shipping_receiver'])){
                    $persons[]  =   $data['shipping_receiver'];
                }
            }
            if(in_array(8,$responsible)){
                if(isset($data['shipping_responsible'])){
                    $persons[]  =   $data['shipping_responsible'];
                }
            }
        }
    }

    foreach ($persons as $person) {
        //Check if user setting needs to get email notification and sound notification $data['sound'] = true/false
        //Check if setting enabled sms and live notifications or not
        $data['sound']          =   true;
        $data['for_userid']     =   $person;
        //Live Notification
        if(($type == 1 or $type == 4 )&& \Spot\Shipment\Models\Settings::get('notifications', true)['live'] == 1){
            $pusher->trigger('spotlayer', 'notification', $data);
        }
        //Mail Notification
        if($type == 1 or $type == 2 or $type == 3){

            $subject                    =   $data['subject'];
            $sender                     =   $data['sender'];
            $template                   =   'notification';
            $notification_receiver      =   \RainLab\User\Models\User::find($person);
            if($notification_receiver->email && $notification_receiver->email != '' && $notification_receiver->email != null){
                $templateParameters         =   [
                                                   'name'       => $notification_receiver->name,
                                                   'link'       => $data['url'],
                                                   'content'    => $data['message']
                                               ];

                \Mail::send($template, $templateParameters, function($message) use ($subject, $notification_receiver, $sender) {
                    $company                =   \Spot\Shipment\Models\Settings::get('company', true);
                    $message->from($company['primary_email'], $company['title']);
                    if($sender->email){
                        $message->sender($sender->email, $sender->name);
                    }else{
                        $message->sender($company['primary_email'], $sender->name);
                    }
                    $message->to($notification_receiver->email, $notification_receiver->name);
                    if($sender->email){
                        $message->replyTo($sender->email, $sender->name);
                    }else{
                        $message->replyTo($company['primary_email'], $sender->name);
                    }
                    $message->subject($subject);
                });
            }
        }
        //System Notification
        if($type == 1 or $type == 2){
            $notification_receiver  = \RainLab\User\Models\User::find($person);
            $notification_receiver->notifications()->create([
                'id'            => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'event_type'    => $data['type'],
                'icon'          => $data['icon'],
                'type'          => $data['type'],
                'body'          => $data['subject'],
                'data'          => array(
                                        'sender'    =>  $data['sender'],
                                        'item'      =>  $data['item'],
                                        'url'       =>  $data['url'],
                                        'badge'     =>  $data['badge'],
                                    ),
            ]);

            if(\Tiipiik\SmsSender\Models\Setting::get('enable')   ==  1 && $notification_receiver->mobile){
                \Tiipiik\SmsSender\Classes\Sender::sendMessage($notification_receiver->mobile, $data['subject'].' '.$settings->tracking['prefix_order'].$data['item']->number);
            }
        }
    }
    return true;
});
