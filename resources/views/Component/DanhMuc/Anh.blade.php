<div class="w-full mx-auto py-2 pt-3 dark:bg-dark-second rounded-lg">
    <div class="w-full px-3 py-2">
        <div class="font-bold w-full py-2.5" style="font-size: 18px;">
            <p class="py-2 dark:text-white">Ảnh
            <p>
            <ul class="flex" style="font-size: 15px;">
                <li class="cursor-pointer py-2 px-4 text-center dark:text-white" style="color:#0E8DF1;border-bottom:3px solid #0E8DF1">
                    Ảnh có
                    mặt bạn</li>
                <li class="cursor-pointer py-2 px-4 text-center text-gray-600 dark:text-white">Ảnh của Hưởng</li>
                <li class="cursor-pointer py-2 px-4 text-center text-gray-600 dark:text-white">Album</li>
            </ul>
        </div>
        <style>
            .case:hover .edit {
                display: block;
            }
        </style>
        <div class="w-full flex flex-wrap main-friends">
            <?php

            use App\Process\DataProcessFour;
            use Illuminate\Support\Facades\Session;

            $imageTag = DataProcessFour::sortImageByUser(Session::get('users')[0]->IDTaiKhoan);
            ?>

            @foreach($imageTag as $key => $value)
            <div class="w-1/5 relative case">
                <a href=""><img src="/{{$value->DuongDan}}" alt="" class="w-44 h-44 p-1.5 object-cover rounded-lg"></a>
                <div onclick="openEditPicture('{{$key}}')" class="cursor-pointer edit top-4 right-4 absolute w-10 h-10 rounded-full
                 pt-1.5 pl-2.5 text-lg" style="background-color: rgba(256,256,256, 0.2);">
                    <i class="fas fa-pencil-alt text-gray-100"></i>
                </div>
                <div style="display: none;left:90%;" class="edit-friend bg-white my-2 absolute top-0
                w-72 p-2 border-2 border-solid rounded-lg dark:bg-dark-second">
                    <ul class="w-full">
                        <!-- <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="far fa-star text-xl pr-2"></i>
                            Yêu thích
                        </li>
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-edit text-xl pr-2"></i>
                            Chỉnh sửa danh sách bạn bè
                        </li> -->
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-edit text-xl pr-2"></i>
                            Xóa ảnh
                        </li>
                        <li class="w-full flex p-3 cursor-pointer dark:text-white dark:hover:bg-dark-third">
                            <i class="fas fa-user-slash text-xl pr-2"></i>
                            Tải xuống
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            <style>
                .edit {
                    display: none;
                }

                .case:hover .edit {
                    display: block;
                }
            </style>
        </div>
    </div>
    <div class="w-full mx-auto my-2">
        <a class="block p-2.5 text-center font-bold rounded-lg bg-gray-300 dark:bg-dark-third dark:text-white" href="">Xem tất cả</a>
    </div>
</div>