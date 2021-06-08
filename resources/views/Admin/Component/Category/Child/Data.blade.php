<div id="{{$data->FilterOrSort == 'Sort' ? 'sortDataChild' : $data->Query}}" class="mr-2 mt-2 
break-all text-sm w-auto cursor-pointer p-1.5 bg-blue-100 text-blue-500 font-bold">
    <span class="mr-1">
        {{$data->Name}}
    </span>
    :
    <span class="ml-1">
        {{$data->Type}}
    </span>
    &nbsp;&nbsp;&nbsp;
    <span onclick="" id="" class="text-xm">&times;</span>
</div>