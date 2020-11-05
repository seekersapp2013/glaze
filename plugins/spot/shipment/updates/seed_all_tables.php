<?php namespace Spot\Shipment\Updates;

use October\Rain\Database\Updates\Seeder;
use RainLab\User\Models\User;
use Vdomah\Roles\Models\Role;
use RainLab\User\Models\UserGroup;
use Spot\UserPermissions\Models\Permission;

class SeedAllTables extends Seeder
{

    public function run()
    {
        UserGroup::destroy([1, 2]);

        \Db::table('system_settings')->insert([
            [
                'item' => 'user_settings',
                'value' => '{"require_activation":"1","activate_mode":"auto","use_throttle":"1","block_persistence":"0","allow_registration":"1","login_attribute":"username","remember_login":"ask","min_password_length":"6"}'
            ],
        ]);

        if(!Role::find(1)){
            Role::create([
                'name'      => 'Administration',
                'code'      => 'administration',
            ]);
            Role::create([
                'name'      => 'Users',
                'parent_id' => 1,
                'code'      => 'user',
            ]);
        }


        if(!Permission::find(1)){
            Permission::create([
                'code'                      => 'project',
                'name'                      => 'Project',
                'type'                      => 'crud',
                'description'               => 'Ability to manage projects',
                'updated_at'                => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
            ]);
            Permission::create([
                'code'                      => 'setting',
                'name'                      => 'Setting',
                'type'                      => 'crud',
                'description'               => 'Ability to manage system configuration',
                'updated_at'                => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
            ]);
            Permission::create([
                'code'                      => 'languages',
                'name'                      => 'Languages',
                'type'                      => 'crud',
                'description'               => 'Ability to manage lanaguages',
                'updated_at'                => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
            ]);
            Permission::create([
                'code'                      => 'employees',
                'name'                      => 'Users',
                'type'                      => 'crud',
                'description'               => 'Ability to manage users',
                'updated_at'                => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
            ]);
            Permission::create([
                'code'                      => 'backups',
                'name'                      => 'Backups',
                'type'                      => 'crud',
                'description'               => 'Ability to manage backups',
                'updated_at'                => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
            ]);
        }

        if(!User::find(1)){
            User::create([
                'name'                      => 'LaraBuilder Admin',
                'email'                     => 'support@larabuilder.com',
                'password'                  => '123456',
                'password_confirmation'     => '123456',
                'is_activated'              => 1,
                'activated_at'              => date('Y-m-d h:i:s'),
                'created_at'                => date('Y-m-d h:i:s'),
                'updated_at'                => date('Y-m-d h:i:s'),
                'username'                  => 'admin',
                'surname'                   => 'LaraBuilder Administration',
                'role_id'                   => 1,
            ]);
        }
    }

}
