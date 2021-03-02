<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Camxucbinhluan extends Migration
{
    public function up()
    {
        Schema::create('camxucbinhluan', function (Blueprint $table) {
            $table->string('IDCamXucBinhLuan', 10)->primary();
            $table->string('IDBinhLuan', 10)->index();
            $table->string('IDTaiKhoan', 10)->index();
            $table->integer('LoaiCamXuc');
            $table->datetime('ThoiGianCamXuc');
            $table->foreign('IDBinhLuan')->references('IDBinhLuan')->on('binhluan')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('camxucbinhluan');
    }
}
