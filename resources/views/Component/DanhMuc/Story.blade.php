<?php

use App\Models\StringUtil;
use App\Process\DataProcessThird;
use App\Process\DataProcessSecond;
use Illuminate\Support\Facades\Session;

$user = session()->has('user') ?
    Session::get('user')[0] :
    Session::get('users')[0];
$storys = DataProcessSecond::getAllStoryOfUsers($user->IDTaiKhoan)

?>
<div class="w-full px-3">
    <div class="font-bold w-full py-2.5" style="font-size: 18px;">
        <p class="py-2 dark:text-white">Tin Của Bạn
        <p>
        <ul class="flex" style="font-size: 15px;">
            <li class="py-2 px-4 text-center" style="color:#0E8DF1;border-bottom:3px solid #0E8DF1">
                Kho lưu trữ tin
            </li>
        </ul>
    </div>
    <div class="w-full flex flex-wrap">
        @foreach($storys as $key => $value)
        <div class="w-1/5 relative story-picVid">
            <div class="w-full" style="height: 284px;">
                <a href=""><img class="p-2.5" src="/{{ $value->DuongDan }}" alt=""></a>
            </div>
            <span class="font-bold text-white absolute top-2 left-4 text-sm" style="line-height: 35px;color: black;font-size: 14px;">
                {{ StringUtil::getChillDateTime($value->ThoiGianDangStory)[0] 
                . ' tháng ' . StringUtil::getChillDateTime($value->ThoiGianDangStory)[1] }} <i class="fas fa-circle text-xm px-2" style="color: #1876F2;font-size: 12px;"></i></span>
            <span class="views-story absolute text-black" style="display: none;bottom: 15px;left: 24px;"><i class="fas fa-eye"></i>&nbsp;&nbsp;
                {{ count(DataProcessThird::getViewStoryByIDStory($value->IDStory,$user->IDTaiKhoan)) }}</span>
        </div>
        @endforeach
    </div>
</div>
<div class="w-full mx-auto my-2">
    <a class="block p-2.5 text-center font-bold rounded-lg bg-gray-300 dark:bg-dark-third dark:text-white" href="">Xem tất cả</a>
</div>