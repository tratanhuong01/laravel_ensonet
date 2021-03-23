<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Yeucaunguoidung extends Migration
{
    public function up()
    {
        Schema::create('yeucaunguoidung', function (Blueprint $table) {
            $table->string('IDYeuCauNguoiDung', 10)->primary();
            $table->string('EmailDangNhap', 100);
            $table->datetime('NgaySinhTaiKhoan');
            $table->string('DuongDanHinhAnh', 200);
            $table->string('NoiDungYeuCau', 500)->nullable();
            $table->integer('TinhTrangYeuCau');
            $table->datetime('ThoiGianYeuCau');
        });
    }

    public function down()
    {
        Schema::drop('yeucaunguoidung');
    }
}
