<?php namespace Spot\Project\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSpotProjectProject extends Migration
{
    public function up()
    {
        Schema::table('spot_project_project', function($table)
        {
            $table->string('ftp_server', 191)->nullable()->change();
            $table->string('ftp_user', 191)->nullable()->change();
            $table->string('ftp_password', 191)->nullable()->change();
            $table->string('ftp_path', 191)->nullable()->change();
            $table->string('ftp_port', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('spot_project_project', function($table)
        {
            $table->string('ftp_server', 191)->nullable(false)->change();
            $table->string('ftp_user', 191)->nullable(false)->change();
            $table->string('ftp_password', 191)->nullable(false)->change();
            $table->string('ftp_path', 191)->nullable(false)->change();
            $table->string('ftp_port', 191)->nullable(false)->change();
        });
    }
}
