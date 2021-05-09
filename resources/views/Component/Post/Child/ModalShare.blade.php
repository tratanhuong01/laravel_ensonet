<ul class="w-full">
    <li onclick="sharePost('{{ $idBaiDang }}','CONGKHAI')" class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300">
        <i class='bx bx-share text-2xl pr-2 rotate-90'></i>
        Chia sẽ ngay (Công khai)
    </li>
    <li onclick="sharePost('{{ $idBaiDang }}','CHIBANBE')" class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300">
        <i class='bx bx-share text-2xl pr-2 rotate-90'></i>
        Chia sẽ ngay (Bạn bè)
    </li>
    <li onclick="sharePost('{{ $idBaiDang }}','RIENGTU')" class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300">
        <i class='bx bx-share text-2xl pr-2 rotate-90'></i>
        Chia sẽ ngay (Chỉ mình tôi)
    </li>
    <li class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300">
        <i class="fas fa-user-edit text-xl pr-2"></i>
        Chia sẽ lên bản tin
    </li>
    <li id="btnCopyLink{{ $item[0]->IDBaiDang }}" onclick="copyLinkPost(this,'{{ $item[0]->IDBaiDang }}')" class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300" data-clipboard-target="#post-shortlink{{$item[0]->IDBaiDang}}">
        <i class='bx bx-copy  text-xl pr-2'></i>
        Sao chép liên kết
    </li>
    <li class="w-full flex p-2 cursor-pointer dark:text-white dark:hover:bg-dark-third 
                    hover:bg-gray-300">
        <i class='bx bxl-messenger text-xl pr-2'></i>
        Gửi qua messenger
    </li>
</ul>