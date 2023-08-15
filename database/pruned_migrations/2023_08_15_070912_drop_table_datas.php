<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableDatas extends Migration
{
    public function up()
    {
        // No need to implement the up method
    }

    public function down()
    {
        Schema::dropIfExists('datas');
    }
}
