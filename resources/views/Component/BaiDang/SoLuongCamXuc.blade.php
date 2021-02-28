<?php

use Illuminate\Support\Facades\Session;

if (session()->has('users'))
    $u = Session::get('users');
else
    $u = Session::get('user');
$uf = '';
for ($i = 0; $i < count($arr[2]); $i++)
    if ($u[0]->IDTaiKhoan == $u[0]->IDTaiKhoan) {
        $uf = $u[0]->IDTaiKhoan;
        break;
    }
$path = '';
?>
@if ($uf == $u[0]->IDTaiKhoan)
{{ $arr[0] }}&nbsp; <span class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold">Bạn và&nbsp;</span>
<span onclick="viewDetailFeel('{{ $arr[2][0]->IDBaiDang }}','{{ $path }}')" style="font-size: 17px;" class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold">
    {{ $arr[1] - 1 }}&nbsp;<span class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold">người khác</span>
</span>
@else
{{ $arr[0] }}&nbsp;
<span onclick="viewDetailFeel('{{ $arr[2][0]->IDBaiDang }}','{{ $path }}')" style="font-size: 17px;" class="cursor-pointer dark:text-gray-300 text-gray-600 font-bold">
    {{ $arr[1] }}
</span>
@endif