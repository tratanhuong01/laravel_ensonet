@switch($state)
@case('0')
<span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Bình thường</span>
@break
@case('1')
<span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Checkpoint</span>
@break
@case('2')
<span class="cursor-pointer  bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Khóa</span>
@break
@case('4')
<span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Hạn chế</span>
@break
@case('5')
<span class="cursor-pointer  bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Đang chờ duyệt</span>

@break
@default

@break
@endswitch