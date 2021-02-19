<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Baidang extends Migration
{
    public function up()
    {
        Schema::create('baidang', function (Blueprint $table) {
            $table->string('IDBaiDang',10)->primary();
            $table->string('IDTaiKhoan',10)->index();
            $table->string('IDQuyenRiengTu', 50)->index();
            $table->string('NoiDung',255)->nullable();
            $table->string('GanThe',255)->nullable();
            $table->string('IDCamXuc',10)->index();
            $table->string('IDViTri', 10)->index();
            $table->datetime('NgayDang');
            $table->integer('LoaiBaiDang');
            $table->foreign('IDQuyenRiengTu')->references('IDQuyenRiengTu')->on('quyenriengtu')->onDelete('cascade');
            $table->foreign('IDTaiKhoan')->references('IDTaiKhoan')->on('taikhoan')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::drop('baidang');
    }
}
