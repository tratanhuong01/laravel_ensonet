<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Binhluan extends Migration
{
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->string('IDBinhLuan', 10)->primary();
            $table->string('IDBaiDang', 10)->index();
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('NoiDungBinhLuan', 255);
            $table->integer('LoaiBinhLuan');
            $table->string('PhanHoi', 100)->nullable();
            $table->datetime('ThoiGianBinhLuan');
            $table->foreign('IDBaiDang')->references('IDBaiDang')->on('baidang')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('binhluan');
    }
}
