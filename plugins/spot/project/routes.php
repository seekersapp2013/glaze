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
    /********************************************/
    /*              WEBSERVICES                 */
    /********************************************/

    Route::any('ajax', function(Request $req) {
/*

    	include_once 'include/modal/mailer.php';
        include_once 'include/modal/fonts.php';
        include_once 'include/modal/fontsToDownload.php';
        include_once 'include/modal/ftpUploading.php';
    	include_once 'include/common/aweber_api/aweber_api.php';
    	include_once 'include/common/ftp/ftp.php';
    	include_once 'include/common/sftp/sftp.php';
    	include_once 'include/common/ftps/ftps.php';
*/
    	header('Access-Control-Allow-Origin: *');

        $theme = Cms\Classes\Theme::getActiveTheme();
        $theme_path = $theme->getPath();
        define('SUPRA_TMP_PATH', str_replace('themes/'.$theme->getDirName(),'',$theme_path));
    	define('SUPRA_BASE_PATH', $theme_path.'/assets/builder');
    	define('SUPRA_BASE_URL', url('themes/'.$theme->getDirName()).'/assets/builder');
    	define('CURRENT_USER', Auth::getUser()->id);
    	$ajax = new \Spot\Project\Classes\Request;
    	if (preg_match('/[a-z]+/i', $_GET['mode'])) {
    		$function = $_GET['mode'];
    		if (method_exists($ajax, ucfirst($function))) {
    			$ajax->{ucfirst($function)}();
    		}
    	}
    })->middleware('web');
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
});
