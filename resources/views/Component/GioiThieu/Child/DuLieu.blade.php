@switch($type)
@case('Companies')
@foreach($data as $key => $value)
<div onclick="choose('IDCongTy',
    '{{ $value->IDCongTy }}',
    '{{ $value->TenTrang == NULL ? $value->TenCongTy : $value->TenTrang }}',
    'companiesInput',
    'IDCongTys',
    'Companies')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/{{ $value->AnhDaiDien == NULL ? 'img/completed.png' : $value->AnhDaiDien }}" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->TenTrang == NULL ? $value->TenCongTy : $value->TenTrang }}
    </div>
</div>
@endforeach
@break
@case('CityAndTown')
@foreach($data as $key => $value)
<div onclick="choose('IDDiaChi',
    '{{ $value->IDDiaChi }}',
    '{{ $value->TenTrang == NULL ? $value->TenDiaChi : $value->TenTrang }}',
    'cityAndTownInput',
    'IDDiaChis',
    'CityAndTown')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/{{ $value->AnhDaiDien == NULL ? 'img/completed.png' : $value->AnhDaiDien }}" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->TenTrang == NULL ? $value->TenDiaChi : $value->TenTrang }}
    </div>
</div>
@endforeach
@break
@endswitch