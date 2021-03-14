<?php

use Illuminate\Support\Facades\Session;

$user = Session::get('user');

?>

@if($message->IDTaiKhoan == $user[0]->IDTaiKhoan)
<p class="w-11/12 mx-auto font-bold text-sm py-2 text-gray-300 text-center">
    {{ 'Bạn ' . $message->NoiDung }}
</p>
@else
<p class="w-11/12 mx-auto font-bold text-sm py-2 text-gray-300 text-center">
    {{ $message->Ten . ' ' . $message->NoiDung }}
</p>
@endif