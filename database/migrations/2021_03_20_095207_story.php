<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Story extends Migration
{
    public function up()
    {
        Schema::create('story', function (Blueprint $table) {
            $table->string('IDStory', 10)->primary();
            $table->string('IDQuyenRiengTu', 10)->index();
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('IDPhongNen', 10)->index();
            $table->string('DuongDan', 100);
            $table->integer('LoaiStory');
            $table->datetime('ThoiGianDangStory');
            $table->foreign('IDPhongNen')->references('IDPhongNen')->on('phongnen')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
            $table->foreign('IDQuyenRiengTu')->references('IDQuyenRiengTu')->on('quyenriengtu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('story');
    }
}
