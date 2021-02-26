@switch($idQuyenRiengTu)
@case('CONGKHAI')
<li class="px-0.5 py-1.5"><i class="fas fa-globe-europe dark:text-white"></i></li>
<li class="px-0.5 py-1.5"><b class="dark:text-white">&nbsp;Công khai&nbsp;&nbsp;</b></li>
<li class="px-0.5 py-1.5"><i style="position: absolute;top: 6px;" class="fas fa-sort-down dark:text-white"></i>
    @break;
    @case('CHIBANBE')
<li class="px-0.5 py-1.5"><i class="fas fa-user-friends dark:text-white"></i></li>
<li class="px-0.5 py-1.5"><b class="dark:text-white">&nbsp;Bạn bè&nbsp;&nbsp;</b></li>
<li class="px-0.5 py-1.5"><i style="position: absolute;top: 6px;" class="fas fa-sort-down dark:text-white"></i>
    @break;
    @case('RIENGTU')
<li class="px-0.5 py-1.5"><i class="fas fa-lock dark:text-white"></i></li>
<li class="px-0.5 py-1.5"><b class="dark:text-white">&nbsp;Chỉ mình tôi&nbsp;&nbsp;</b></li>
<li class="px-0.5 py-1.5"><i style="position: absolute;top: 6px;" class="fas fa-sort-down dark:text-white"></i>
    @break;
    @endswitch