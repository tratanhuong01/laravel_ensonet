<p class="dark:text-white my-1">{{$json->NoiDungBinhLuan}}</p>
@php
$path = "comment/" . $idBinhLuan . "/" . $idHinhAnh;
@endphp
<a href="{{ url($path) }}">
    <img src="{{$json->DuongDan}}" class="w-72 h-56 mt-3 object-cover" alt="">
</a>