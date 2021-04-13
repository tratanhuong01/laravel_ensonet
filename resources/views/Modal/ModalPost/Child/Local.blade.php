@foreach($local as $key => $value)
<div onclick="tickLocal('{{ $value->ID }}','{{ $value->Loai }}')" class="w-full pl-4  dark:hover:bg-dark-third rounded-lg
         cursor-pointer relative flex  py-3" id="localUser">
    <div class=" w-10% mr-3 text-center bg-gray-300 
    rounded-full dark:bg-dark-main">
        <i class="fas fa-map-marker-alt text-red-500 text-2xl my-1.5"></i>
    </div>
    <div class="w-90% flex ">
        <p class="dark:text-white flex items-center">{{ $value->Ten }}</p>
    </div>
    <span class="absolute top-4 right-6" id="{{ $value->ID }}Tick">
        @isset(Session::get('localU')[$value->ID])
        <i class="fas fa-check text-green-400 text-xm"></i>
        @endisset
    </span>
</div>
@endforeach
<input type="hidden" name="IDViTriPrev" id="IDViTriPrev" value="">