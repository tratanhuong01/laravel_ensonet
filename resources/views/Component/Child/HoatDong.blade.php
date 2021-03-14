<?php

use App\Models\Taikhoan;

$userOOF = Taikhoan::where('IDTaiKhoan', '=', $IDTaiKhoan)->get()[0];

?>
@if($userOOF->HoatDong == 0)
@else
<span class="bg-green-600 {{ $padding }} border-2 border-solid border-white rounded-full
            absolute {{ $bottom }} {{ $right }} ">
</span>
@endif