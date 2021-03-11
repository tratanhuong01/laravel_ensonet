<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tinnhan extends Migration
{
    public function up()
    {
        Schema::create('tinnhan', function (Blueprint $table) {
            $table->string('IDTinNhan', 10)->primary();
            $table->string('IDNhomTinNhan', 10)->index();
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('NoiDung', 255);
            $table->integer('TinhTrang');
            $table->integer('TrangThai');
            $table->integer('LoaiTinNhan');
            $table->datetime('ThoiGianNhanTin');
            $table->foreign('IDNhomTinNhan')->references('IDNhomTinNhan')->on('nhomtinnhan')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('binhluan');
    }
}
