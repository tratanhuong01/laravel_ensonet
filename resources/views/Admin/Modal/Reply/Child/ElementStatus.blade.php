@switch($value->TinhTrangYeuCau)
@case('-2')
<span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Đã duyệt</span>
@break
@case('-1')
<span class="bg-red-900 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Chưa duyệt</span>
@break
@case('0')
<span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Từ chối duyệt</span>
@break
@case('1')
<span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Đang duyệt</span>
@break
@case('2')
<span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
font-bold text-white">Đã duyệt</span>
@break
@endswitch