<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Camxucs extends Migration
{
    public function up()
    {
        Schema::create('camxuc', function (Blueprint $table) {
            $table->string('IDCamXuc', 10)->primary();
            $table->integer('TenCamXuc');
            $table->datetime('BieuTuong');
        });
    }

    public function down()
    {
        Schema::drop('camxuc');
    }
}
