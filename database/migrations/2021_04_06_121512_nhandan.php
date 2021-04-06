<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nhandan extends Migration
{
    public function up()
    {
        Schema::create('nhandan', function (Blueprint $table) {
            $table->string('IDNhanDan', 10)->primary();
            $table->string('NhomNhanDan', 20);
            $table->string('DuongDanNhanDan', 200)->nullable();
        });
    }

    public function down()
    {
        Schema::drop('nhandan');
    }
}
