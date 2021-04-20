@foreach($reply as $key => $value)
<tr>
    <td class="p-2">{{ $key + 1 }}</td>
    <td class="p-2">
        @switch($value->LoaiYeuCau)
        @case('0')
        <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Cấp lại tài khoản</span>
        @break
        @case('1')
        <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Quá trình sử dụng</span>
        @break
        @endswitch
    </td>
    <td class="p-2">{{ $value->NoiDungYeuCau }}</td>
    <td class="p-2">{{ $value->IDTaiKhoan }}</td>
    <td class="p-2">{{ $value->Ho . ' ' . $value->Ten }}</td>
    <td class="p-2">
        {{ $value->ThoiGianYeuCau }}
    </td>
    <td class="p-2">
        @switch($value->TinhTrangYeuCau)
        @case('0')
        <span class="bg-red-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Chưa xử lí</span>
        @break
        @case('1')
        <span class="bg-yellow-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đang xử lí</span>
        @break
        @case('2')
        <span class="bg-green-500 px-3 py-1.5 text-sm rounded-3xl 
                font-bold text-white">Đã xử lí</span>
        @break
        @endswitch
    </td>
    <td class="p-2">
        <button onclick="openModalViewDetailAd('reply','{{ $value->IDYeuCauNguoiDung }}')" class="py-1.5 px-3 rounded-2xl bg-blue-500 text-sm font-bold text-white">
            Xem chi tiết</button>
    </td>
</tr>
@endforeach