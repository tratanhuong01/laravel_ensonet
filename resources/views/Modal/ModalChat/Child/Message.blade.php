<?php

use App\Process\DataProcess;

?>
@if (count($messages) == 0)

@else

@foreach($messages as $key => $value)
@if(Session::get('user')[0]->IDTaiKhoan == $value->IDTaiKhoan)
@if($value->LoaiTinNhan == 2)
@include('Modal\ModalChat\Child\ChatCenter',['message' => $value])
@else
@switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
@case('1')
@include('Modal\ModalChat\Child\ChatRight',['message' => $value])
@break
@case('2')
@include('Modal\ModalChat\Child\RetrievalMessageR',['message' => $value])
@break
@endswitch
@endif
@else
@if($value->LoaiTinNhan == 2)
@include('Modal\ModalChat\Child\ChatCenter',['message' => $value])
@else
@switch(explode('#',DataProcess::getState($value->TinhTrang,Session::get('user')[0]->IDTaiKhoan))[1])
@case('1')
@include('Modal\ModalChat\Child\ChatLeft',['message' => $value])
@break
@case('2')
@include('Modal\ModalChat\Child\RetrievalMessageL',['message' => $value])
@break
@endswitch
@endif
@endif
@endforeach
@endif