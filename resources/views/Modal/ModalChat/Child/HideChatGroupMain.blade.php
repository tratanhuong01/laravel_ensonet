<div id="{{$idNhomTinNhan}}Minize" class="scroll-user w-14 h-14 relative">
    <div class="w-14 h-14 relative mx-auto">
        <img onclick="openChatGroup('{{ $idNhomTinNhan }}')" src="{{ $chater[0]->AnhDaiDien }}" class="w-9 h-9 rounded-full object-cover 
                    absolute top-0 right-0" alt="">
        <img onclick="openChatGroup('{{ $idNhomTinNhan }}')" src="{{ $chater[1]->AnhDaiDien }}" class="w-9 h-9 rounded-full object-cover 
                    absolute bottom-0 left-0" alt="">
    </div>
    <span onclick="closeMinizeChat('{{ $idNhomTinNhan }}')" class="close-scroll-user hidden text-xm py-0.5 px-2 font-bold rounded-full absolute top-0 
    -right-1 bg-white">&times;</span>
</div>