<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phongnenstory extends Migration
{
    public function up()
    {
        Schema::create('phongnen', function (Blueprint $table) {
            $table->increments('IDPhongNen');
            $table->string('DuongDanPN', 100);
        });
    }

    public function down()
    {
        Schema::drop('phongnen');
    }
}
