<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Camxuctinnhan extends Migration
{
    public function up()
    {
        Schema::create('camxuctinnhan', function (Blueprint $table) {
            $table->string('IDCamXucTinNhan', 10)->primary();
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('IDTinNhan', 10)->index();
            $table->integer('LoaiCamXuc');
            $table->datetime('ThoiGianCamXuc');
            $table->foreign('IDTinNhan')->references('IDTinNhan')->on('tinnhan')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('camxuctinnhan');
    }
}
