@switch($idQuyenRiengTu)
@case('CONGKHAI')
<i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
@break;
@case('CHIBANBE')
<i class="fas fa-user-friends"></i>&nbsp;&nbsp;Bạn bè
@break;
@case('RIENGTU')
<i class="fas fa-lock"></i>&nbsp;&nbsp;Chỉ mình tôi
@break;
@endswitch