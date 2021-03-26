<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congty extends Model
{
    protected $table = "congty";

    protected $fillable = [
        'IDCongTy',
        'IDTrang',
        'TenCongTy'
    ];
    public static function add()
    {
    }
    public $timestamps = false;
}
