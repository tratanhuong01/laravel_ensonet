<?php

use App\Models\StringUtil;
use App\Models\Functions;
use Illuminate\Support\Facades\DB;
use App\Models\Process;

$num = $num - 2;
$index = $count - $num;

?>
@if ($num >= 1)
<p onclick="ViewMoreCommentPost('{{ $idTaiKhoan }}',
    '{{ $idBaiDang }}',
    '{{ $index }}',
    '{{ $num }}',
    '{{ $count }}')" class="dark:text-white font-bold cursor-pointer py-2">
    <i class="fas fa-angle-double-down dark:text-white "></i>&nbsp;&nbsp;
    Xem thêm {{ $num }} bình luận...
</p>
@else
@endif