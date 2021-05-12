 <?php

    use Illuminate\Support\Facades\Session;

    $user = Session::get('user')[0];

    ?>
 cùng với<a href="{{ url('profile.'.$idTaiKhoan) }}">{{ ' ' . $hoTen1 . ' ' }}</a>
 <span class="cursor-pointer" onclick="viewUserTagOfPost('{{ $idBaiDang }}',
 '{{ json_encode($user)}}') ">{{ $other }}</span>