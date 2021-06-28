<?php

namespace Babel\Elements\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Schema;

class UpdateContentTable extends Migration
{
    protected $recordsPath = __DIR__.'/../records';

    public function up()
    {
        Schema::table('babel_elements', function (Blueprint $table) {            
            $table->string('content_text', 2000)->change();           
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
