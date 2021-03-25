<?php

namespace App\Process;

use Illuminate\Database\Eloquent\Model;

class DataProcessFour extends Model
{
    public static function checkPlaceWork($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->CongViec) == 0 ? 0 : 1;
    }
    public static function checkSchool($jsonGioiThieu)
    {
        return 0;
    }
    public static function checkPlaceLived($jsonGioiThieu)
    {
        return count($jsonGioiThieu->CongViecHocVan->CongViec) == 0 ? 0 : 1;
    }
}
