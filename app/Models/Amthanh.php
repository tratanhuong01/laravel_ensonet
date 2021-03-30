<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amthanh extends Model
{
    protected $table = "amthanh";

    protected $fillable = [
        'IDAmThanh',
        'TenAmThanh',
        'TacGia',
        'DuongDanAmThanh'
    ];
    public $timestamps = false;
}
