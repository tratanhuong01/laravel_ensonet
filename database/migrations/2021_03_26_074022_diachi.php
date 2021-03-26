<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diachi extends Migration
{
    public function up()
    {
        Schema::create('diachi', function (Blueprint $table) {
            $table->string('IDDiaChi', 10)->primary();
            $table->string('IDTrang', 10)->index();
            $table->string('TenDiaChi', 200)->nullable();
            $table->foreign('IDTrang')->references('IDTrang')->on('trang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('diachi');
    }
}
