@if (count($friends) == 0)
<p class="dark:text-white font-bold text-center">
    Không tìm thấy tài khoản .
</p>
@else
@foreach($friends as $key => $value)
<div id="{{ $value->IDTaiKhoan }}Tag" onclick="tagFriends('{{ $value->IDTaiKhoan }}')" class="w-full relative flex py-2 px-4 cursor-pointer hover:bg-gray-200 rounded-4xl dark:hover:bg-dark-third">
    <div class="" style="text-align: center;padding-right: 10px">
        <img class="w-12 h-12 rounded-full object-contain" src="/{{ $value->AnhDaiDien }}" alt="">
    </div>
    <div class="tac-user-2" style="padding-top: 1%;padding-left: 2%;">
        <p class="font-bold dark:text-white">{{ $value->Ho .' ' .$value->Ten }}</p>
    </div>
    <span class="absolute top-5 right-8" id="{{ $value->IDTaiKhoan }}Check">
        @isset(Session::get('tag')[$value->IDTaiKhoan])
        <i class="fas fa-check text-green-400 text-xl"></i>
        @endisset
    </span>
</div>
@endforeach
@endif