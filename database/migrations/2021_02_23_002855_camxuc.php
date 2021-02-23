<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Camxuc extends Migration
{
    public function up()
    {
        Schema::create('camxuc', function (Blueprint $table) {
            $table->string('IDCamXuc', 10)->primary();
            $table->string('IDBaiDang', 10)->index();
            $table->string('IDTaiKhoan', 10)->index();
            $table->integer('LoaiCamXuc');
            $table->datetime('ThoiGianCamXuc');
            $table->foreign('IDBaiDang')->references('IDBaiDang')->on('baidang')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('camxuc');
    }
}
