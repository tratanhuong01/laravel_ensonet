<div id="{{ $user[0]->IDTaiKhoan }}Selected" class="mr-2 mt-2 break-all  text-sm w-auto cursor-pointer p-1.5 bg-blue-300 text-blue-500 font-bold">
    {{ $user[0]->Ho . ' ' . $user[0]->Ten }} &nbsp;&nbsp;&nbsp;
    <span onclick="removeUserSelectedGroup('{{ $user[0]->IDTaiKhoan }}')" id="{{ $user[0]->IDTaiKhoan }}removeUser" class="text-xm">&times;</span>
</div>