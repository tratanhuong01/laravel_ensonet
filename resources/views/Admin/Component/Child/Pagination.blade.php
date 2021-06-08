@if ($index != 0)
<li class="w-7 h-9 m-0.5 bg-gray-500 justify-center cursor-pointer
font-bold text-white text-center flex items-center">
    <i class="fas fa-caret-left"></i>
</li>
@else

@endif
@for($i=0;$i<$num;$i++) @if($i==round($index/10)) <li onclick="paginationAdmin('{{ $name }}','{{ $i }}')" class="active w-7 h-9 m-0.5 bg-green-500 justify-center cursor-pointer
font-bold text-white text-center flex items-center">{{ $i }}</li>
    @else
    <li onclick="paginationAdmin('{{ $name }}','{{ $i }}')" class=" w-7 h-9 m-0.5 bg-yellow-500 justify-center cursor-pointer
            font-bold text-white text-center flex items-center">{{ $i }}</li>
    @endif
    @endfor
    @if ($index >= ($num - 1)*10)
    @else
    <li onclick="paginationAdmin('{{ $name }}','{{ $i }}')" class="w-7 h-9 m-0.5 bg-gray-500 justify-center cursor-pointer
    font-bold text-white text-center flex items-center">
        <i class="fas fa-caret-right"></i>
    </li>
    @endif