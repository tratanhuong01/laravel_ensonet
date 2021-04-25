<?php

use Illuminate\Support\Facades\Session;

$user = session()->has('user') ? Session::get('user') : $user;

?>

@if($message->IDTaiKhoan == $user[0]->IDTaiKhoan)
<p class="w-11/12 z-0 mx-auto font-bold text-sm py-2 text-gray-600 text-center">
    {{ 'Bạn ' . $message->NoiDung }}
</p>
@else
<p class="w-11/12 z-0 mx-auto font-bold text-sm py-2 text-gray-600 text-center">
    {{ $message->Ten . ' ' . $message->NoiDung }}
</p>
@endif