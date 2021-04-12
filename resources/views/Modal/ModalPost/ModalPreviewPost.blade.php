<div id="modal-one" class=" w-11/12 fixed top-50per left-50per dark:bg-dark-second 
transform-translate-50per pb-2 pt-2 opacity-100 bg-white z-50 border-2 border-solid border-gray-300 
 sm:w-4/5 sm:mt-12 lg:w-3/5 xl:w-5/12 xl:mt-4 dark:border-dark-main shadow-1 rounded-lg">
    <div class="w-full bg-white dark:bg-dark-second pl-2 pr-4 fixed top-2 block z-10">
        <span onclick="closePost()" class="bg-gray-300 px-2.5 dark:text-white font-bold
                     rounded-full dark:bg-dark-second cursor-pointer absolute text-3xl top-2 right-4">&times;</span>
    </div>
    <div id="all" class="w-full dark:bg-dark-second px-2 pt-16 wrapper-content-right overflow-y-auto" style="max-height: 420px;height: 420px;">
        <div id="loadDatass" class="'w-full text-center bg-gray-100 dark:bg-dark-second relative" style="max-height: 420px;height: 420px;">
            @if($type == 'video')
            <script>
                loadVideo('{{ $url }}', '{{ "loadDatass" }}', 740)
            </script>
            @else
            <img src="/{{ $url }}" class="max-w-full mx-auto object-cover" style="height: 420px;" alt="">
            @endif
        </div>
    </div>
</div>