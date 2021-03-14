<div class="w-14 h-14 relative mx-auto my-3">
    <img src="/{{ $users[0]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
    absolute top-0 right-0" alt="">
    <img src="/{{ $users[1]->AnhDaiDien }}" class="w-10 h-10 rounded-full object-cover 
    absolute bottom-0 left-0" alt="">
</div>
<p class="font-bold dark:text-white text-center text-xl">
    @php
    $name = "";
    @endphp
    @foreach($users as $key => $value)
    @php
    $name .= $value->Ten . ' , '
    @endphp
    @endforeach
    {{ $name }}
</p>