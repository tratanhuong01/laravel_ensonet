<div class="mess-user w-full py-1 flex relative">
    <div class="mess-user-r relative">
        <i class="mess-user-feel hidden cursor-pointer fas fa-heart color-word absolute right-0 top-1/2 pr-2" style="transform: translateY(-50%);"></i>
    </div>
    <div class="mess-user-r1 pl-2 flex mr-4" style="width: inherit;">
        <div class="mess-right break-all ml-auto border-none outline-none bg-blue-500 p-1.5 rounded-lg 
                text-white " style="max-width:65%;font-size: 15px;">
            {{ $message[0]->NoiDung }}
        </div>
    </div>
    <div class="mess-user-r2 " style="width: 4%;">
        <div class="w-full clear-both">
            <i class="far fa-check-circle img-mess-right absolute bottom-1.5 text-gray-300"></i>
            <i class="fas fa-check-circle img-mess-right absolute hidden ml-2 "></i>
            <img src="img/avatar.jpg" class="hidden img-mess-right absolute w-7 h-7 p-0.5 object-cover rounded-full" alt="">
        </div>
    </div>
</div>