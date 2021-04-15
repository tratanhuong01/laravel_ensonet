<div id="{{ $user[0]->IDTaiKhoan }}SelectedTagPost" class="mr-2 mt-2 break-all text-sm w-auto cursor-pointer p-1.5 bg-blue-300 text-blue-500 font-bold">
    {{ $user[0]->Ho . ' ' . $user[0]->Ten }} &nbsp;&nbsp;&nbsp;
    <span onclick="removeUserSelectedPostTag('{{ $user[0]->IDTaiKhoan }}')" id="{{ $user[0]->IDTaiKhoan }}removeUserTagPost" class="text-xm">&times;</span>
</div>