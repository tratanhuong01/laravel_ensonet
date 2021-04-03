<?php

namespace App\Process;

use App\Models\Tinnhan;
use App\Process\DataProcess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataProcessFive extends Model
{
    public static function getIndexOfStory($allStory, $story)
    {
        foreach ($allStory as $key => $value) {
            if (count($value) == 0) {
            } else {
                if ($value[0]->IDTaiKhoan ==  $story[0]->IDTaiKhoan) {
                    return $key;
                    break;
                }
            }
        }
    }
}
