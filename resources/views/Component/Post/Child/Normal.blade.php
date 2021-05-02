<div class="w-full mx-0 my-4">
    <ul class="w-full flex flex-wrap relative">
        @for ($i = 0 ; $i < sizeof($item) ; $i++) @if ($item[$i]->DuongDan == NULL)
            @elseif (sizeof($item) == 1 && $item[$i]->DuongDan != NULL)
            <li class="w-full">
                <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                    <img class="w-full p-1 object-cover" style="max-height:650px;" src="{{ $item[$i]->DuongDan }}" alt=""></a>
            </li>
            @else
            @if (sizeof($item) > 4 && $i == 3)
            <li class="relative"><a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}"><img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src="{{ $item[$i]->DuongDan }}" alt=""></a></li>
            <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                <div class="rounded-lg absolute bottom-1 left-1/2" style="width:273px;height:280px;background:rgba(0, 0, 0, 0.5);">
                    <span class="text-5xl font-bold absolute top-1/2 left-1/2 text-white" style="transform:translate(-50%,-50%);">{{ '+'. (sizeof($item) - 4) }}</span>
                </div>
            </a>
            @break;
            @else
            <li class=""><a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}"><img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src="{{ $item[$i]->DuongDan }}" alt=""></a></li>
            @endif
            @endif
            @endfor
    </ul>
</div>