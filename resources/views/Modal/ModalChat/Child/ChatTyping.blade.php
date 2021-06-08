<div id="{{ $idNhomTinNhan.$user->IDTaiKhoan }}Typing" class="mess-user  w-full py-2 flex relative">
    <div class="w-15per relative">
        <a href=""><img class="absolute bottom-1 w-9 h-9 object-cover rounded-full" src="{{ $user->AnhDaiDien }}" alt="" srcset=""></a>
    </div>
    <div class=" pl-2 flex pb-1" style="width: inherit;">
        <div class="w-16 h-8 text-center relative border-none outline-none bg-gray-200 bg-1877F2 p-1.5 rounded-lg">
            <span class="dots-cont">
                <span class="dot dot-1"></span>
                <span class="dot dot-2"></span>
                <span class="dot dot-3"></span>
            </span>
        </div>
    </div>
</div>
<style>
    .dot {
        width: 8px;
        height: 8px;
        background: #22303e;
        display: inline-block;
        border-radius: 50%;
        right: 0px;
        bottom: 0px;
        margin: 0px 2.5px;
        position: relative;
        animation: jump 1s infinite;
    }

    .dots-cont .dot-1 {
        -webkit-animation-delay: 100ms;
        animation-delay: 100ms;
    }

    .dots-cont .dot-2 {
        -webkit-animation-delay: 200ms;
        animation-delay: 200ms;
    }

    .dots-cont .dot-3 {
        -webkit-animation-delay: 300ms;
        animation-delay: 300ms;
    }

    @keyframes jump {
        0% {
            bottom: 0px;
        }

        20% {
            bottom: 10px;
        }

        40% {
            bottom: 0px;
        }
    }
</style>