<ul class="flex flex-wrap pl-1 z-20 mainDataImage">
    @if (count($json) == 1)
    <li class="w-full">
        <img src="/{{$json[0]->DuongDan}}" class="object-cover rounded-lg" alt="">
    </li>
    @elseif (count($json) == 2)
    <li id="" class="dataTwo w-1/2 pb-1/2 pr-2 text-center relative">
        <img src="/{{$json[0]->DuongDan}}" class="object-cover rounded-lg w-full dataTwoImage" alt="">
    </li>
    <li class="dataTwo w-1/2 pb-1/2  text-center relative">
        <img src="/{{$json[1]->DuongDan}}" class="object-cover rounded-lg w-full dataTwoImage" alt="">
    </li>
    @else
    @foreach($json as $key => $value)
    <li class="w-32% text-center mb-2 mr-0.5">
        <img src="/{{$value->DuongDan}}" class="object-cover rounded-lg dataThreeImage" alt="">
    </li>
    @endforeach
    @endif
</ul>