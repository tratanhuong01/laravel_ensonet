<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quyenriengtu extends Migration
{
    public function up()
    {
        Schema::create('quyenriengtu', function (Blueprint $table) {
            $table->string('IDQuyenRiengTu',100)->primary();
            $table->string('TenQuyenRiengTu', 100);
        });
    }

    public function down()
    {
        Schema::drop('quyenriengtu');
    }
}
