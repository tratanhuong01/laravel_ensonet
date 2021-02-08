<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moiquanhe extends Migration
{
    public function up()
    {
        Schema::create('moiquanhe', function (Blueprint $table) {
            $table->increments('IDMoiQuanHe');
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('IDBanBe', 10);
            $table->integer('TinhTrang');
            $table->date('NgayGui');
            $table->date('NgayChapNhan')->nullable();
            $table->integer('TheoDoi');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('moiquanhe');
    }
}
