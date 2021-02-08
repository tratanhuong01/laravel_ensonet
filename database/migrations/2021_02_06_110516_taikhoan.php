<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taikhoan extends Migration
{
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->string('IDTaiKhoan',10)->primary();
            $table->string('MatKhau', 100);
            $table->string('Ho', 100);
            $table->string('Ten', 100);
            $table->string('Email', 100)->nullable();
            $table->string('SoDienThoai', 10)->nullable();
            $table->string('CodeEmail',8)->nullable();
            $table->string('CodeSoDienThoai',8)->nullable();
            $table->string('AnhDaiDien',100);
            $table->string('AnhBia', 100)->nullable();
            $table->string('GioiTinh', 10);
            $table->datetime('NgaySinh');
            $table->string('MoTa',255)->nullable();
            $table->integer('LanDangNhap');
            $table->integer('LoaiTaiKhoan');
            $table->integer('XacMinh');
            $table->integer('TinhTrang');
            $table->datetime('NgayTao');
        });
    }

    public function down()
    {
        Schema::drop('taikhoan');
    }
}
