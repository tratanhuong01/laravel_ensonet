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
@case('PlaceLived')
@foreach($data as $key => $value)
<div onclick="choose('IDNoiTungSong',
    '{{ $value->IDDiaChi }}',
    '{{ $value->TenTrang == NULL ? $value->TenDiaChi : $value->TenTrang }}',
    'placeLivedInput',
    'IDDiaChiLived',
    'PlaceLived')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
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
@case('NameOthers')
@foreach($data as $key => $value)
<div onclick="choose('TypeNickName',
    '{{ $value->LoaiBietDanh }}',
    '{{ $value->LoaiBietDanh }}',
    'TypeNickNameInput',
    'TypeNickNamess',
    'NameOthers')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/img/completed.png" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->LoaiBietDanh }}
    </div>
</div>
@endforeach
@break
@case('Sexs')
@foreach($data as $key => $value)
<div onclick="choose('IDSex',
    '{{ $value->TenGioiTinh }}',
    '{{ $value->TenGioiTinh }}',
    'SexInput',
    'IDSex',
    'Sexs')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/img/completed.png" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->TenGioiTinh }}
    </div>
</div>
@endforeach
@break
@case('RelationShip')
@foreach($data as $key => $value)
<div onclick="choose('IDRelationShip',
    '{{ $value->TinhTrang }}',
    '{{ $value->TinhTrang }}',
    'RelationShipInput',
    'IDRelationShips',
    'RelationShip')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/img/completed.png" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->TinhTrang }}
    </div>
</div>
@endforeach
@break
@case('MemberFamily')
@foreach($data as $key => $value)
<div onclick="choose('IDMemberFamily',
    '{{ $value->IDTaiKhoan }}',
    '{{ $value->IDTaiKhoan }}',
    'MemberFamilyInput',
    'IDMemberFamilys',
    'MemberFamily')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="{{ $value->AnhDaiDien }}" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->Ho . ' ' . $value->Ten }}
    </div>
</div>
@endforeach
@break
@case('RelationShipFamily')
@foreach($data as $key => $value)
<div onclick="choose('IDRelationShipFamily',
    '{{ $value->MoiQuanHe }}',
    '{{ $value->MoiQuanHe }}',
    'RelationShipFamilyInput',
    'IDRelationShipFamilys',
    'RelationShipFamily')" class="w-full p-2 hover:bg-gray-300 dark:hover:bg-dark-third cursor-pointer 
    dark:text-white flex rounded-lg flex font-bold">
    <div class="mr-3">
        <img src="/img/completed.png" class="w-10 h-10 object-cover rounded-full" alt="">
    </div>
    <div class="font-bold dark:text-white py-2">
        {{ $value->MoiQuanHe }}
    </div>
</div>
@endforeach
@break
@endswitch