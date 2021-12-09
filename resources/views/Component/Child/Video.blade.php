@include('Timeline.Picture')
<div class="w-full flex flex-wrap hidden mainChildVideo" id="mainChildVideo">
    @foreach($video as $key => $value)
    <div class="w-1/5 relative case">
        <a href="">
            <div class="w-44 h-44 m-1.5 cursor-pointer relative">
                <div class="w-full absolute top-0 left-0 bg-black
                    bg-opacity-50 h-full news__view">
                    <div class="w-full relative h-full">
                        <div class="w-full absolute top-1/2 left-1/2 transform -translate-y-1/2 
                        -translate-x-1/2 flex justify-center flex-wrap">
                            <i class='bx bx-play-circle text-6xl cursor-pointer text-white '></i>
                        </div>
                    </div>
                </div>
                <i class='bx bx-play-circle absolute text-6xl cursor-pointer text-white absolute top-1/2  
                left-1/2 transform -translate-y-1/2 -translate-x-1/2 news_bntPlay'></i>
                <video src="{{$value->DuongDan}}" class="w-full max-h-148 h-full object-cover"></video>
            </div>
        </a>
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
</div>
<script>
    setTimeout(function() {
        $('.removeTimelinePicture').remove();
        $('.mainChildVideo').removeClass('hidden');
    }, 1000)
</script>