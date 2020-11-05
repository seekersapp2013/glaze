<?php namespace Spot\Project\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSpotProjectPage extends Migration
{
    public function up()
    {
        Schema::create('spot_project_page', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('project_id');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('spot_project_page');
    }
}
