<?php

use App\Process\DataProcess;

?>
@if (count($messages) == 0)

@else

@foreach($messages as $key => $value)
@if(Session::get('user')[0]->IDTaiKhoan == $value->IDTaiKhoan)
@if($value->LoaiTinNhan == 2)
@include('Modal\ModalTroChuyen\Child\ChatCenter',['message' => $value])
@else
@switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
@case('1')
@include('Modal\ModalTroChuyen\Child\ChatRight',['message' => $value])
@break
@case('2')
@include('Modal\ModalTroChuyen\Child\ThuHoiTinNhanR',['message' => $value])
@break
@endswitch
@endif
@else
@if($value->LoaiTinNhan == 2)
@include('Modal\ModalTroChuyen\Child\ChatCenter',['message' => $value])
@else
@switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
@case('1')
@include('Modal\ModalTroChuyen\Child\ChatLeft',['message' => $value])
@break
@case('2')
@include('Modal\ModalTroChuyen\Child\ThuHoiTinNhanL',['message' => $value])
@break
@endswitch
@endif
@endif
@endforeach
@endif