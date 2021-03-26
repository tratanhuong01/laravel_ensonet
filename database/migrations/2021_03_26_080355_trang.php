<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trang extends Migration
{
    public function up()
    {
        Schema::create('trang', function (Blueprint $table) {
            $table->string('IDTrang', 10)->primary();
            $table->string('NguoiTaoTrang', 10)->index();
            $table->string('QuanTriVien', 200);
            $table->string('TenTrang', 100);
            $table->string('AnhDaiDien', 100);
            $table->string('AnhBia', 100);
            $table->string('LoaiTrang', 100);
            $table->string('AnhDaiDien', 100);
            $table->foreign('IDTrang')->references('IDTrang')->on('trang')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('trang');
    }
}
