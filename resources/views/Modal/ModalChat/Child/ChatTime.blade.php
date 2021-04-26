<?php

use App\Models\StringUtil;
?>
<div id="{{ $idTinNhan }}Time" class="mess-user z-0 chat-rights w-full pt-3 pb-1.5 text-gray-700
 flex relative text-center justify-center">
    {{ StringUtil::getTimeChat($datetime) }}
</div>