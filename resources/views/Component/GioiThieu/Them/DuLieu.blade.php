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
@case('NameSchool')
@foreach($data as $key => $value)
<div onclick="choose('IDTruongHoc',
    '{{ $value->IDTruongHoc }}',
    '{{ $value->TenTrang == NULL ? $value->TenTruongHoc : $value->TenTrang }}',
    'schoolNameInput',
    'IDTruongHocs',
    'NameSchool')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/{{ $value->AnhDaiDien == NULL ? 'img/completed.png' : $value->AnhDaiDien }}" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->TenTrang == NULL ? $value->TenTruongHoc : $value->TenTrang }}
    </div>
</div>
@endforeach
@break
@case('TypeSchool')
@foreach($data as $key => $value)
<div onclick="choose('TypeSchool',
    '{{ $value->LoaiTruong }}',
    '{{ $value->LoaiTruong }}',
    'schoolTypeInput',
    'LoaiTruong',
    'TypeSchool')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/img/completed.png" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->LoaiTruong }}
    </div>
</div>
@endforeach
@break
@case('LiveCurrents')
@foreach($data as $key => $value)
<div onclick="choose('IDDiaChiLive',
    '{{ $value->IDDiaChi }}',
    '{{ $value->TenTrang == NULL ? $value->TenDiaChi : $value->TenTrang }}',
    'liveCurrentInput',
    'IDDiaChiLive',
    'LiveCurrents')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
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
@case('PlaceHomeTown')
@foreach($data as $key => $value)
<div onclick="choose('IDDiaChiHome',
    '{{ $value->IDDiaChi }}',
    '{{ $value->TenTrang == NULL ? $value->TenDiaChi : $value->TenTrang }}',
    'homeTownInput',
    'IDDiaChiHome',
    'PlaceHomeTown')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
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