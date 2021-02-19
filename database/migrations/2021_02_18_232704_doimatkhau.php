<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doimatkhau extends Migration
{
    
    public function up()
    {
        Schema::create('doimatkhau', function (Blueprint $table) {
            $table->increments('IDDoiMatKhau');
            $table->string('IDTaiKhoan', 10)->index();
            $table->string('MatKhauCu',100);
            $table->datetime('NgayDoi');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('doimatkhau');
    }
}
