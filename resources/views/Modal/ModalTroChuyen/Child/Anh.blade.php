<ul class="flex flex-wrap pl-1 z-20" style="width: 200px;">
    @if (count($json) == 1)
    <li class="w-full">
        <img src="/{{$json[0]->DuongDan}}" class="object-cover rounded-lg" alt="" style="width: 200px;">
    </li>
    @elseif (count($json) == 2)
    <li class="w-48% mr-1.5 text-center">
        <img src="/{{$json[0]->DuongDan}}" class="object-cover rounded-lg" alt="" style="width: 100px;height:100px;">
    </li>
    <li class="w-48% text-center">
        <img src="/{{$json[1]->DuongDan}}" class="object-cover rounded-lg" alt="" style="width: 100px;height:100px;">
    </li>
    @else
    @foreach($json as $key => $value)
    <li class="w-1/3 text-center mb-2">
        <img src="/{{$value->DuongDan}}" class="object-cover rounded-lg" alt="" style="width: 60px;height:60px;">
    </li>
    @endforeach
    @endif
</ul>