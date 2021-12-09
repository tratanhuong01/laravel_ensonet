@include('Head.document')

<head>
    <title>Ensonet</title>
    @include('Head.css')
    <style>
        @media (min-width: 1280px) {
            #center {
                left: 36% !important;
            }
        }
    </style>
</head>

<body class="dark:bg-dark-main">

    <div class="w-full bg-gray-100 dark:bg-dark-main h-screen" id="main">
        <!-- header -->
        @include('Header')
        <!-- header -->

        <!-- content -->
        <div class="w-full flex z-10 pt-16 bg-gray-100 dark:bg-dark-main lg:w-full 
            lg:mx-auto xl:w-full" id="content">
            <!-- left -->
            <div class="fixed pt-3 hidden sm:hidden xl:block xl:w-1/4">
                <div id="wrapper-scrollbar" class="pl-1.5 w-4/6 overflow-x-hidden overflow-y-auto 
                xl:w-full">
                    <p class="font-bold text-2xl p-2 dark:text-white" style="font-family: system-ui;">
                        Kỉ niệm
                    </p>
                    <div class="w-64 p-2.5 rounded-lg bg-gray-500 text-gray-100 font-bold">
                        <div class="flex items-center">
                            <i class='bx bx-home-circle mr-3 text-2xl px-2 py-1 
                            rounded-full bg-gray-500 text-white'></i>
                            Trang chủ kỉ niệm
                        </div>
                    </div>
                </div>
            </div>
            <!-- left -->

            <!-- right -->
            <div class="center-content relative left-0 px-2 sm:w-full mx-auto md:w-3/4 lg:mx-0 
            lg:w-4/6 lg:left-0! xl:w-2/5 " id="center">
                <div class="w-full mx-auto">
                    <div class="w-full py-2 dark:bg-dark-second">
                        <img src="/img/memory_1.png" class="w-full h-24 object-cover" alt="" srcset="">
                    </div>
                    @if (count($postOld) == 0)
                    <div class="w-10/12 mx-auto my-2 dark:text-white">
                        <p class="text-center mb-2 font-bold text-xl">
                            Không có kỷ niệm hôm nay
                        </p>
                        <p class="text-center text-base">
                            Hôm nay không có Kỷ niệm nào để xem hay chia sẻ,
                            nhưng chúng tôi sẽ thông báo cho bạn khi bạn có khoảnh khắc để ôn lại.
                        </p>
                    </div>
                    @else
                    <p class="w-11/12 mx-auto text-center text-xl p-2 dark:text-white">
                        Chúng tôi hy vọng bạn thích ôn lại và
                        chia sẻ kỷ niệm trên Facebook, từ các kỷ
                        niệm gần đây nhất đến những kỷ niệm ngày xa xưa.
                    </p>
                    @foreach ($postOld as $post)
                    @include('Component.Post.PostMemory',['item' => $post,
                    'u' => Session::get('user')])
                    @endforeach
                    <div class="w-full py-2 dark:bg-dark-second">
                        <img src="/img/memory_1.png" class="w-full h-24 object-cover" alt="" srcset="">
                        <p class="p-2 text-xl font-bold  dark:text-white" style="font-family: system-ui;">
                            Bạn đã xem hết
                        </p>
                        <p class="text-xl px-2 mb-3  dark:text-white">
                            Hãy quay lại vào ngày mai để xem thêm kỷ niệm bạn nhé!
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            <!-- right -->
        </div>
        <!-- create chat -->
        <div class="h-auto p-3 w-20">
            <div class="text-center cursor-pointer py-2 pl-2 pr-1.5 fixed right-3 bottom-4 " id="chatMinize">
                <div onclick="openCreateChat()" class="cursor-pointer">
                    <i class="far fa-edit text-2xl py-2 px-3 pr-2 rounded-full bg-white dark:bg-dark-second 
                    dark:text-white"></i>
                </div>
            </div>
        </div>
        <!-- create chat -->

        <!-- place show chat -->
        <div class="w-full px-4 flex z-50 md:w-full lg:w-full xl:w-1/2
            ml-auto fixed -bottom-1 right-20" id="placeChat">
        </div>
        <!-- place show chat -->
        <!-- place show notify -->
        <div class="w-80 fixed bottom-3 left-5" id="notifyShow">
        </div>
        <!-- place show notify -->
    </div>
    <!-- content -->
    </div>
    <!-- place show modal -->
    <div class="w-full bg-gray-500 top-0 left-0 z-50 bg-opacity-50" id="second"></div>
    <!-- place show modal -->

    <!-- timeline -->
    @include('TimeLine.DivMainTimeLine')
    <!-- timeline -->
    <script>
        $('#modalHeaderRight').html('');
        const userID = getUserID();
        var channel = pusher.subscribe('test.' + userID);
        channel.bind('tests', function() {
            $.ajax({
                method: "GET",
                url: "/ProcessNotificationShow",
                success: function(response) {
                    $('#numNotification').html(response.num);
                    $('#notifyShow').append(response.view);
                }
            });
        });
    </script>
</body>

</html>