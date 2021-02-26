@switch($idQuyenRiengTu)
@case('CONGKHAI')
<i class="cursor-pointer text-sm fas fa-globe-europe dark:text-gray-300"></i>
@break
@case('CHIBANBE')
<i class="cursor-pointer text-sm fas fa-user-friends dark:text-gray-300"></i>
@break
@case('RIENGTU')
<i class="cursor-pointer text-sm fas fa-lock dark:text-gray-300"></i>
@break
@endswitch