<?php

use App\Models\Taikhoan;

date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
<span class="activity{{$IDTaiKhoan}} {{ $padding }}
             {{ $bottom }} {{ $right }} ">
</span>
<script>
    $.ajax({
        method: "GET",
        data: {
            IDTaiKhoan: '{{ $IDTaiKhoan }}',
            Bottom: '{{ $bottom }}',
            Right: '{{ $right }}',
            Padding: '{{ $padding }}'
        },
        url: "/ProcessStateUsersOnlineOther",
        success: function(response) {
            if (response == "On") {
                $('.' + 'activity' + '{{$IDTaiKhoan}}').addClass(' absolute bg-green-600  border-2 border-solid border-white rounded-full ');
            } else {
                $('.' + 'activity' + '{{$IDTaiKhoan}}').remove();
            }
        }
    });
    setInterval(function() {
        $.ajax({
            method: "GET",
            data: {
                IDTaiKhoan: '{{ $IDTaiKhoan }}',
                Bottom: '{{ $bottom }}',
                Right: '{{ $right }}',
                Padding: '{{ $padding }}'
            },
            url: "/ProcessStateUsersOnlineOther",
            success: function(response) {
                if (response == "On") {

                } else {
                    $('.' + 'activity' + '{{$IDTaiKhoan}}').remove();
                }
            }
        });
    }, 30000)
</script>