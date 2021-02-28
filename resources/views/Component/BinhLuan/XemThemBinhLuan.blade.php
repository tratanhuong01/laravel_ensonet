<?php

use App\Models\StringUtil;
use App\Models\Functions;
use Illuminate\Support\Facades\DB;
use App\Models\Process;

?>
<div class="w-11/12 ml-2">

    @if ($num > 2)
    <p onclick="ViewMoreCommentPost('1000000002',
    '{{ $comment->IDBaiDang }}',
    '{{ $index }}')" class="font-bold dark:text-white cursor-pointer py-2">
        Xem thêm {{ $num - 2 }} bình luận...
    </p>
    @else
    @endif

</div>