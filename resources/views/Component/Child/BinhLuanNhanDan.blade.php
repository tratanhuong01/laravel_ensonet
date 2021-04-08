<div class="w-full relative">
    <div class="w-10/12 ml-16 mt-5">
        <div class="w-20 my-1">
            <div class="w-20 h-20 max-w-20 max-h-20 p-1 overflow-hidden bg-size:{{ $value->Cot }}:{{ $value->Hang }} 
         stickerAnimation:{{ $value->Cot }}:{{ $value->Hang }} relative" style="background-image: url('/{{ $value->DuongDanNhanDan }}');">
            </div>
        </div>
    </div>
    <span onclick="closeCommentImage('{{$idBaiDang}}','{{$idBinhLuan}}')" class="cursor-pointer font-bold text-2xl dark:text-white 
        absolute top-1 right-2">&times;</span>
</div>