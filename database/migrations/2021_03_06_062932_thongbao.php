<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thongbao extends Migration
{
    public function up()
    {
        Schema::create('thongbao', function (Blueprint $table) {
            $table->string('IDThongBao', 10)->primary();
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('IDLoaiThongBao', 10)->index();
            $table->string('IDContent', 10)->index();
            $table->string('IDGui', 10);
            $table->integer('TinhTrang');
            $table->datetime('ThoiGianThongBao');
            $table->foreign('IDLoaiThongBao')->references('IDLoaiThongBao')->on('loaithongbao')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('thongbao');
    }
}
