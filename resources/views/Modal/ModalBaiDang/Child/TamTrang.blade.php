@foreach($feel as $key => $value)
<div class="tac-user-clone pl-4  dark:hover:bg-dark-third rounded-lg
         cursor-pointer" id=" feelUserCurrent">
    <div class="tac-user-1 pt-0.5 bg-gray-300 rounded-full dark:bg-dark-third">
        <span class=" text-2xl">{{ $value->BieuTuong }}</span>
    </div>
    <div class="tac-user-2">
        <p class="dark:text-white">{{ $value->TenCamXuc }}</p>
    </div>
</div>
@endforeach