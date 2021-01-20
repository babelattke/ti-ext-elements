<?php

namespace Babel\Elements\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Schema;

class CreateElementsTable extends Migration
{
    protected $recordsPath = __DIR__.'/../records';

    public function up()
    {
        if (Schema::hasTable('babel_elements'))
            return;

        Schema::create('babel_elements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('element_id');
            $table->string('name');
            $table->string('title_text');
            $table->string('subtitle_text', 500);
            $table->string('content_text');
            $table->string('comment_text');
            $table->char('type', 12);            
            $table->string('click_url')->nullable();  
            $table->text('element_image')->nullable();          
            $table->text('element_images')->nullable();
            $table->text('element_images_info')->nullable(); 
            $table->text('steps')->nullable();
            $table->text('steps_background')->nullable(); 
            $table->boolean('button_status'); 
            $table->string('button_text');           
            $table->boolean('status');
        });

        //DB::table('babel_elements')->insert($this->getSeedRecords('demo_elements'));
    }

    public function down()
    {
        Schema::dropIfExists('babel_elements');
    }

    protected function getSeedRecords($name)
    {
        return json_decode(file_get_contents($this->recordsPath.'/'.$name.'.json'), TRUE);
    }
}
