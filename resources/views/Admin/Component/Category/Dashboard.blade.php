<?php

use App\Admin\Process;
use App\Admin\Query;

?>
<p class="text-2xl font-bold pb-3">Tổng quan trong ngày</p>
<ul class="w-full flex">
    <li class="w-1/4 mr-6 bg-yellow-500 text-white p-5 flex">
        <div class="text-center w-1/4 items-center">
            <i class="fas fa-users text-2xl my-2"></i>
        </div>
        <div class="w-3/4 text-center px-2 items-center font-bold">
            <p>Lượt đăng kí</p>
            <p>{{ count(Query::getUserRegister('') ) }}</p>
        </div>
    </li>
    <li class="w-1/4 mr-6 text-white bg-green-600 p-5 flex">
        <div class="text-center w-1/4 items-center">
            <i class="fas fa-marker text-2xl my-2"></i>
        </div>
        <div class="w-3/4 text-center px-2 items-center font-bold">
            <p>Số bài viết</p>
            <p>{{ count(Query::getPost('') ) }}</p>
        </div>
    </li>
    <li class="w-1/4 mr-6 text-white bg-pink-400 p-5 flex">
        <div class="text-center w-1/4 items-center">
            <i class="fas fa-book text-2xl my-2"></i>
        </div>
        <div class="w-3/4 text-center px-2 items-center font-bold">
            <p>Số bài story</p>
            <p>{{ count(Query::getStory('') ) }}</p>
        </div>
    </li>
    <li class="w-1/4 bg-blue-600 p-5 flex text-white">
        <div class="text-center w-1/4 items-center">
            <i class="fas fa-comment-dots text-2xl my-2"></i>
        </div>
        <div class="w-3/4 text-center px-2 items-center font-bold">
            <p>Lượt phản hồi</p>
            <p>{{ count(Query::getReply('') ) }}</p>
        </div>
    </li>
</ul>
<div class="w-full py-5 flex">
    <div id="piechart1" class="w-1/2" style="height: 400px;"></div>
    <div id="piechart2" class="w-1/2" style="height: 400px;"></div>
</div>
<div class="w-full flex py-5 pr-5">
    <div class="w-1/3 p-1 bg-white mr-2">
        <p class="font-bold text-xm font-bold my-2 pl-3">
            Người dùng đăng kí mới
        </p>
        <ul class="w-full flex flex-wrap">
            <?php $newRegister = Query::getUserRegisterNew(4); ?>
            @foreach($newRegister as $key => $value)
            <li class="w-full px-2.5 pb-2.5 flex">
                <div class="relative mr-3">
                    <span class="bg-blue-500 p-1.5 rounded-full absolute top-4"></span>
                </div>
                <div class="ml-3 pt-0.5">
                    <img src="{{$value->AnhDaiDien}}" class="w-10 h-10 rounded-full mx-auto" alt=""><br>
                </div>
                <div class="pl-3">
                    <p class="text-gray-600 pb-0.5 font-bold break-all whitespace-nowrap">
                        {{ $value->Ho . ' ' . $value->Ten }}
                    </p>
                    <p class="text-sm text-gray-600">{{ $value->NgayTao }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="w-1/3 p-1 bg-white mr-2">
        <p class="font-bold text-xm font-bold my-2 pl-3">
            Người dùng hoạt động gần đây
        </p>
        <ul class="w-full flex flex-wrap py-3">
            <?php $userActivity = Query::getUserActivityCurrent(6); ?>
            @foreach($userActivity as $key => $value)
            <li class="w-1/3 p-2.5 text-center">
                <img src="{{ $value->AnhDaiDien }}" class="w-14 h-14 object-cover rounded-full mx-auto" alt=""><br>
                <p class="max-w-full break-all whitespace-nowrap 
                whitespace-nowrap overflow-ellipsis overflow-hidden">
                    {{ $value->Ho . ' ' . $value->Ten }}
                </p>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="w-1/3 p-1 bg-white">
        <p class="font-bold text-xm font-bold my-2 pl-3">
            Phản hồi gần đây
        </p>
        <ul class="w-full flex flex-wrap">
            <?php $userReply = Query::getReplyCurrent(4); ?>
            @foreach($userReply as $key => $value)
            <li class="w-full px-2.5 pb-2.5 flex">
                <div class="relative mr-3">
                    <span class="bg-blue-500 p-1.5 rounded-full absolute top-4"></span>
                </div>
                <div class="ml-3 pt-0.5">
                    <img src="{{$value->AnhDaiDien}}" class="w-10 h-10 rounded-full mx-auto 
                    object-cover" alt=""><br>
                </div>
                <div class="pl-3">
                    <p class="break-all text-gray-600 pb-0.5 font-bold whitespace-nowrap">
                        {{ $value->Ho . ' ' . $value->Ten }}
                    </p>
                    <p class="text-sm text-gray-600">{{ $value->ThoiGianYeuCau }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<?php
$user = Process::chartCircleUserVerify();
$request = Process::chartCircleRequest();
?>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);

    // Draw the chart and set the chart values
    function drawChart1() {
        var data = google.visualization.arrayToDataTable([
            ['Task', ''],
            ['Chưa xác minh', Number('{{ $user->NotVerify }}')],
            ['Đang xác minh', Number('{{ $user->Verifying }}')],
            ['Đã xác minh', Number('{{ $user->Verified }}')],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Biểu đồ người dùng',
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
    }

    function drawChart2() {
        var data = google.visualization.arrayToDataTable([
            ['Task', ''],
            ['Tích Xanh', Number('{{ $request->TickBlue }}')],
            ['Quá Trình Sử Dụng', Number('{{ $request->ProcessUsage }}')],
            ['Cấp Lại Tài Khoản', Number('{{ $request->AccessAccount }}')],
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Biểu đồ lượt yêu cầu phản hồi',
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
    }
</script>