<div class="w-2/5 absolute top-1/2 left-1/2 transform -translate-x-1/2 rounded-lg
        -translate-y-1/2 border-2 border-gray-300 border-solid shadow-xl bg-white">
    <div class="w-full relative py-3 border-b-2 border-gray-300 border-solid">
        <p class="font-bold text-2xl text-center">{{ $modal->title }}</p>
        <span onclick="closePost()" class="w-10 h-10 bg-gray-300 rounded-full font-bold text-2xl 
            flex justify-center pt-1 cursor-pointer top-2 right-2 absolute">
            &times;
        </span>
    </div>
    <div class="w-full p-2">
        <form action="" method="POST" class="w-11/12 mx-auto" id="form">
            @foreach ($modal->data as $key => $value)
            <div class="w-full py-2 flex">
                <label class="w-3/12 flex items-center mr-6 font-bold">
                    {{$value->Label}} :
                </label>
                @switch($value->Type)
                @case('Input')
                @if ($value->Data->disabled == 'true' )
                <input type="text" name="{{ $value->Data->name }}" id="{{ $value->Data->name }}" placeholder="{{ $value->Data->placeHolder }}" class="w-9/12 p-2 bg-gray-100 border-solid  border-blue-500 
                border-2 rounded-lg" value="{{$id}}" disabled>
                @else
                <input type="text" name="{{ $value->Data->name }}" id="{{ $value->Data->name }}" placeholder="{{ $value->Data->placeHolder }}" class="w-9/12 p-2 bg-gray-100 border-solid  border-blue-500 
                border-2 rounded-lg">
                @endif
                @break
                @case('Select')
                <select name="{{ $value->Data->Select->name }}" id="{{ $value->Data->Select->name }}" class="w-9/12 p-2 bg-gray-100 border-solid  border-blue-500 
                border-2 rounded-lg">
                    @foreach ($value->Data->Option as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @break
                @case('File')
                @switch($value->Accept)
                @case('image')
                <div class="flex items-start w-9/12">
                    <input onchange="onChangePreviewImageDemo(event)" type="file" name="{{ $value->Data->name }}" id="{{ $value->Data->id }}" accept="{{ $value->Accept }}" class="w-1/2 pr-5 my-5 hidden">
                    <label for="{{ $value->Data->id }}" class="flex items-center py-1.5 px-5 bg-red-500 
                    font-bold text-white mr-5 rounded-lg my-4">
                        <i class='bx bx-upload mt-0.5 text-2xl mr-3 
                            flex items-center'></i>
                        <span class="flex items-center">Chọn File....</span>
                    </label>
                    <img src="" id="imageDemo" class="w-20 h-20 bg-gray-500 object-cover">
                </div>
                @break
                @case('audio/mp3')
                <div class="flex items-start flex-wrap w-9/12">
                    <input onchange="onChangePreviewSoundDemo(event)" type="file" name="{{ $value->Data->name }}" id="{{ $value->Data->id }}" accept="{{ $value->Accept }}" class="w-1/2 pr-5 
                    flex items-center hidden">
                    <label for="{{ $value->Data->id }}" class="flex items-center py-1.5 px-5 bg-red-500 
                    font-bold text-white mr-5 rounded-lg my-4">
                        <i class='bx bx-upload mt-0.5 text-2xl mr-3 
                            flex items-center'></i>
                        <span class="flex items-center">Chọn File....</span>
                    </label>
                    <button id="btnPlay" onclick="playMusic(this)" type="button" class="font-bold my-4 
                    p-2.5 rounded-lg bg-gray-500 text-white font-bold">Phát</button>
                    <span class="my-4 font-bold w-full" id="nameSound"></span>
                </div>
                @break
                @default

                @endswitch
                @break
                @default
                @endswitch

            </div>
            @endforeach
            <div class="w-full py-2 my-2 h-12">
                <button type="button" onclick="insertCategoryDetail('{{ $modal->type }}',
                '{{ $modal->ID }}')" class="px-5 py-2 bg-blue-500 text-white 
                    float-right mr-1 rounded-lg">
                    Lưu
                </button>
                <button type="button" onclick="closePost()" class="px-5 py-2 bg-gray-500 text-white 
                    float-right mr-1 rounded-lg">
                    Hủy
                </button>
            </div>
        </form>
    </div>
</div>