<?php namespace Spot\Project\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpotProjectProject extends Migration
{
    public function up()
    {
        Schema::create('spot_project_project', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('ftp_server');
            $table->string('ftp_user');
            $table->string('ftp_password');
            $table->string('ftp_path');
            $table->string('ftp_port');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spot_project_project');
    }
}
