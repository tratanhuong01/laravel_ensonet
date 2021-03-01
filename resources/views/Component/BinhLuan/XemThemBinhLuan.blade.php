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
    '{{ $count }}')" class="font-bold dark:text-white cursor-pointer py-2">
    Xem thêm {{ $num }} bình luận...
</p>
@else
@endif