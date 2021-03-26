<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Truonghoc extends Migration
{
    public function up()
    {
        Schema::create('truonghoc', function (Blueprint $table) {
            $table->string('IDTruongHoc', 10)->primary();
            $table->string('IDTrang', 10)->index();
            $table->string('TenTruongHoc', 10);
            $table->string('LoaiTruongHoc', 10);
            $table->foreign('IDTrang')->references('IDTrang')->on('trang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('truonghoc');
    }
}
