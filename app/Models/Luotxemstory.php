<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luotxemstory extends Model
{
    protected $table = "luotxemstory";

    protected $fillable = [
        'IDLuotXemStory',
        'IDStory',
        'IDXem'
    ];
    public static function add(
        $IDLuotXemStory,
        $IDStory,
        $IDXem
    ) {
        $luotxemstory = new Luotxemstory;
        $luotxemstory->IDNhomTinNhan = $IDLuotXemStory;
        $luotxemstory->TenNhomTinNhan = $IDStory;
        $luotxemstory->IDMauTinNhan = $IDXem;
        $luotxemstory->save();
    }
    public $timestamps = false;
}
