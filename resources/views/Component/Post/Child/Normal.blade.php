<div class="w-full mx-0 my-4">
    <ul class="w-full flex flex-wrap relative">
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
        @for ($i = 0 ; $i < sizeof($item) ; $i++) @if ($item[$i]->DuongDan == NULL)
            @elseif (sizeof($item) == 1 && $item[$i]->DuongDan != NULL)

            <li class="w-full">
                @if ($item[$i]->Loai == 0)
                <img class="w-full p-1 object-cover" src="{{ $item[$i]->DuongDan }}" alt="" style="max-height:650px;">
                @else
            <li class="w-full relative" id="{{$item[0]->IDBaiDang.$item[0]->IDHinhAnh}}Video">
                <video id="my-video" class="video-js" controls preload="auto" poster="/video/review.mp4" data-setup="{}" style="width: 100%;max-height:350px;height: 350px;">
                    <source src="{{ $item[$i]->DuongDan }}" type="video/mp4" />
                </video>
            </li>
            @endif
            </li>
            @else
            @if (sizeof($item) > 4 && $i == 3)
            @if ($item[$i]->Loai == 0)
            <li class="relative">
                <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                    <img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src="{{ $item[$i]->DuongDan }}" alt="">
                </a>
            </li>
            @else
            <li class="relative" id="{{$item[0]->IDBaiDang.$item[0]->IDHinhAnh}}Video">
                <video id="my-video{{$item[0]->IDBaiDang.$item[0]->IDHinhAnh}}" class="video-js" controls preload="auto" poster="/video/review.mp4" data-setup="{}" style="width:278px;height:285px;">
                    <source src="{{ $item[$i]->DuongDan }}" type="video/mp4" />
                </video>
            </li>
            @endif

            <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                <div class="rounded-lg absolute bottom-1 left-1/2" style="width:273px;height:280px;background:rgba(0, 0, 0, 0.5);">
                    <span class="text-5xl font-bold absolute top-1/2 left-1/2 text-white" style="transform:translate(-50%,-50%);">{{ '+'. (sizeof($item) - 4) }}</span>
                </div>
            </a>
            @break;
            @else
            @if ($item[$i]->Loai == 0)
            <li class="relative">
                <a href="photo/{{ $item[0]->IDBaiDang }}/{{ $item[$i]->IDHinhAnh }}">
                    <img class="p-1 object-cover rounded-lg" style="width:278px;height:285px;" src=" {{ $item[$i]->DuongDan }}" alt="">
                </a>
            </li>
            @else
            <li class="relative">
                <video id="my-video{{$item[$i]->IDHinhAnh}}" class="video-js" controls preload="auto" poster="/video/review.mp4" data-setup="{}" style="width:278px;height:285px;">
                    <source src=" {{ $item[$i]->DuongDan }}" type="video/mp4" />
                </video>
            </li>
            @endif
            @endif
            @endif
            @endfor
    </ul>
</div>