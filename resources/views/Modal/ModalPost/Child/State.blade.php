@foreach($feel as $key => $value)
<div onclick="tickFeel('{{ $value->IDCamXuc }}')" class="tac-user-clone pl-4  dark:hover:bg-dark-third rounded-lg
         cursor-pointer relative" id="feelUserCurrent">
    <div class="tac-user-1 pt-0.5 bg-gray-300 rounded-full dark:bg-dark-third">
        <span class=" text-2xl">{{ $value->BieuTuong }}</span>
    </div>
    <div class="tac-user-2">
        <p class="dark:text-white">{{ $value->TenCamXuc }}</p>
    </div>
    <span class="absolute top-4 right-6" id="{{ $value->IDCamXuc }}Tick">
        @isset(Session::get('feelCur')[$value->IDCamXuc])
        <i class="fas fa-check text-green-400 text-xm"></i>
        @endisset
    </span>
</div>
@endforeach
<input type="hidden" name="IDCamXucPrev" id="IDCamXucPrev" value="">