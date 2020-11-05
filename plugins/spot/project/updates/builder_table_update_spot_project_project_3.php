<?php namespace Spot\Project\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateSpotProjectProject3 extends Migration
{
    public function up()
    {
        Schema::table('spot_project_project', function($table)
        {
            $table->dropColumn('content');
        });
    }
    
    public function down()
    {
        Schema::table('spot_project_project', function($table)
        {
            $table->text('content');
        });
    }
}