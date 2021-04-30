<li class="w-full py-4 flex relative" style="font-size: 16px;">
    <div class="w-10/12 py-2 dark:text-white">
        <script defer src="http://speak.ddns.net/static/public/speakApi.js"></script>
        <script>
            function speakAPI() {
                Api.speak({
                    text: $('#contentSpeak').text(),
                    slow: true
                })
            }
        </script>
        <i id="playAudioAPI" onclick="speakAPI()" class="fas fa-play-circle cursor-pointer"></i>
        &nbsp;&nbsp;&nbsp;<span class="dark:text-white font-bold" id="contentSpeak">{{ $value->Ho . ' ' . $value->Ten }}</span>
    </div>
    <div class="w-2/12">
        <ul class="w-full flex justify-end">
            @if ($idMain == $idView)
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i onclick="changePrivacyAboutMain('changeWayReadName','{{ $value->IDPhatAm }}',this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i onclick="changePrivacyAboutMain('changeWayReadName','{{ $value->IDPhatAm }}',this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @case('RIENGTU')
                <i onclick="changePrivacyAboutMain('changeWayReadName','{{ $value->IDPhatAm }}',this)" class="fas fa-lock  text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $value->IDPhatAm }}',
                'WayReadName','WayReadNameMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
            @else
            <li class="p-2 dark:text-white text-gray-600">
                @switch($value->IDQuyenRiengTu)
                @case('CONGKHAI')
                <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
                @break
                @case('CHIBANBE')
                <i class="fas fa-user-friends text-xl cursor-pointer"></i>
                @break
                @endswitch
            </li>
            @endif
        </ul>
    </div>
</li>