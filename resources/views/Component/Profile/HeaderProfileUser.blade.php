<div class="w-full relative">
    <div class="w-full mx-auto relative">
        <div class="w-full relative h-60 lg:h-96">
            <a id="ajaxCover">
                <img class="w-full h-60 object-cover lg:h-96 rounded-lg" id="anhBia" src="{{ $user[0]->AnhBia }}" alt="">
            </a>
            <div class="w-full h-60 lg:h-96 absolute top-0 left-0 z-20 bg-opacity-50 
            bg-white hidden" id="loadingUpdateCover">
                <div class="w-full h-full relative">
                    <i class="fas fa-spinner fa-pulse absolute top-1/3 left-48% text-5xl 
                    transform -translate-y-1/2 -translate-x-1/2 mr-7"></i>
                </div>
            </div>
        </div>
        <div class="z-40 p-2 bg-gray-100 absolute text-center rounded-lg bottom-3 right-3">
            <form id="form">
                {{ csrf_field() }}
                <input onchange="changeBia(event)" name="fileBia" type="file" accept="image" id="changeB" style="display: none" enctype="multipart/form-data">
            </form>
            <label for="changeB" class="flex"><i class="fas fa-camera text-2xl pl-1">
                </i>&nbsp;&nbsp;<span class="hidden lg:inline pt-1">Chỉnh sửa ảnh bìa</span>
            </label>
        </div>
        <div id="showSubmitBia" class="w-full h-16 absolute left-0 top-6 p-2 text-right 
                        " style="background: rgba(0,0,0,0.5);display:none;">
            <form action="" method="post" id="formUpdateCover" enctype="multipart/form-data">
                {{ csrf_field() }}
                <a href="" class="cursor-pointer font-bold border-none bg-blue-600 text-white 
                            p-3">Hủy</a>
                <input type="button" onclick="updateCoverImage()" value="Lưu Thay Đổi" class="cursor-pointer font-bold border-none bg-blue-600 ml-3 text-white p-2.5" />
            </form>
        </div>
        <div class="w-full absolute text-center top-20 lg:top-6/10 z-30">
            <a href="" id="ajaxAnhDaiDien">
                <img class="w-44 h-44 rounded-full mx-auto border-4 border-solid border-white 
                object-cover" src="{{ $user[0]->AnhDaiDien }}" alt="">
            </a>
            <p class="font-bold flex text-center text-3xl py-2 dark:text-white 
                        justify-center" style="font-family: system-ui;">{{ $users[0]->Ho . ' ' . $users[0]->Ten }}
                <span class="ml-3 mt-3.5 bg-blue-500 rounded-full 
                            text-sm font-bold text-white w-4 h-4 flex">
                    <i class='bx bx-check flex justiy-center items-center '></i>
                </span>
            </p>
        </div>
        <div class="text-2xl absolute z-40 bg-gray-100 rounded-full" style="top: 95%;left: 54%;padding: 2px 6px;">
            <form id="formAvatar" method="POST" action="ProcessViewAvatar" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input onchange="changeAvatar(event)" name="fileAvatar" type="file" accept="image" id="changeavt" style="display: none">
                <label for="changeavt"><i class="fas fa-camera"></i></label>
            </form>

        </div>
    </div>
</div>
<div class="w-full relative">
    <div class="mx-auto text-center w-63%" style="margin-top: 68px;">
        <p id="DescribeUser" class="outline-none text-center py-2 dark:text-white">
            {!! $user[0]->MoTa !!}
        </p>
        <div class="w-full pt-2">
            <button onclick="editDescribeUser('{{ $user[0]->IDTaiKhoan }}',this)" style="color: #1876F2;font-size: 18px;" state='true'>Chỉnh sửa</button>
        </div>
        <br>
    </div>
</div>
<hr class="w-full md:w-4/5 lg:w-3/4 md:mx-auto xl:w-full mb-2 bg-gray-200 
                    dark:bg-dark-second">