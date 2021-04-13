<?php

namespace App\Process;

use Illuminate\Database\Eloquent\Model;

class DataProcessSix extends Model
{
    public static function CheckIsImage($nameFile)
    {
        $typeFile = ['PNG', 'png', 'jpg', 'JPG', 'gif', 'GIF'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
    public static function CheckIsVideo($nameFile)
    {
        $typeFile = ['MP4', 'mp4', 'MOV', 'mov', 'mkv', 'MKV'];
        foreach ($typeFile as $key => $value) {
            if (substr($nameFile, -3) == $value)
                return true;
        }
    }
}
