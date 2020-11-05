<?php

use RainLab\User\Models\User as UserModel;

Route::get('/', function () {
    return Redirect::to('dashboard');
});


Route::group(['prefix' => 'api'], function() {
    /********************************************/
    /*              WEBSERVICES                 */
    /********************************************/
    Route::post('webservices/clientlogin', function (Request $request) {
        $credentials = [
            'username' => Request::get('username'),
            'password' => Request::get('password'),
        ];

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $userModel = JWTAuth::authenticate($token);

        $user = [
            'id' => $userModel->id,
            'name' => $userModel->name,
            'surname' => $userModel->surname,
            'username' => $userModel->username,
            'email' => $userModel->email,
            'phone' => $userModel->phone,
            'gender' => $userModel->gender,
            'mobile' => $userModel->mobile,
            'language' => (($userModel->language) ? $userModel->language : \Spot\Shipment\Models\Settings::get('language', true)),
        ];
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token', 'user'));
    });
    Route::post('webservices/clientregister', function () {
        $credentials = Input::only('email', 'password', 'password_confirmation', 'name','mobile','username');

        try {
            $userModel = UserModel::create($credentials);
            $userModel->update(['role_id'   =>  5,  'is_activated'   =>  1,  'activated_at'  =>  \Carbon\Carbon::now()]);

            $subitem                    = new \Spot\Shipment\Models\Address;
            $subitem->user_id           = $userModel->id;
            $subitem->name              = Request::get('address_name');
            $subitem->street            = Request::get('address_name');
            $subitem->lat               = ((Request::get('lat')) ? Request::get('lat') : null);
            $subitem->lng               = ((Request::get('lng')) ? Request::get('lng') : null);
            $subitem->county            = Request::get('area_id');
            $subitem->city              = Request::get('city_id');
            $subitem->zipcode           = ((Request::get('postal_code')) ? Request::get('postal_code') : null);
            $subitem->state             = Request::get('state_id');
            $subitem->country           = Request::get('country_id');
            $subitem->default           = 1;
            $subitem->created_at        = \Carbon\Carbon::now();
            $subitem->updated_at        = \Carbon\Carbon::now();
            $subitem->save();

            $user = [
                'id' => $userModel->id,
                'name' => $userModel->name,
                'surname' => $userModel->surname,
                'username' => $userModel->username,
                'email' => $userModel->email,
                'phone' => $userModel->phone,
                'gender' => $userModel->gender,
                'mobile' => $userModel->mobile,
                'language' => (($userModel->language) ? $userModel->language : \Spot\Shipment\Models\Settings::get('language', true)),
            ];

        } catch (Exception $e) {
            return Response::json(['error' => $e->getMessage()], 401);
        }

        $token = JWTAuth::fromUser($userModel);

        return Response::json(compact('token', 'user'));
    });
    Route::get('webservices/offices', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \Spot\Shipment\Models\Office::get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/addresses', function (\Request $request) {
        $token      =   Request::get('token');
        $user       =   JWTAuth::authenticate($token);
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }
        $items      =   \Spot\Shipment\Models\Address::where('user_id', Request::get('user_id'))->get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->name,
                            'default'   =>  $item->default,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/packages', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \Spot\Shipment\Models\Packaging::get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/countries', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \RainLab\Location\Models\Country::where('is_enabled', true)->get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                            'code'      =>  $item->code,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/regions', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \RainLab\Location\Models\State::where('country_id',Request::get('country_id'))->get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                            'code'      =>  $item->code,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/cities', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \Spot\Shipment\Models\City::where('state_id',Request::get('state_id'))->get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/areas', function (\Request $request) {
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        $items      =   \Spot\Shipment\Models\Area::where('city_id',Request::get('city_id'))->get();
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            'id'        =>  $item->id,
                            'name'      =>  $item->lang($language)->name,
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::get('webservices/shipment', function (\Request $request) {
        //$token      =   Request::get('token');
        //$user       =   JWTAuth::authenticate($token);
        $language   =   ((Request::get('lang')) ? Request::get('lang') : \Spot\Shipment\Models\Settings::get('language', true));
        /*
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }
        */
        if(Request::get('id')){
            $item       =   \Spot\Shipment\Models\Order::where('id', Request::get('id'))->first();
        }else{
            $number     =   str_replace(\Spot\Shipment\Models\Settings::get('tracking', true)['prefix_order'],'',Request::get('number'));
            $item       =   \Spot\Shipment\Models\Order::where('number', $number)->first();
        }
        if(!$item){
            return response()->json(['error' => 'not_found'], 500);
        }
        $array      =   [
                            "id"                    =>   $item->id,
                            "office"                =>   array(
                                                            'id'        =>  $item->office_id,
                                                            'name'      =>  $item->office->lang($language)->name,
                                                        ),
                            "number"                =>   \Spot\Shipment\Models\Settings::get('tracking', true)['prefix_order'].$item->number,
                            "type"                  =>   $item->type,
                            "sender"                =>   array(
                                                            'id'        =>  $item->sender_id,
                                                            'name'      =>  $item->sender->name,
                                                            'mobile'    =>  $item->sender->mobile,
                                                        ),
                            "sender_address"        =>   array(
                                                            'id'        =>  $item->sender_address_id,
                                                            'address'   =>  $item->sender_address->street.' '.$item->sender_address->area->lang($language)->name.' '.$item->sender_address->thecity->lang($language)->name.' '.$item->sender_address->thestate->lang($language)->name.' '.$item->sender_address->thecountry->lang($language)->name,
                                                            'lat'       =>  $item->sender_address->lat,
                                                            'lng'       =>  $item->sender_address->lng,
                                                        ),
                            "packaging"             =>   array(
                                                            'id'        =>  $item->packaging_id,
                                                            'name'      =>  $item->packaging->lang($language)->name,
                                                        ),
                            "ship_date"             =>   \Carbon\Carbon::parse($item->ship_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "receive_date"          =>   \Carbon\Carbon::parse($item->receive_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "courier"               =>   (($item->courier_id) ? $item->courier->lang($language)->name : null),
                            "delivery_time"         =>   $item->deliverytime->lang($language)->name,
                            "delivery_date"         =>   \Carbon\Carbon::parse($item->delivery_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "mode"                  =>   (($item->mode_id) ? $item->mode->lang($language)->name : null),
                            "status"                =>   $item->status->lang($language)->name,
                            "tax"                   =>   $item->tax,
                            "insurance"             =>   $item->insurance,
                            "currency_id"           =>   $item->currency->lang($language)->name,
                            "payment_type"          =>   $item->payment_type,
                            "customs_value"         =>   Currency::format($item->customs_value),
                            "courier_fee"           =>   Currency::format($item->courier_fee),
                            "package_fee"           =>   $item->package_fee,
                            "return_package_fee"    =>   $item->return_package_fee,
                            "return_courier_fee"    =>   $item->return_courier_fee,
                            "return_defray"         =>   $item->return_defray,
                            "created_at"            =>   \Carbon\Carbon::parse($item->created_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "updated_at"            =>   \Carbon\Carbon::parse($item->updated_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "requested"             =>   $item->requested,
                            "barcode"               =>   $item->number
                        ];
        if($item->manifest_id){
            $array["manifest"]                      =   array(
                                                            'id'        =>  $item->manifest_id,
                                                        );
        }
        if($item->assigned_id){
            $array["assigned"]                      =   array(
                                                            'id'        =>  $item->assigned_id,
                                                        );
        }
        if($item->receiver_id){
            $array["receiver"]                      =   array(
                                                            'id'        =>  $item->receiver_id,
                                                            'name'      =>  $item->receiver->name,
                                                            'mobile'    =>  $item->receiver->mobile,
                                                        );
            $array["receiver_address"]              =   array(
                                                            'id'        =>  $item->receiver_address_id,
                                                            'address'   =>  $item->receiver_address->street.' '.$item->receiver_address->area->lang($language)->name.' '.$item->receiver_address->thecity->lang($language)->name.' '.$item->receiver_address->thestate->lang($language)->name.' '.$item->receiver_address->thecountry->lang($language)->name,
                                                            'lat'       =>  $item->receiver_address->lat,
                                                            'lng'       =>  $item->receiver_address->lng,
                                                        );
        }

        return response()->json($array);
    });
    Route::get('webservices/shipments', function (\Request $request) {
        $token      =   Request::get('token');
        $user       =   JWTAuth::authenticate($token);
        $language   =   (($user->language) ? $user->language : \Spot\Shipment\Models\Settings::get('language', true));
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }

        $items      =   \Spot\Shipment\Models\Order::where(function($q) use($user){
                            $q->where('sender_id', $user->id);
                            $q->orWhere('receiver_id', $user->id);
                        })->get();
        $items       =   \Spot\Shipment\Models\Order::get();
        if(!$items){
            return response()->json(['error' => 'not_found'], 500);
        }
        $array      =   [];
        foreach($items as $item){
            $item   =   array(
                            "id"                    =>   $item->id,
                            "office"                =>   array(
                                                            'id'        =>  $item->office_id,
                                                            'name'      =>  $item->office->lang($language)->name,
                                                        ),
                            "number"                =>   \Spot\Shipment\Models\Settings::get('tracking', true)['prefix_order'].$item->number,
                            "type"                  =>   $item->type,
                            "sender"                =>   array(
                                                            'id'        =>  $item->sender_id,
                                                            'name'      =>  $item->sender->name,
                                                            'mobile'    =>  $item->sender->mobile,
                                                        ),
                            "sender_address"        =>   array(
                                                            'id'        =>  $item->sender_address_id,
                                                            'address'   =>  $item->sender_address->street.' '.$item->sender_address->area->lang($language)->name.' '.$item->sender_address->thecity->lang($language)->name.' '.$item->sender_address->thestate->lang($language)->name.' '.$item->sender_address->thecountry->lang($language)->name,
                                                            'lat'       =>  $item->sender_address->lat,
                                                            'lng'       =>  $item->sender_address->lng,
                                                        ),
                            "packaging"             =>   array(
                                                            'id'        =>  $item->packaging_id,
                                                            'name'      =>  $item->packaging->lang($language)->name,
                                                        ),
                            "ship_date"             =>   \Carbon\Carbon::parse($item->ship_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "receive_date"          =>   \Carbon\Carbon::parse($item->receive_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "courier"               =>   (($item->courier_id) ? $item->courier->lang($language)->name : null),
                            "delivery_time"         =>   $item->deliverytime->lang($language)->name,
                            "delivery_date"         =>   \Carbon\Carbon::parse($item->delivery_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "mode"                  =>   (($item->mode_id) ? $item->mode->lang($language)->name : null),
                            "status"                =>   $item->status->lang($language)->name,
                            "tax"                   =>   $item->tax,
                            "insurance"             =>   $item->insurance,
                            "currency_id"           =>   $item->currency->lang($language)->name,
                            "payment_type"          =>   $item->payment_type,
                            "customs_value"         =>   Currency::format($item->customs_value),
                            "courier_fee"           =>   Currency::format($item->courier_fee),
                            "package_fee"           =>   $item->package_fee,
                            "return_package_fee"    =>   $item->return_package_fee,
                            "return_courier_fee"    =>   $item->return_courier_fee,
                            "return_defray"         =>   $item->return_defray,
                            "created_at"            =>   \Carbon\Carbon::parse($item->created_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "updated_at"            =>   \Carbon\Carbon::parse($item->updated_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "requested"             =>   $item->requested,
                            "barcode"               =>   $item->number
                        );
            array_push($array, $item);
        }
        return response()->json($array);
    });
    Route::post('webservices/clientcreateorder', function (\Request $request) {
        $token      =   Request::get('token');
        $user       =   JWTAuth::authenticate($token);
        $language   =   (($user->language) ? $user->language : \Spot\Shipment\Models\Settings::get('language', true));
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }


        $settings       =   \Spot\Shipment\Models\Settings::instance();
        $number = '';
        for($x = 0; $x <= $settings['tracking']['numbers_order']; $x++){
            $number .= '0';
        }
        $number .= \Spot\Shipment\Models\Order::withTrashed()->max('number')+1;
        $number = substr($number, -$settings['tracking']['numbers_order']);

        $data['number']                 =   $number;

        $data['sender_id']              =   $user->id;

        if(Request::get('type')   ==   1) {
            $delivery_cost  =   $settings['fees']['pickup_cost'];
        }else{
            $delivery_cost  =   $settings['fees']['delivery_cost'];
        }
        $return_courier_fee     =   null;

        if(Request::get('return_defray') && Request::get('return_defray') != ''){
            if(Request::get('return_package_fee')  ==  1){
                $return_courier_fee  =   $settings['fees']['delivery_cost_back_receiver'];
            }else{
                $return_courier_fee  =   $settings['fees']['delivery_cost_back_sender'];
            }
        }

        if(Request::get('receiver_address_id') && Request::get('receiver_address_id')   !=   '') {
            $sender_address_id      =   \Spot\Shipment\Models\Address::find(Request::get('sender_address_id'));
            $receiver_address_id    =   \Spot\Shipment\Models\Address::find(Request::get('receiver_address_id'));

            $fees   =   \Spot\Shipment\Models\Fees::where('from',$sender_address_id->county)->where('to',$receiver_address_id->county)->where('type',4)->first();
            if(!$fees){
                $fees   =   \Spot\Shipment\Models\Fees::where('from',$sender_address_id->city)->where('to',$receiver_address_id->city)->where('type',3)->first();
                if(!$fees){
                    $fees   =   \Spot\Shipment\Models\Fees::where('from',$sender_address_id->state)->where('to',$receiver_address_id->state)->where('type',2)->first();
                    if(!$fees){
                        $fees   =   \Spot\Shipment\Models\Fees::where('from',$sender_address_id->country)->where('to',$receiver_address_id->country)->where('type',1)->first();
                    }
                }
            }

            if($fees){
                if(Request::get('type')   ==   1) {
                    $delivery_cost  =   $fees->pickup_cost;
                }else{
                    $delivery_cost  =   $fees->delivery_cost;
                }
                if($fees->packaging == 1 && Request::get('packaging_id') && Request::get('packaging_id') != ''){
                    foreach($fees->packaging_fees as $package_fee   =>  $value){
                        if($package_fee ==  Request::get('packaging_id')){
                            $delivery_cost  +=   $value;
                        }
                    }
                }
                if(Request::get('return_defray') && Request::get('return_defray') != ''){
                    if(Request::get('return_package_fee')  ==  1){
                        $return_courier_fee  =   $fees->delivery_cost_back_receiver;
                    }else{
                        $return_courier_fee  =   $fees->delivery_cost_back_sender;
                    }
                }
            }

        }

        $data['return_courier_fee']     =   $return_courier_fee;
        $data['courier_fee']            =   $delivery_cost;
        $data['tax']                    =   $settings['taxes']['percent'];
        $data['insurance']              =   $settings['taxes']['insurance'];
        $data['customs_value']          =   0;
        $data['status_id']              =   $settings['tracking']['default_status'];
        $data['delivery_time_id']       =   $settings['tracking']['default_deliverytime'];


        $item                   = new \Spot\Shipment\Models\Order;
        $item->sender_id        = $user->id;
        $item->sender_address_id= Request::get('sender_address_id');
        $item->type             = Request::get('type');
        $item->packaging_id     = Request::get('packaging_id');
        $item->office_id        = Request::get('office_id');
        $item->ship_date        = \Carbon\Carbon::parse(Request::get('ship_date'));

        if(Request::get('type')    ==  2){
            $item->receiver_id              = Request::get('receiver_id');
            $item->receiver_address_id      = Request::get('receiver_address_id');
        }
        $item->payment_type     = Request::get('payment_type');
        if(Request::get('return_defray') && Request::get('return_defray') != '' && Request::get('return_defray') != 2){
            $item->return_defray    = Request::get('return_defray');
            $item->package_fee      = Request::get('package_fee');
            $item->return_package_fee= Request::get('return_package_fee');
            $item->return_courier_fee= $data['return_courier_fee'];
        }
        $item->number           = $data['number'];
        $item->tax              = $data['tax'];
        $item->insurance        = $data['insurance'];
        $item->customs_value    = $data['customs_value'];
        $item->courier_fee      = $data['courier_fee'];
        $item->delivery_time_id = $data['delivery_time_id'];
        $item->status_id        = $data['status_id'];
        $item->currency_id      = \Responsiv\Currency\Models\Currency::where('is_primary', 1)->first()->id;
        $item->channel          = 'mobile';
        $item->created_at       = \Carbon\Carbon::now();
        $item->updated_at       = \Carbon\Carbon::now();
        $item->barcode          = $data['number'];
        $item->save();

        $shipdate               = \Carbon\Carbon::parse($item->ship_date);
        $deliverydate           = $shipdate->addHours($item->deliverytime->count);
        $item->delivery_date    = $deliverydate;
        $item->update();

        if(Request::get('items') && Request::get('items') != '' && !empty(Request::get('items'))){
            foreach(Request::get('items') as $shipping_item){
                $subitem                    = new \Spot\Shipment\Models\Item;
                $subitem->order_id          = $item->id;
                $subitem->category_id       = $shipping_item['category_id'];
                $subitem->description       = $shipping_item['description'];
                $subitem->quantity          = $shipping_item['quantity'];
                $subitem->weight            = $shipping_item['weight'];
                $subitem->length            = $shipping_item['length'];
                $subitem->width             = $shipping_item['width'];
                $subitem->height            = $shipping_item['height'];
                $subitem->save();
            }
        }


        $theme_code     = \Cms\Classes\Theme::getActiveThemeCode();
        $theme          = \Cms\Classes\Theme::load($theme_code);
        $translator     = \RainLab\Translate\Classes\Translator::instance();
        $currentLang    = $translator->getLocale();
        $theme_lang     = $theme->getConfigArray('translate')[$currentLang];

        $event_data =   array(
            'sender'    =>  $user,
            'item'      =>  $item,
            'type'      =>  'new_shipments',
            'thumb'     =>  'icon',
            'icon'      =>  'flaticon-gift',
            'subject'   =>  $theme_lang['new_shipments'],
            'message'   =>  $theme_lang['new_shipments'],
            'url'       =>  url('dashboard/shipments/'.$item->id.'/view'),
            'badge'     =>  'success',
        );

        $activity                   = new \Spot\Shipment\Models\Activity;
        $activity->user_id          = $user->id;
        $activity->order_id         = $item->id;
        $activity->description      = 'created';
        $activity->created_at       = \Carbon\Carbon::now();
        $activity->updated_at       = \Carbon\Carbon::now();
        $activity->save();


        $array      =   [
                            "id"                    =>   $item->id,
                            "office"                =>   array(
                                                            'id'        =>  $item->office_id,
                                                            'name'      =>  $item->office->lang($language)->name,
                                                        ),
                            "number"                =>   \Spot\Shipment\Models\Settings::get('tracking', true)['prefix_order'].$item->number,
                            "type"                  =>   $item->type,
                            "sender"                =>   array(
                                                            'id'        =>  $item->sender_id,
                                                            'name'      =>  $item->sender->name,
                                                            'mobile'    =>  $item->sender->mobile,
                                                        ),
                            "sender_address"        =>   array(
                                                            'id'        =>  $item->sender_address_id,
                                                            'address'   =>  $item->sender_address->street.' '.$item->sender_address->area->lang($language)->name.' '.$item->sender_address->thecity->lang($language)->name.' '.$item->sender_address->thestate->lang($language)->name.' '.$item->sender_address->thecountry->lang($language)->name,
                                                            'lat'       =>  $item->sender_address->lat,
                                                            'lng'       =>  $item->sender_address->lng,
                                                        ),
                            "packaging"             =>   array(
                                                            'id'        =>  $item->packaging_id,
                                                            'name'      =>  $item->packaging->lang($language)->name,
                                                        ),
                            "ship_date"             =>   \Carbon\Carbon::parse($item->ship_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "receive_date"          =>   \Carbon\Carbon::parse($item->receive_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "courier"               =>   (($item->courier_id) ? $item->courier->lang($language)->name : null),
                            "delivery_time"         =>   $item->deliverytime->lang($language)->name,
                            "delivery_date"         =>   \Carbon\Carbon::parse($item->delivery_date)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "mode"                  =>   (($item->mode_id) ? $item->mode->lang($language)->name : null),
                            "status"                =>   $item->status->lang($language)->name,
                            "tax"                   =>   $item->tax,
                            "insurance"             =>   $item->insurance,
                            "currency_id"           =>   $item->currency->lang($language)->name,
                            "payment_type"          =>   $item->payment_type,
                            "customs_value"         =>   Currency::format($item->customs_value),
                            "courier_fee"           =>   Currency::format($item->courier_fee),
                            "package_fee"           =>   $item->package_fee,
                            "return_package_fee"    =>   $item->return_package_fee,
                            "return_courier_fee"    =>   $item->return_courier_fee,
                            "return_defray"         =>   $item->return_defray,
                            "created_at"            =>   \Carbon\Carbon::parse($item->created_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "updated_at"            =>   \Carbon\Carbon::parse($item->updated_at)->format(\Spot\Shipment\Models\Settings::get('dateformat', true)),
                            "requested"             =>   $item->requested,
                            "barcode"               =>   $item->number
                        ];
        if($item->manifest_id){
            $array["manifest"]                      =   array(
                                                            'id'        =>  $item->manifest_id,
                                                        );
        }
        if($item->assigned_id){
            $array["assigned"]                      =   array(
                                                            'id'        =>  $item->assigned_id,
                                                        );
        }
        if($item->receiver_id){
            $array["receiver"]                      =   array(
                                                            'id'        =>  $item->receiver_id,
                                                            'name'      =>  $item->receiver->name,
                                                            'mobile'    =>  $item->receiver->mobile,
                                                        );
            $array["receiver_address"]              =   array(
                                                            'id'        =>  $item->receiver_address_id,
                                                            'address'   =>  $item->receiver_address->street.' '.$item->receiver_address->area->lang($language)->name.' '.$item->receiver_address->thecity->lang($language)->name.' '.$item->receiver_address->thestate->lang($language)->name.' '.$item->receiver_address->thecountry->lang($language)->name,
                                                            'lat'       =>  $item->receiver_address->lat,
                                                            'lng'       =>  $item->receiver_address->lng,
                                                        );
        }

        return response()->json($array);
    });
    Route::post('webservices/createaddress', function (\Request $request) {
        $token      =   Request::get('token');
        $user       =   JWTAuth::authenticate($token);
        $language   =   (($user->language) ? $user->language : \Spot\Shipment\Models\Settings::get('language', true));
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }

        $subitem                    = new \Spot\Shipment\Models\Address;
        $subitem->user_id           = ((Request::get('user_id')) ? Request::get('user_id') : $userModel->id);
        $subitem->name              = Request::get('address_name');
        $subitem->street            = Request::get('address_name');
        $subitem->lat               = ((Request::get('lat')) ? Request::get('lat') : null);
        $subitem->lng               = ((Request::get('lng')) ? Request::get('lng') : null);
        $subitem->county            = Request::get('area_id');
        $subitem->city              = Request::get('city_id');
        $subitem->zipcode           = ((Request::get('postal_code')) ? Request::get('postal_code') : null);
        $subitem->state             = Request::get('state_id');
        $subitem->country           = Request::get('country_id');
        $subitem->created_at        = \Carbon\Carbon::now();
        $subitem->updated_at        = \Carbon\Carbon::now();
        $subitem->save();

        return response()->json($subitem);
    });
    Route::post('webservices/newuser', function (\Request $request) {
        $token      =   Request::get('token');
        $user       =   JWTAuth::authenticate($token);
        $language   =   (($user->language) ? $user->language : \Spot\Shipment\Models\Settings::get('language', true));
        if(!$user){
            return response()->json(['error' => 'not_authorised'], 405);
        }


        $theme_code     = \Cms\Classes\Theme::getActiveThemeCode();
        $theme          = \Cms\Classes\Theme::load($theme_code);
        $translator     = \RainLab\Translate\Classes\Translator::instance();
        $currentLang    = $translator->getLocale();
        $theme_lang     = $theme->getConfigArray('translate')[$currentLang];


        \RainLab\User\Models\User::extend(function($model){
            $myrules['mobile'] = 'required|unique:users';
            $myrules['password'] = 'required';
            $model->rules = $myrules;
            $model->customMessages['mobile.mobile'] = $theme_lang['mobile_already_registered'];
        });
        $item                   = new \RainLab\User\Models\User;
        $item->name             = Request::get('name');
        $password                       = \Hash::make(123);
        $item->password                 = $password;
        $item->password_confirmation    = $password;
        $item->mobile           = Request::get('mobile');
        $item->role_id          = 5;
        $item->created_at       = \Carbon\Carbon::now();
        $item->updated_at       = \Carbon\Carbon::now();
        $item->save();

        $array  =   [
            'id'    =>  $item->id,
            'name'  =>  $item->name,
        ];
        return response()->json($array);
    });
    /********************************************/
    /*              WEBSERVICES                 */
    /********************************************/

    Route::any('uploadcopy/{id}', function(Request $req,$id) {
        $file = new \System\Models\File;
        $file->data = \Input::file('copy');
        $file->save();
        $order  =   \Spot\Shipment\Models\Order::find($id);
        $order->id_copy()->add($file);
    });
    Route::any('translatemessages', function(Request $req) {
        $request = post();

        // TODO: Add a way to translate lang.yaml from the theme file
        $records    =   new \RainLab\Translate\Models\Message;

        if(isset($req->search) && $req['search']['value'] != ''){
            $search     =   $req['search']['value'];
            $records    =   $records->where('code', 'like', "%$search%");
        }
        $count      =   $records->count();
        $records    =   $records->orderBy('id', 'desc')->get();

        $languages      =   \RainLab\Translate\Models\Locale::all();

        $recordsArray   =   array();
        $n  =   0;
        foreach($records as $record){
            if($record->message_data['x'] == ''){
                continue;
            }
            $n++;
            $recordArray   =   array();
            foreach($languages as $lang){
                if(isset($record->message_data[$lang->code])){
                    $recordArray[$lang->name] =   '<label rel="'.$record->id.'" data-language="'.$lang->code.'" class="translate">'.$record->message_data[$lang->code].'</label>';
                }elseif($lang->code == 'en'){
                    $recordArray[$lang->name] =   '<label rel="'.$record->id.'" data-language="'.$lang->code.'" class="translate">'.$record->message_data['x'].'</label>';
                }else{
                    $recordArray[$lang->name] =   '<label rel="'.$record->id.'" data-language="'.$lang->code.'" class="translate"></label>';
                }
            }
            array_push($recordsArray,$recordArray);
        }

        $columnsDefault = [
            'id'               => true,
            'name'             => true,
            'province'         => true,
            'cities'           => true,
            'actions'          => true,
        ];

        if ( isset( $_REQUEST['columnsDef'] ) && is_array( $_REQUEST['columnsDef'] ) ) {
            $columnsDefault = [];
            foreach ( $_REQUEST['columnsDef'] as $field ) {
                $columnsDefault[ $field ] = true;
            }
        }

        // get all raw data
        $alldata = $recordsArray;

        $data = [];
        // internal use; filter selected columns only from raw data
        foreach ( $alldata as $d ) {
            $data[] = $d;
        }

        // count data
            $totalDisplay = count( $data );
            $totalRecords = $count;


        // sort
        if ( isset( $_REQUEST['order'][0]['column'] ) && $_REQUEST['order'][0]['dir'] ) {
            $column = $_REQUEST['order'][0]['column'];
            $dir    = $_REQUEST['order'][0]['dir'];
            usort( $data, function ( $a, $b ) use ( $column, $dir ) {
                $a = array_slice( $a, $column, 1 );
                $b = array_slice( $b, $column, 1 );
                $a = array_pop( $a );
                $b = array_pop( $b );

                if ( $dir === 'asc' ) {
                    return $a > $b ? true : false;
                }

                return $a < $b ? true : false;
            } );
        }

        // pagination length
        if ( isset( $_REQUEST['length'] ) ) {
            $data = array_splice( $data, $_REQUEST['start'], $_REQUEST['length'] );
        }

        // return array values only without the keys
        if ( isset( $_REQUEST['array_values'] ) && $_REQUEST['array_values'] ) {
            $tmp  = $data;
            $data = [];
            foreach ( $tmp as $d ) {
                $data[] = array_values( $d );
            }
        }

        $secho = 0;
        if ( isset( $_REQUEST['sEcho'] ) ) {
            $secho = intval( $_REQUEST['sEcho'] );
        }

        $result = [
            'iTotalRecords'        => $totalRecords,
            'iTotalDisplayRecords' => $totalDisplay,
            'sEcho'                => $secho,
            'sColumns'             => '',
            'aaData'               => $data,
        ];

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        die(json_encode( $result, JSON_PRETTY_PRINT ));
    });
    Route::any('backups', function(Request $req) {
        $request = post();

        $backups = [];
        $localBackupFiles = array_values(array_diff(scandir(\Panakour\Backup\Models\Settings::getBackupsPath()), ['.', '..']));

        if(isset($req->search) && $req['search']['value'] != ''){
            $search     =   $req['search']['value'];
            $records    =   $records->where('code', 'like', "%$search%");
        }
        $count      =   count($localBackupFiles);
        $recordsArray   =   array();
        $n  =   0;
        foreach ($localBackupFiles as $index => $file) {
            $backups['storage'] = 'Local';
            $backups['fileInfo'] = pathinfo(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file);
            $backups['size'] = ceil(filesize(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file) / 1024);
            $backups['lastModified'] = date('d/m/Y', filemtime(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file));
            array_push($recordsArray,$backups);
        }

        $columnsDefault = [
            'id'               => true,
            'name'             => true,
            'province'         => true,
            'cities'           => true,
            'actions'          => true,
        ];

        if ( isset( $_REQUEST['columnsDef'] ) && is_array( $_REQUEST['columnsDef'] ) ) {
            $columnsDefault = [];
            foreach ( $_REQUEST['columnsDef'] as $field ) {
                $columnsDefault[ $field ] = true;
            }
        }

        // get all raw data
        $alldata = $recordsArray;

        $data = [];
        // internal use; filter selected columns only from raw data
        foreach ( $alldata as $d ) {
            $data[] = $d;
        }

        // count data
            $totalDisplay = count( $data );
            $totalRecords = $count;


        // sort
        if ( isset( $_REQUEST['order'][0]['column'] ) && $_REQUEST['order'][0]['dir'] ) {
            $column = $_REQUEST['order'][0]['column'];
            $dir    = $_REQUEST['order'][0]['dir'];
            usort( $data, function ( $a, $b ) use ( $column, $dir ) {
                $a = array_slice( $a, $column, 1 );
                $b = array_slice( $b, $column, 1 );
                $a = array_pop( $a );
                $b = array_pop( $b );

                if ( $dir === 'asc' ) {
                    return $a > $b ? true : false;
                }

                return $a < $b ? true : false;
            } );
        }

        // pagination length
        if ( isset( $_REQUEST['length'] ) ) {
            $data = array_splice( $data, $_REQUEST['start'], $_REQUEST['length'] );
        }

        // return array values only without the keys
        if ( isset( $_REQUEST['array_values'] ) && $_REQUEST['array_values'] ) {
            $tmp  = $data;
            $data = [];
            foreach ( $tmp as $d ) {
                $data[] = array_values( $d );
            }
        }

        $secho = 0;
        if ( isset( $_REQUEST['sEcho'] ) ) {
            $secho = intval( $_REQUEST['sEcho'] );
        }

        $result = [
            'iTotalRecords'        => $totalRecords,
            'iTotalDisplayRecords' => $totalDisplay,
            'sEcho'                => $secho,
            'sColumns'             => '',
            'aaData'               => $data,
        ];

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        die(json_encode( $result, JSON_PRETTY_PRINT ));
    });
    Route::any('currencies', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Responsiv\Currency\Models\Currency::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('currency_code', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                //"nick"=> ucfirst(substr($record->name,0,2)),
                //"photo"=> (($record->avatar) ? $record->avatar->getThumb(50, 50, 'crop') : ''),
                //"created_at"=> Carbon\Carbon::parse($record->created_at)->format('d/m/Y h:i:s a'),
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'code'              =>  $record->currency_code,
                'is_default'        =>  $record->is_primary,
                'is_enabled'        =>  $record->is_enabled,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('languages', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\Translate\Models\Locale::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('code', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                //"nick"=> ucfirst(substr($record->name,0,2)),
                //"photo"=> (($record->avatar) ? $record->avatar->getThumb(50, 50, 'crop') : ''),
                //"created_at"=> Carbon\Carbon::parse($record->created_at)->format('d/m/Y h:i:s a'),
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'code'              =>  $record->code,
                'is_default'        =>  $record->is_default,
                'is_enabled'        =>  $record->is_enabled,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('notifications', function(Request $req) {
        $request    =   post();
        $page       =   $request['pagination']['page'];
        $perpage    =   $request['pagination']['perpage'];
        $sort       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip       =   intval(($page-1)*$perpage);

        $user       =   \RainLab\User\Models\User::find($request['id']);
        $records    =   $user->notifications();
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy('created_at', 'DESC')->get();


        $theme_code     = \Cms\Classes\Theme::getActiveThemeCode();
        $theme          = \Cms\Classes\Theme::load($theme_code);
        $translator     = \RainLab\Translate\Classes\Translator::instance();
        $currentLang    = $translator->getLocale();
        $theme_lang     = $theme->getConfigArray('translate')[$currentLang];

        $recordsArray   =   array();
        foreach($records as $record){
            $recordArray = array(
                "id"            =>  $record->id,
                "sender"        =>  $record->data['sender']['name'],
                "notification"  =>  $record->body,
                "type"          =>  $record->type,
                "status"        =>  (($record->read_at == null) ? 'new' : 'readed' ),
                "currentLang"        => $currentLang,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));
    });
    Route::any('backups', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $backups = [];
        $localBackupFiles = array_values(array_diff(scandir(\Panakour\Backup\Models\Settings::getBackupsPath()), ['.', '..']));

        $count      =   count($localBackupFiles);

        $recordsArray   =   array();
        foreach ($localBackupFiles as $index => $file) {
            $backups['storage'] = 'Local';
            $backups['fileInfo'] = pathinfo(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file);
            $backups['size'] = ceil(filesize(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file) / 1024);
            $backups['lastModified'] = date('d/m/Y', filemtime(\Panakour\Backup\Models\Settings::getBackupsPath().'/'.$file));
            array_push($recordsArray,$backups);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('departments', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\User\Models\UserGroup::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('code', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'code'              =>  $record->code
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('branches', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Office::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('cars', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Car::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('statuses', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Status::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('categories', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Category::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('couriers', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Courier::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('deliverytimes', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\DeliveryTime::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('shipping', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Mode::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('treasury', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Treasury::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'balance'           =>  Currency::format($record->balance),
                'office'            =>  (($record->office) ? $record->office->name : '-'),
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('packaging', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Packaging::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('countries', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\Location\Models\Country::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('states', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\Location\Models\State::whereHas('country', function($q){
                $q->where('is_enabled', 1);
        })->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'place'             =>  $record->country->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('cities', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\City::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'place'             =>  $record->state->name.', '.$record->state->country->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('areas', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Area::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'place'              =>  $record->city->name.', '.$record->city->state->name.', '.$record->city->state->country->name,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('fees', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Fees::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%");
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            switch ($record->type) {
                case 1:
                    $from_place  =   $record->country_from->name;
                    $to_place  =   $record->country_to->name;
                    break;
                case 2:
                    $from_place  =   $record->state_from->name;
                    $to_place  =   $record->state_to->name;
                    break;
                case 3:
                    $from_place  =   $record->city_from->name;
                    $to_place  =   $record->city_to->name;
                    break;
                case 4:
                    $from_place  =   $record->area_from->name;
                    $to_place  =   $record->area_to->name;
                    break;
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'from'              =>  $from_place,
                'to'                =>  $to_place,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('employees', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\User\Models\User::where('role_id', '!=', 5)->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'email'             =>  $record->email,
                'mobile'            =>  $record->mobile,
                'role'              =>  (($record->role) ? $record->role->name : '-'),
                'groups'            =>  $groups
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('clients', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \RainLab\User\Models\User::where('role_id', 5)->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'name'              =>  $record->name,
                'created_at'        =>  $record->created_at,
                'orders'            =>  $record->orders->count(),
                'wallet'            =>  Currency::format($record->payments->sum('amount')),
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('clienttransactions', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Payment::where('for_id', $request['id'])->where('type', 1)->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'movement'          =>  $record->movement,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'description'       =>  $record->description,
                'amount'            =>  Currency::format($record->amount),
                'payment_with'      =>  $record->payment_with,
                'payment_with_employee'      =>  (($record->gotit) ? $record->gotit->name : '-'),
                'status'            =>  $record->status,
                'date'              =>  $record->date,
                'item_id'           =>  $record->item_id,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('employeetransactions', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Payment::where('payment_with', $request['id'])->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'movement'          =>  $record->movement,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'description'       =>  $record->description,
                'amount'            =>  Currency::format($record->amount),
                'status'            =>  $record->status,
                'date'              =>  $record->date,
                'item_id'           =>  $record->item_id,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('treasurytransactions', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Payment::where('treasury_id', $request['id'])->orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'movement'          =>  $record->movement,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'description'       =>  $record->description,
                'amount'            =>  Currency::format($record->amount),
                'status'            =>  $record->status,
                'date'              =>  $record->date,
                'item_id'           =>  $record->item_id,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('transactions', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Payment::orderBy($field, $sort);


        switch (Auth::getUser()->role_id) {
            case 6:
                $records    =   $records->where(function($q){
                    $q->where(function($q){
                        $q->where('type', 2);
                        $q->whereIn('for_id', Auth::getUser()->manage->pluck('id')->toArray());
                    });
                    $q->orWhere(function($q){
                        $q->whereHas('order', function($q){
                            $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                        });
                    });
                    $q->orWhere(function($q){
                        $q->whereHas('treasury', function($q){
                            $q->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                        });
                    });
                });
                break;
            case 5:
                $records    =   $records->where(function($q){
                    $q->whereHas('order', function($q){
                        $q->where('sender_id', Auth::getUser()->id);
                        $q->orWhere('receiver_id', Auth::getUser()->id);
                    });
                });
                break;
            case 4:
                if(Auth::getUser()->is_superuser){
                    $records    =   $records->where(function($q){
                        $q->where(function($q){
                            $q->where('type', 2);
                            $q->where('for_id', Auth::getUser()->office);
                        });
                        $q->orWhere(function($q){
                            $q->whereHas('order', function($q){
                                $q->where('office_id', Auth::getUser()->office);
                            });
                        });
                        $q->orWhere(function($q){
                            $q->whereHas('treasury', function($q){
                                $q->where('office_id', Auth::getUser()->office);
                            });
                        });
                    });
                }else{
                    $records    =   $records->where(function($q){
                        $q->where(function($q){
                            $q->where('type', 1);
                            $q->where('for_id', Auth::getUser()->id);
                        });
                        $q->orWhere(function($q){
                            $q->whereHas('order', function($q){
                                $q->where(function($q){
                                    $q->where('assigned_id', Auth::getUser()->id);
                                });
                                $q->orWhere(function($q){
                                    $q->whereHas('manifest', function($q){
                                        $q->where(function($q) {
                                            $q->where('driver_id', Auth::getUser()->id);
                                        });
                                        $q->orWhere(function($q){
                                            $q->where('employee_id', Auth::getUser()->id);
                                        });
                                    });
                                });
                            });
                        });
                    });
                }
                break;
            case 3:
                $employees  =   \RainLab\User\Models\User::whereHas('groups',function($q){$q->whereIn('user_group_id', Auth::getUser()->groups->pluck('id')->toArray());})->pluck('id')->toArray();
                $records    =   $records->where(function($q) use($employees){
                    $q->where(function($q) use($employees){
                        $q->where('type', 1);
                        $q->whereIn('for_id', $employees);
                    });
                    $q->orWhere(function($q) use($employees){
                        $q->whereHas('order', function($q) use($employees){
                            $q->where(function($q) use($employees){
                                $q->whereIn('assigned_id', $employees);
                            });
                            $q->orWhere(function($q) use($employees){
                                $q->whereHas('manifest', function($q) use($employees){
                                    $q->where(function($q) use($employees){
                                        $q->whereIn('driver_id', $employees);
                                    });
                                    $q->orWhere(function($q) use($employees){
                                        $q->whereIn('employee_id', $employees);
                                    });
                                });
                            });
                        });
                    });
                });
                break;
        }

        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'movement'          =>  $record->movement,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'description'       =>  $record->description,
                'amount'            =>  Currency::format($record->amount),
                'type'              =>  $record->type,
                'payment_with'      =>  (($record->payment_with != null && $record->payment_with != $record->for_id) ? $record->payment_with : null),
                'for'               =>  (($record->type == 1) ? (($record->user) ? $record->user->name : '') : (($record->type == 2) ? ($record->branch ?$record->branch->name: '') : ($record->treasury ? $record->treasury->name: ''))),
                'gotit'             =>  (($record->type == 1 && $record->payment_with != null && $record->payment_with != $record->for_id) ? (($record->gotit) ? $record->gotit->name: '') : ''),
                'status'            =>  $record->status,
                'date'              =>  $record->date,
                'item_id'           =>  $record->item_id,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    })->middleware('web');
    Route::any('transactions/{type}', function(Request $req,$type) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Payment::orderBy($field, $sort);
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];
                $records    =   $records->where(function($q) use($search){
                    $q->where('name', 'like', "%$search%")
                    ->orWhere('username', $search)
                    ->orWhere('mobile', $search)
                    ->orWhere('email', $search);
                });
            }

            if(isset($request['query']['created_at']) && $request['query']['created_at'] != ''){
                $search     =   $request['query']['created_at'];
                $created_at     =   explode(" - ", $search);

                if($type == 'manifest'){

                    $settings       =   \Spot\Shipment\Models\Settings::instance();
                    $start          =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[0]));
                    if(!isset($created_at[1])){
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $start->copy()->endOfDay();
                    }else{
                        $end            =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[1]));
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $end->copy()->endOfDay();
                    }

                    $records        =   $records->where('created_at', '>=', $start);
                    $records        =   $records->where('created_at', '<=', $end);
                }else{

                    $settings       =   \Spot\Shipment\Models\Settings::instance();
                    $start          =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[0]));
                    if(!isset($created_at[1])){
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $start->copy()->endOfDay();
                    }else{
                        $end            =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[1]));
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $end->copy()->endOfDay();
                    }

                    $records        =   $records->where('created_at', '>=', $start);
                    $records        =   $records->where('created_at', '<=', $end);
                }
            }
            if(isset($request['query']['for_id']) && $request['query']['for_id'] != ''){
                $search     =   $request['query']['for_id'];
                $records    =   $records->where('for_id', $search);
            }
            if(isset($request['query']['status_id']) && $request['query']['status_id'] != ''){
                $search     =   $request['query']['status_id'];
                $records    =   $records->where('status', $search);
            }
        }
        switch ($type) {
            case 'deposited':
                $records    =   $records->whereIn('movement',[2,4,6,8]);
                break;
            case 'withdrwal':
                $records    =   $records->whereIn('movement',[1,3,5,7]);
                break;
        }

        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            $groups = array();
            if($record->groups){
                foreach ($record->groups as $group) {
                    $groups[] = $group->name;
                }
            }
            $recordArray = array(
                'id'                =>  $record->id,
                'movement'          =>  $record->movement,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'description'       =>  $record->description,
                'amount'            =>  Currency::format($record->amount),
                'status'            =>  $record->status,
                'type'              =>  $record->type,
                'payment_with'      =>  $record->payment_with,
                'for'               =>  (($record->type == 1) ? (($record->user) ? $record->user->name : '') : (($record->type == 2) ? ($record->branch ?$record->branch->name: '') : ($record->treasury ? $record->treasury->name: ''))),
                'gotit'             =>  (($record->type == 1 && $record->payment_with != null) ? (($record->gotit) ? $record->gotit->name: '') : ''),
                'date'              =>  $record->date,
                'item_id'           =>  $record->item_id,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('employeeorders', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   new \Spot\Shipment\Models\Employeeorder;


        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->get();

        $recordsArray   =   array();
        $settings       = \Spot\Shipment\Models\Settings::instance();

        foreach($records as $order){

            $record =   $order->order;
            \Carbon\Carbon::setLocale(Config::get('app.locale'));


            $shipping_from_area = $shipping_to_area = $shipping_from_area_id = $shipping_to_area_id = null;
            if($record->sender_address){

                $shipping_from_area_id =   '';
                switch($settings['tracking']['default_tracking_id']){
                    case 1:
                        if($record->sender_address->country){
                            $shipping_from_area_id =   $record->sender_address->thecountry->id;
                        }
                    break;
                    case 2:
                        if($record->sender_address->state){
                            $shipping_from_area_id =   $record->sender_address->thestate->id;
                        }
                    break;
                    case 3:
                        if($record->sender_address->city){
                            $shipping_from_area_id =   $record->sender_address->thecity->id;
                        }
                    break;
                    case 4:
                        if($record->sender_address->area){
                            $shipping_from_area_id =   $record->sender_address->area->id;
                        }
                    break;
                    default:
                        if($record->sender_address->area){
                            $shipping_from_area_id =   $record->sender_address->area->id;
                        }elseif($record->sender_address->city){
                            $shipping_from_area_id =   $record->sender_address->thecity->id;
                        }elseif($record->sender_address->state){
                            $shipping_from_area_id =   $record->sender_address->thestate->id;
                        }elseif($record->sender_address->country){
                            $shipping_from_area_id =   $record->sender_address->thecountry->id;
                        }
                }

                if($record->sender_address->area){
                    $shipping_from_area =   $record->sender_address->area->name;
                }elseif($record->sender_address->city){
                    $shipping_from_area =   $record->sender_address->thecity->name;
                }elseif($record->sender_address->state){
                    $shipping_from_area =   $record->sender_address->thestate->name;
                }elseif($record->sender_address->country){
                    $shipping_from_area =   $record->sender_address->thecountry->name;
                }
            }
            if($record->receiver_address){

                $shipping_to_area_id =   '';
                switch($settings['tracking']['default_tracking_id']){
                    case 1:
                        if($record->receiver_address->country){
                            $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                        }
                    break;
                    case 2:
                        if($record->receiver_address->state){
                            $shipping_to_area_id =   $record->receiver_address->thestate->id;
                        }
                    break;
                    case 3:
                        if($record->receiver_address->city){
                            $shipping_to_area_id =   $record->receiver_address->thecity->id;
                        }
                    break;
                    case 4:
                        if($record->receiver_address->area){
                            $shipping_to_area_id =   $record->receiver_address->area->id;
                        }
                    break;
                    default:
                        if($record->receiver_address->area){
                            $shipping_to_area_id =   $record->receiver_address->area->id;
                        }elseif($record->receiver_address->city){
                            $shipping_to_area_id =   $record->receiver_address->thecity->id;
                        }elseif($record->receiver_address->state){
                            $shipping_to_area_id =   $record->receiver_address->thestate->id;
                        }elseif($record->receiver_address->country){
                            $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                        }
                }

                if($record->receiver_address->area){
                    $shipping_to_area =   $record->receiver_address->area->name;
                }elseif($record->receiver_address->city){
                    $shipping_to_area =   $record->receiver_address->thecity->name;
                }elseif($record->receiver_address->state){
                    $shipping_to_area =   $record->receiver_address->thestate->name;
                }elseif($record->receiver_address->country){
                    $shipping_to_area =   $record->receiver_address->thecountry->name;
                }
            }

            $recordArray = array(
                'id'                =>  $record->id,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'channel'           =>  $record->channel,
                'office'            =>  $record->office->name,
                'payment'           =>  $record->payment_type,
                'sender_id'         =>  $record->sender_id,
                'sender'            =>  $record->sender,
                'receiver'          =>  (($record->receiver) ? $record->receiver : null),
                'type'              =>  $record->type,
                'status'            =>  $record->status,
                'requested'         =>  $record->requested,
                'manifest_id'       =>  $record->manifest_id,
                'assigned_id'       =>  $record->assigned_id,
                'shipping_number'   =>  $record->number,
                'shipping_from_area'=>  $shipping_from_area,
                'shipping_to_area'  =>  $shipping_to_area,
                'shipping_from'     =>  $record->sender_address,
                'shipping_to'       =>  (($record->receiver_address) ? $record->receiver_address : null),
                'shipping_area'     =>  (($record->type == 1) ? $shipping_from_area_id : $shipping_to_area_id),
            );

            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    });
    Route::any('shipments/{type}', function(Request $req,$type) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        if($type == 'manifest'){
            $records    =   \Spot\Shipment\Models\Manifest::orderBy($field, $sort);


            switch (Auth::getUser()->role_id) {
                case 6:
                    $employees  =   \RainLab\User\Models\User::whereIn('office',Auth::getUser()->manage->pluck('id')->toArray())->pluck('id')->toArray();
                    $records    =   $records->where(function($q) use($employees){
                        $q->where(function($q) use($employees){
                            $q->whereIn('driver_id', $employees);
                        });
                        $q->orWhere(function($q) use($employees){
                            $q->whereIn('employee_id', $employees);
                        });
                    });
                    break;
                case 4:
                    if(Auth::getUser()->is_superuser){
                        $employees  =   \RainLab\User\Models\User::where('office',Auth::getUser()->office)->pluck('id')->toArray();
                        $records    =   $records->where(function($q) use($employees){
                            $q->where(function($q) use($employees){
                                $q->whereIn('driver_id', $employees);
                            });
                            $q->orWhere(function($q) use($employees){
                                $q->whereIn('employee_id', $employees);
                            });
                        });

                    }else{
                        $records    =   $records->where(function($q){
                            $q->where(function($q) {
                                $q->where('driver_id', Auth::getUser()->id);
                            });
                            $q->orWhere(function($q){
                                $q->where('employee_id', Auth::getUser()->id);
                            });
                        });
                    }
                    break;
                case 3:
                    $employees  =   \RainLab\User\Models\User::whereHas('groups',function($q){$q->whereIn('user_group_id', Auth::getUser()->groups->pluck('id')->toArray());})->pluck('id')->toArray();
                    $records    =   $records->where(function($q) use($employees){
                        $q->where(function($q) use($employees){
                            $q->whereIn('driver_id', $employees);
                        });
                        $q->orWhere(function($q) use($employees){
                            $q->whereIn('employee_id', $employees);
                        });
                    });
                    break;
            }

        }else{
            if($type == 'requests'){
                $records    =   \Spot\Shipment\Models\Order::where('requested',0)->orderBy($field, $sort);
            }elseif($type == 'approved'){
                //0 = Pending | 1 = Approved | 2 = Refused | 3 = Delivered to driver | 4 = Delivered | 5 = Return request | 6 = Delivery of discards to the driver | 7 = Supply in stock | 8 = Returned | 9 = received | 10 = return fees | 11 = Delivery of return discards to the driver | 12 = Delivered & returned
                $records    =   \Spot\Shipment\Models\Order::where('requested',1)->orderBy($field, $sort);
            }elseif($type == 'assigned'){
                $records    =   \Spot\Shipment\Models\Order::whereIn('requested',[1,5,10,7])->where(function($q){$q->where('assigned_id', '!=', null)->orWhere('manifest_id', '!=', null);})->orderBy($field, $sort);
            }elseif($type == 'withdriver'){
                $records    =   \Spot\Shipment\Models\Order::whereIn('requested',[3,6,11])->orderBy($field, $sort);
            }elseif($type == 'processing'){
                $records    =   \Spot\Shipment\Models\Order::whereIn('requested',[3,6,7,8,10,11])->orderBy($field, $sort);
            }elseif($type == 'delayed'){
                $records    =   \Spot\Shipment\Models\Order::whereIn('requested',[0,1,3])->where('delivery_date', '<', \Carbon\Carbon::now()->format('Y-m-d'))->orderBy($field, $sort);
            }elseif($type == 'saved'){
                $records    =   \Spot\Shipment\Models\Order::where('requested',100)->orderBy($field, $sort);
            }elseif($type == 'stock'){
                $records    =   \Spot\Shipment\Models\Order::where('requested',7)->orderBy($field, $sort);
            }elseif($type == 'postponed'){
                $records    =   \Spot\Shipment\Models\Order::where('postponed',1)->whereIn('requested',[1,3,5,6,7,10,11])->orderBy($field, $sort);
            }elseif($type == 'delivered'){
                $records    =   \Spot\Shipment\Models\Order::whereIn('requested',[4,10,11,12])->orderBy($field, $sort);
            }elseif($type == 'supplied'){
                $records    =   \Spot\Shipment\Models\Order::where('requested',12)->orderBy($field, $sort);
            }elseif($type == 'manifestorders'){
                $records    =   \Spot\Shipment\Models\Order::where('manifest_id', $request['id'])->orderBy($field, $sort);
            }elseif($type == 'clientorders'){
                $records    =   \Spot\Shipment\Models\Order::where(function($q) use($request){$q->where('sender_id', $request['id'])->orWhere('receiver_id', $request['id']);})->orderBy($field, $sort);
            }else{
                $records    =   \Spot\Shipment\Models\Order::orderBy($field, $sort);
            }



            switch (Auth::getUser()->role_id) {
                case 6:
                    $records    =   $records->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                    break;
                case 5:
                    $records    =   $records->where(function($q){
                        $q->where('sender_id', Auth::getUser()->id);
                        $q->orWhere('receiver_id', Auth::getUser()->id);
                    });
                    break;
                case 4:
                    if(Auth::getUser()->is_superuser){
                        $records    =   $records->where('office_id', Auth::getUser()->office);
                    }else{
                        $records    =   $records->where(function($q){
                            $q->where(function($q){
                                //Get all employees
                                $q->where('assigned_id', Auth::getUser()->id);
                            });
                            $q->orWhere(function($q){
                                $q->whereHas('manifest', function($q){
                                    $q->where(function($q) {
                                        $q->where('driver_id', Auth::getUser()->id);
                                    });
                                    $q->orWhere(function($q){
                                        $q->where('employee_id', Auth::getUser()->id);
                                    });
                                });
                            });
                        });
                    }
                    break;
                case 3:
                    $employees  =   \RainLab\User\Models\User::whereHas('groups',function($q){$q->whereIn('user_group_id', Auth::getUser()->groups->pluck('id')->toArray());})->pluck('id')->toArray();
                    $records    =   $records->where(function($q) use($employees){
                        $q->where(function($q) use($employees){
                            //Get all employees
                            $q->whereIn('assigned_id', $employees);
                        });
                        $q->orWhere(function($q) use($employees){
                            $q->whereHas('manifest', function($q) use($employees){
                                $q->where(function($q) use($employees){
                                    $q->whereIn('driver_id', $employees);
                                });
                                $q->orWhere(function($q) use($employees){
                                    $q->whereIn('employee_id', $employees);
                                });
                            });
                        });
                    });
                    break;
            }
        }
        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];

                if($type == 'manifest'){
                    $records    =   $records->where(function($q) use($search){
                        $q->where('id', $search)
                        ->orWhere(function($q) use ($search){
                            $q->whereHas('driver',function($q) use($search){
                                $q->where('name', 'like', "%$search%")
                                ->orWhere('username', $search)
                                ->orWhere('mobile', $search)
                                ->orWhere('email', $search);
                            });
                        })
                        ->orWhere(function($q) use ($search){
                            $q->whereHas('user',function($q) use($search){
                                $q->where('name', 'like', "%$search%")
                                ->orWhere('username', $search)
                                ->orWhere('mobile', $search)
                                ->orWhere('email', $search);
                            });
                        })
                        ->orWhere(function($q) use ($search){
                            $q->whereHas('car',function($q) use($search){
                                $q->where('name', 'like', "%$search%");
                            });
                        })
                        ->orWhere(function($q) use ($search){
                            $q->whereHas('orders',function($q) use($search){
                                $q->where('id', $search)
                                ->orWhere('number', $search);
                            });
                        });
                    });
                }else{
                    $records    =   $records->where(function($q) use($search){
                        $q->where('id', $search);

                        $settings       = \Spot\Shipment\Models\Settings::instance();
                        $length         = strlen($settings['tracking']['prefix_order']);
                        $prefix         = substr($search, 0, $length);
                        if (strcasecmp($prefix, $settings['tracking']['prefix_order']) == 0) {
                            $search =   str_ireplace($settings['tracking']['prefix_order'],'',$search);
                        }
                        $q->orWhere('number', 'like', "%$search%");
                        $q->orWhere(function($q) use ($search){
                            $q->whereHas('sender',function($q) use($search){
                                $q->where('name', 'like', "%$search%")
                                ->orWhere('username', $search)
                                ->orWhere('mobile', $search)
                                ->orWhere('email', $search);
                            });
                        })
                        ->orWhere(function($q) use ($search){
                            $q->whereHas('receiver',function($q) use($search){
                                $q->where('name', 'like', "%$search%")
                                ->orWhere('username', $search)
                                ->orWhere('mobile', $search)
                                ->orWhere('email', $search);
                            });
                        });
                    });
                }
            }
            if(isset($request['query']['created_at']) && $request['query']['created_at'] != ''){
                $search     =   $request['query']['created_at'];
                $created_at     =   explode(" - ", $search);

                if($type == 'manifest'){

                    $settings       =   \Spot\Shipment\Models\Settings::instance();
                    $start          =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[0]));
                    if(!isset($created_at[1])){
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $start->copy()->endOfDay();
                    }else{
                        $end            =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[1]));
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $end->copy()->endOfDay();
                    }

                    $records        =   $records->where('created_at', '>=', $start);
                    $records        =   $records->where('created_at', '<=', $end);
                }else{

                    $settings       =   \Spot\Shipment\Models\Settings::instance();
                    $start          =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[0]));
                    if(!isset($created_at[1])){
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $start->copy()->endOfDay();
                    }else{
                        $end            =   \Carbon\Carbon::parse(\Carbon\Carbon::createFromFormat($settings['dateformat'], $created_at[1]));
                        $start          =   $start->copy()->startOfDay();
                        $end            =   $end->copy()->endOfDay();
                    }

                    $records        =   $records->where('created_at', '>=', $start);
                    $records        =   $records->where('created_at', '<=', $end);


                }
            }
            if(isset($request['query']['type']) && $request['query']['type'] != ''){
                $search     =   $request['query']['type'];
                if($type!== 'manifest'){
                    $records    =   $records->where('type', $search);
                }
            }
            if(isset($request['query']['sender_id']) && $request['query']['sender_id'] != ''){
                $search     =   $request['query']['sender_id'];
                if($type!== 'manifest'){
                    $records    =   $records->where('sender_id', $search);
                }
            }
            if(isset($request['query']['employee_id']) && $request['query']['employee_id'] != ''){
                $search     =   $request['query']['employee_id'];

                if($type == 'manifest'){
                    $records    =   $records->where(function($q) use($search){
                        $q->where('driver_id', $search)
                        ->orWhere('employee_id', $search);
                    });
                }else{
                    $records    =   $records->where(function($q) use($search){
                        $q->where('assigned_id', $search)
                        ->orWhere(function($q) use($search){
                            $q->whereHas('manifest',function($q) use($search){
                                $q->where('driver_id', $search)
                                ->orWhere('employee_id', $search);
                            });
                        });
                    });
                }
            }
        }
        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy($field, $sort)->get();

        $recordsArray   =   array();

        $settings       =   \Spot\Shipment\Models\Settings::instance();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));
            if($type == 'manifest'){
                $recordArray = array(
                    'id'                =>  $record->id,
                    'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                    'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                    'car'               =>  (($record->car) ? $record->car->name : '-'),
                    'driver'            =>  (($record->driver) ? $record->driver->name : '-'),
                    'employee'            =>  (($record->employee) ? $record->employee->name : '-'),
                    'user'              =>  (($record->user) ? $record->user->name : '-'),
                    'orders'            =>  $record->orders->count(),
                );
            }else{
                $shipping_from_area = $shipping_to_area = $shipping_from_area_id = $shipping_to_area_id = null;
                if($record->sender_address){

                    $shipping_from_area_id =   '';
                    switch($settings['tracking']['default_tracking_id']){
                        case 1:
                            if($record->sender_address->country){
                                $shipping_from_area_id =   $record->sender_address->thecountry->id;
                            }
                        break;
                        case 2:
                            if($record->sender_address->state){
                                $shipping_from_area_id =   $record->sender_address->thestate->id;
                            }
                        break;
                        case 3:
                            if($record->sender_address->city){
                                $shipping_from_area_id =   $record->sender_address->thecity->id;
                            }
                        break;
                        case 4:
                            if($record->sender_address->area){
                                $shipping_from_area_id =   $record->sender_address->area->id;
                            }
                        break;
                        default:
                            if($record->sender_address->area){
                                $shipping_from_area_id =   $record->sender_address->area->id;
                            }elseif($record->sender_address->city){
                                $shipping_from_area_id =   $record->sender_address->thecity->id;
                            }elseif($record->sender_address->state){
                                $shipping_from_area_id =   $record->sender_address->thestate->id;
                            }elseif($record->sender_address->country){
                                $shipping_from_area_id =   $record->sender_address->thecountry->id;
                            }
                    }

                    if($record->sender_address->area){
                        $shipping_from_area =   $record->sender_address->area->name;
                    }elseif($record->sender_address->city){
                        $shipping_from_area =   $record->sender_address->thecity->name;
                    }elseif($record->sender_address->state){
                        $shipping_from_area =   $record->sender_address->thestate->name;
                    }elseif($record->sender_address->country){
                        $shipping_from_area =   $record->sender_address->thecountry->name;
                    }
                }
                if($record->receiver_address){

                    $shipping_to_area_id =   '';
                    switch($settings['tracking']['default_tracking_id']){
                        case 1:
                            if($record->receiver_address->country){
                                $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                            }
                        break;
                        case 2:
                            if($record->receiver_address->state){
                                $shipping_to_area_id =   $record->receiver_address->thestate->id;
                            }
                        break;
                        case 3:
                            if($record->receiver_address->city){
                                $shipping_to_area_id =   $record->receiver_address->thecity->id;
                            }
                        break;
                        case 4:
                            if($record->receiver_address->area){
                                $shipping_to_area_id =   $record->receiver_address->area->id;
                            }
                        break;
                        default:
                            if($record->receiver_address->area){
                                $shipping_to_area_id =   $record->receiver_address->area->id;
                            }elseif($record->receiver_address->city){
                                $shipping_to_area_id =   $record->receiver_address->thecity->id;
                            }elseif($record->receiver_address->state){
                                $shipping_to_area_id =   $record->receiver_address->thestate->id;
                            }elseif($record->receiver_address->country){
                                $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                            }
                    }

                    if($record->receiver_address->area){
                        $shipping_to_area =   $record->receiver_address->area->name;
                    }elseif($record->receiver_address->city){
                        $shipping_to_area =   $record->receiver_address->thecity->name;
                    }elseif($record->receiver_address->state){
                        $shipping_to_area =   $record->receiver_address->thestate->name;
                    }elseif($record->receiver_address->country){
                        $shipping_to_area =   $record->receiver_address->thecountry->name;
                    }
                }

                $delayed    = 0;
                $today              = \Carbon\Carbon::now();
                if($record->delivery_date){
                    $deliverydate       = \Carbon\Carbon::parse($record->delivery_date);
                }else{
                    $shipdate           = \Carbon\Carbon::parse($record->ship_date);
                    $deliverydate       = $shipdate->addHours($record->deliverytime->count);
                }
                $time_diff          = $today->diffInDays($deliverydate, false);

                if($time_diff < 0){
                    if($record->requested == 0 or $record->requested == 1 or $record->requested == 3){
                        $delayed    = 1;
                    }
                }


                $recordArray = array(
                    'id'                =>  $record->id,
                    'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format('d/m/Y'),
                    'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                    'type'              =>  $record->type,
                    'channel'           =>  $record->channel,
                    'office'            =>  $record->office->name,
                    'payment'           =>  $record->payment_type,
                    'sender'            =>  $record->sender,
                    'receiver'          =>  (($record->receiver) ? $record->receiver : null),
                    'status'            =>  $record->status,
                    'requested'         =>  $record->requested,
                    'delayed'           =>  $delayed,
                    'manifest_id'       =>  $record->manifest_id,
                    'assigned_id'       =>  $record->assigned_id,
                    'shipping_number'   =>  $record->number,
                    'shipping_from_area'=>  $shipping_from_area,
                    'shipping_to_area'  =>  $shipping_to_area,
                    'shipping_from'     =>  $record->sender_address,
                    'shipping_to'       =>  (($record->receiver_address) ? $record->receiver_address : null),
                    'shipping_area'     =>  (($record->type == 1) ? $shipping_from_area_id : $shipping_to_area_id),
                    'time_diff'         =>  $time_diff,
                );
            }
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    })->middleware('web');
    Route::any('dashboardshipments', function(Request $req) {
        $request = post();
        $page                       =   $request['pagination']['page'];
        $perpage                    =   $request['pagination']['perpage'];
        $sort                       =   ((isset($request['sort']['sort']))? $request['sort']['sort'] : 'desc');
        $field                      =   ((isset($request['sort']['field']))? $request['sort']['field'] : 'id');
        $skip                       =   intval(($page-1)*$perpage);

        $records    =   \Spot\Shipment\Models\Order::orderBy($field, $sort);

        switch (Auth::getUser()->role_id) {
            case 6:
                $records    =   $records->whereIn('office_id', Auth::getUser()->manage->pluck('id')->toArray());
                break;
            case 5:
                $records    =   $records->where(function($q){
                    $q->where('sender_id', Auth::getUser()->id);
                    $q->orWhere('receiver_id', Auth::getUser()->id);
                });
                break;
            case 4:
                if(Auth::getUser()->is_superuser){
                    $records    =   $records->where('office_id', Auth::getUser()->office);
                }else{
                    $records    =   $records->where(function($q){
                        $q->where(function($q){
                            //Get all employees
                            $q->where('assigned_id', Auth::getUser()->id);
                        });
                        $q->orWhere(function($q){
                            $q->whereHas('manifest', function($q){
                                $q->where(function($q) {
                                    $q->where('driver_id', Auth::getUser()->id);
                                });
                                $q->orWhere(function($q){
                                    $q->where('employee_id', Auth::getUser()->id);
                                });
                            });
                        });
                    });
                }
                break;
            case 3:
                $employees  =   \RainLab\User\Models\User::whereHas('groups',function($q){$q->whereIn('user_group_id', Auth::getUser()->groups->pluck('id')->toArray());})->pluck('id')->toArray();
                $records    =   $records->where(function($q) use($employees){
                    $q->where(function($q) use($employees){
                        //Get all employees
                        $q->whereIn('assigned_id', $employees);
                    });
                    $q->orWhere(function($q) use($employees){
                        $q->whereHas('manifest', function($q) use($employees){
                            $q->where(function($q) use($employees){
                                $q->whereIn('driver_id', $employees);
                            });
                            $q->orWhere(function($q) use($employees){
                                $q->whereIn('employee_id', $employees);
                            });
                        });
                    });
                });
                break;
        }

        if(isset($request['query'])){
            if(isset($request['query']['generalSearch']) && $request['query']['generalSearch'] != ''){
                $search     =   $request['query']['generalSearch'];

                $records    =   $records->where(function($q) use($search){
                    $q->where('id', $search)
                    ->orWhere('number', 'like', "%$search%")
                    ->orWhere(function($q) use ($search){
                        $q->whereHas('sender',function($q) use($search){
                            $q->where('name', 'like', "%$search%")
                            ->orWhere('username', $search)
                            ->orWhere('mobile', $search)
                            ->orWhere('email', $search);
                        });
                    })
                    ->orWhere(function($q) use ($search){
                        $q->whereHas('receiver',function($q) use($search){
                            $q->where('name', 'like', "%$search%")
                            ->orWhere('username', $search)
                            ->orWhere('mobile', $search)
                            ->orWhere('email', $search);
                        });
                    });
                });
            }
        }

        if(isset($request['start'])){
            $records    =   $records->where('updated_at', '>=', $request['start'])->where('updated_at', '<=', $request['end']);
        }

        $count      =   $records->count();
        $records    =   $records->skip($skip)->take($perpage)->orderBy('updated_at', 'asc')->get();

        $recordsArray   =   array();
        $settings       = \Spot\Shipment\Models\Settings::instance();
        foreach($records as $record){
            \Carbon\Carbon::setLocale(Config::get('app.locale'));


            $shipping_from_area = $shipping_to_area = $shipping_from_area_id = $shipping_to_area_id = null;
            if($record->sender_address){

                $shipping_from_area_id =   '';
                switch($settings['tracking']['default_tracking_id']){
                    case 1:
                        if($record->sender_address->country){
                            $shipping_from_area_id =   $record->sender_address->thecountry->id;
                        }
                    break;
                    case 2:
                        if($record->sender_address->state){
                            $shipping_from_area_id =   $record->sender_address->thestate->id;
                        }
                    break;
                    case 3:
                        if($record->sender_address->city){
                            $shipping_from_area_id =   $record->sender_address->thecity->id;
                        }
                    break;
                    case 4:
                        if($record->sender_address->area){
                            $shipping_from_area_id =   $record->sender_address->area->id;
                        }
                    break;
                    default:
                        if($record->sender_address->area){
                            $shipping_from_area_id =   $record->sender_address->area->id;
                        }elseif($record->sender_address->city){
                            $shipping_from_area_id =   $record->sender_address->thecity->id;
                        }elseif($record->sender_address->state){
                            $shipping_from_area_id =   $record->sender_address->thestate->id;
                        }elseif($record->sender_address->country){
                            $shipping_from_area_id =   $record->sender_address->thecountry->id;
                        }
                }

                if($record->sender_address->area){
                    $shipping_from_area =   $record->sender_address->area->name;
                }elseif($record->sender_address->city){
                    $shipping_from_area =   $record->sender_address->thecity->name;
                }elseif($record->sender_address->state){
                    $shipping_from_area =   $record->sender_address->thestate->name;
                }elseif($record->sender_address->country){
                    $shipping_from_area =   $record->sender_address->thecountry->name;
                }
            }
            if($record->receiver_address){

                $shipping_to_area_id =   '';
                switch($settings['tracking']['default_tracking_id']){
                    case 1:
                        if($record->receiver_address->country){
                            $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                        }
                    break;
                    case 2:
                        if($record->receiver_address->state){
                            $shipping_to_area_id =   $record->receiver_address->thestate->id;
                        }
                    break;
                    case 3:
                        if($record->receiver_address->city){
                            $shipping_to_area_id =   $record->receiver_address->thecity->id;
                        }
                    break;
                    case 4:
                        if($record->receiver_address->area){
                            $shipping_to_area_id =   $record->receiver_address->area->id;
                        }
                    break;
                    default:
                        if($record->receiver_address->area){
                            $shipping_to_area_id =   $record->receiver_address->area->id;
                        }elseif($record->receiver_address->city){
                            $shipping_to_area_id =   $record->receiver_address->thecity->id;
                        }elseif($record->receiver_address->state){
                            $shipping_to_area_id =   $record->receiver_address->thestate->id;
                        }elseif($record->receiver_address->country){
                            $shipping_to_area_id =   $record->receiver_address->thecountry->id;
                        }
                }

                if($record->receiver_address->area){
                    $shipping_to_area =   $record->receiver_address->area->name;
                }elseif($record->receiver_address->city){
                    $shipping_to_area =   $record->receiver_address->thecity->name;
                }elseif($record->receiver_address->state){
                    $shipping_to_area =   $record->receiver_address->thestate->name;
                }elseif($record->receiver_address->country){
                    $shipping_to_area =   $record->receiver_address->thecountry->name;
                }
            }

            $delayed    = 0;
            $today              = \Carbon\Carbon::now();
            if($record->delivery_date){
                $deliverydate       = \Carbon\Carbon::parse($record->delivery_date);
            }else{
                $shipdate           = \Carbon\Carbon::parse($record->ship_date);
                $deliverydate       = $shipdate->addHours($record->deliverytime->count);
            }
            $time_diff          = $today->diffInDays($deliverydate, false);

            if($time_diff < 0){
                if($record->requested == 0 or $record->requested == 1 or $record->requested == 3){
                    $delayed    = 1;
                }
            }
            //0 = Pending | 1 = Approved | 2 = Refused | 3 = Delivered to driver | 4 = Delivered | 5 = Return request | 6 = Delivery of discards to the driver | 7 = Supply in stock | 8 = Returned | 9 = received

            $settings       =   \Spot\Shipment\Models\Settings::instance();

            $recordArray = array(
                'id'                =>  $record->id,
                'created_at_date'   =>  \Carbon\Carbon::parse($record->created_at)->format($settings['dateformat']),
                'created_at_time'   =>  \Carbon\Carbon::parse($record->created_at)->format('h:i:s a'),
                'channel'           =>  $record->channel,
                'office'            =>  $record->office->name,
                'payment'           =>  $record->payment_type,
                'sender'            =>  $record->sender,
                'receiver'          =>  (($record->receiver) ? $record->receiver : null),
                'sender_id'         =>  $record->sender_id,
                'type'              =>  $record->type,
                'requested'         =>  $record->requested,
                'status'            =>  $record->status,
                'delayed'           =>  $delayed,
                'manifest_id'       =>  $record->manifest_id,
                'assigned_id'       =>  $record->assigned_id,
                'shipping_number'   =>  $record->number,
                'shipping_from_area'=>  $shipping_from_area,
                'shipping_to_area'  =>  $shipping_to_area,
                'shipping_from'     =>  $record->sender_address,
                'shipping_to'       =>  (($record->receiver_address) ? $record->receiver_address : null),
                'shipping_area'     =>  (($record->type == 1) ? $shipping_from_area_id : $shipping_to_area_id),
                'time_diff'         =>  $time_diff,
            );
            array_push($recordsArray,$recordArray);
        }

        $total      =   $count;
        $pages      =   intval($count/$perpage);

        $full_data  =   array(
            'meta'  =>  array(
                            "page"=> $page,
                            "pages"=> $pages,
                            "perpage"=> $perpage,
                            "total"=> $total,
                            "sort"=> $sort,
                            "field"=> $field
                        ),
            'data'  =>  $recordsArray,
        );
        die(json_encode($full_data));

    })->middleware('web');
});
