<div id="{{ $chater[0]->IDTaiKhoan }}Minize" class="scroll-user w-14 h-14 relative my-3">
    <img onclick="openChat('{{ $chater[0]->IDTaiKhoan }}')" class="shadow-2xl w-14 h-14 rounded-full mx-auto" src="{{ $chater[0]->AnhDaiDien }}" alt="">
    <span onclick="closeMinizeChat('{{ $chater[0]->IDTaiKhoan }}')" class="close-scroll-user hidden text-xm py-0.5 px-2 font-bold rounded-full absolute top-0 
    -right-1 bg-white">&times;</span>
</div>