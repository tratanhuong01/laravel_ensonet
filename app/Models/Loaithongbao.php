<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaithongbao extends Model
{
    protected $table = "loaithongbao";

    protected $fillable = [
        'IDLoaiThongBao',
        'TenLoaiThongBao',
        'Loai'
    ];

    public $timestamps = false;
}
