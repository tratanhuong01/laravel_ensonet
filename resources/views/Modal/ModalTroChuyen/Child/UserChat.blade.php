@foreach($data as $key => $value)
<div onclick="addUserIntoGroup('{{ $value->IDTaiKhoan }}')" id="{{ $value->IDTaiKhoan }}UChat" class="w-full rounded-sm p-1.5 dark:hover:bg-dark-third hover:bg-gray-300 cursor-pointer 
        flex">
    <div class="w-auto">
        <img src="/{{ $value->AnhDaiDien }}" class="w-12 h-12 p-1 object-cover rounded-full" alt="" srcset="">
    </div>
    <div class="w-8/12 px-3 py-3 dark:text-white">
        {{ $value->Ho . ' ' . $value->Ten }}
    </div>
    <div class="w-2/12 py-3 text-center " id="{{ $value->IDTaiKhoan }}Tick">
        @isset(Session::get('userGroup')[str_replace('0','',$value->IDTaiKhoan)])
        <i class="fas fa-check text-green-400 text-xm"></i>
        @endisset
    </div>
</div>
@endforeach