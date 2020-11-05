<?php namespace Spot\Shipment;

use System\Classes\PluginBase;
use \Spot\Shipment\Models\Settings;
use RainLab\Translate\Classes\Translator;
use Cms\Classes\Theme;
use \RainLab\User\Models\User as UserModel;
use \Responsiv\Currency\Models\Currency as CurrencyModel;

class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['Spot.UserPermissions'];

    public function boot()
    {
        if (!Settings::get('company') || Settings::get('company') == null){

            $default_settings   =   array(
                                        'language'              =>  'en',
                                        'timezone_offset'       =>  '-07:00',
                                        'dateformat'            =>  'd M, Y',
                                        'company'               =>  array(
                                                                        'title'             =>  'LaraBuilder',
                                                                        'charset'           =>  'utf-8',
                                                                        'description'       =>  'Building websites are now easy',
                                                                        'keywords'          =>  'LaraBuilder, Spotlayer',
                                                                        'primary_email'     =>  'info@larabuilder.com',
                                                                        'tax_number'        =>  '123456789',
                                                                        'company_phone'     =>  '00201000000001',
                                                                        'company_phone_2'   =>  '00201000000002',
                                                                        'company_phone_3'   =>  '00201000000003',
                                                                        'facebook'          =>  'http://facebook.com/SpotlayerInc',
                                                                        'twitter'           =>  'http://twitter.com/spotlayer',
                                                                        'instagram'         =>  'http://instagram.com/spotlayer',
                                                                        'address'           =>  '21 Ahmed El-Zomor',
                                                                        'lat'               =>  '30.0470944',
                                                                        'lng'               =>  '31.362213999999994',
                                                                        'county'            =>  'Al Hay Al Asher',
                                                                        'city'              =>  'Nasr City',
                                                                        'state'             =>  'Cairo Governorate',
                                                                        'postal_code'       =>  '11787',
                                                                        'country'           =>  'Egypt',
                                                                    ),
                                        'notifications'       =>  array(
                                                                        'live'                  =>  0,
                                                                        'responsibility'        =>  array(
                                                                            "new_shipments"            =>  [1],
                                                                            "update_shipment"          =>  [1],
                                                                            "approved_shipment"        =>  [1],
                                                                            "refused_shipment"         =>  [1],
                                                                            "postponed_shipment"       =>  [1],
                                                                            "transfered_shipment"      =>  [1],
                                                                            "assign_shipment"          =>  [1],
                                                                            "driver_received"           =>  [1],
                                                                            "discards_request"          =>  [1],
                                                                            "received"                  =>  [1],
                                                                            "manifest_assigned"         =>  [1],
                                                                            "stock_saved"               =>  [1],
                                                                            "returned"                  =>  [1],
                                                                            "delivered"                 =>  [1],
                                                                            "return_discards"           =>  [1],
                                                                        ),
                                                                    ),
                                        'google'              =>  array(
                                                                        'map'                           =>  array(
                                                                                                                'key'           =>  'AIzaSyCjN-FapLWoOHL6QOnVcwjFmesRdCyUiAc',
                                                                                                            ),
                                                                        'recaptcha'                     =>  array(
                                                                                                                'key'           =>  '6Ld1i7wUAAAAAF7slYbtMkjKa792itRVrLOuno7M',
                                                                                                            ),
                                                                    ),
                                    );
            Settings::set($default_settings);
        }


        $this->extendUserModel();
        \App::before(function () {
            // Share the variables with the mail template system
            $theme_code     = Theme::getActiveThemeCode();
            $theme          = Theme::load($theme_code);
            $translator     = Translator::instance();
            $currentLang    = $translator->getLocale();
            $settings       = Settings::instance();

            \View::share('site_title', $settings['company']['title']);
            \View::share('site_description', $settings['company']['description']);
            \View::share('site_phone', $settings['company']['company_phone']);
            \View::share('site_phone_2', $settings['company']['company_phone_2']);
            \View::share('site_phone_3', $settings['company']['company_phone_3']);
            \View::share('site_address', $settings['company']['address']);
            \View::share('site_email', $settings['company']['primary_email']);
            if($settings->mobile_logo){
                \View::share('site_logo', $settings->mobile_logo->path);
            }else{
                \View::share('site_logo', url('themes/'.$theme_code.'/assets/admin/media/logos/logo.svg'));
            }
            \View::share('currentLang', $currentLang);
            \View::share('site_url', url('/'));
            \View::share('theme_lang', $theme->getConfigArray('translate')[$currentLang]);

            // Global variable for settings
            \Event::listen('cms.page.beforeDisplay', function($controller, $url, $page) {
                $controller->vars['settings']       = $settings = Settings::instance();
                $translator                         = Translator::instance();
                $controller->vars['currentLang']    = $currentLang = $translator->getLocale();
                $theme = Theme::load(Theme::getActiveThemeCode());
                $controller->vars['theme']          = $theme;
                $controller->vars['theme_lang']     = $theme->getConfigArray('translate')[$currentLang];
                $controller->vars['primary_currency']     = \Responsiv\Currency\Models\Currency::where('is_primary', 1)->first();
                if($settings->notifications['live'] == 1){
                    $options = array(
                                        'cluster' => $settings->notifications['pusher']['cluster'],
                                        'useTLS' => true
                                    );
                    $pusher = new \Pusher\Pusher(
                                                    $settings->notifications['pusher']['key'],
                                                    $settings->notifications['pusher']['secret'],
                                                    $settings->notifications['pusher']['app_id'],
                                                    $options
                                                );
                    $controller->vars['pusher']         = $pusher;
                }
            });

        });
        \Event::listen('backend.form.extendFields', function ($widget) {

            if (
                !$widget->getController() instanceof \RainLab\Pages\Controllers\Index ||
                !$widget->model instanceof \RainLab\Pages\Classes\MenuItem
            ) {
                return;
            }

            $widget->addTabFields([
                'viewBag[icon]' => [
                    'tab' => 'Display',
                    'label' => 'Icon CSS',
                    'comment' => 'type here the svg icon content or the full <i class="icon class"></i> from the font icon if you need to show before the menu text',
                    'type' => 'textarea'
                ]
            ]);
        });
        UserModel::extend(function($model){
           $model->bindEvent('model.beforeSave', function() use ($model) {
               $validator = \Validator::make($model->attributes, [
                   'role_id' => 'required',
               ]);

               if ($validator->fails()) {
                   $model->role_id  =   2;
               }
           });


           // Made a clients permissions
           /*
           moved to the permissions plugins
           $model->bindEvent('model.afterCreate', function() use ($model) {
               if($model->role_id == 5){
                   $model->user_permissions()->detach([1,11,22]);
                   $model->user_permissions()->attach(1, ['permission_state' => 'crud']);
                   $model->user_permissions()->attach(11, ['permission_state' => 'c']);
                   $model->user_permissions()->attach(22, ['permission_state' => 'r']);
               }
           });
           */

       });
    }
    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'settings' => function() { return Settings::instance(); },
            ],
        ];
    }
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerSchedule($schedule)
    {
    }

    protected function extendUserModel()
    {
    }

}
