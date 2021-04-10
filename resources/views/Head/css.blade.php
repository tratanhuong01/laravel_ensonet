<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/css/loading.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/tailwind_second.css">
<link rel="stylesheet" href="/tailwind/tailwind.css" />
<link rel="stylesheet" href="/tailwind/tailwind.custom.css" />
<link rel="stylesheet" href="/css/app.css" />
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<style>
    * {
        font-family: 'Lato', sans-serif;
    }
</style>
<script src="/js/common.js"></script>

<meta property="userID" content="{{ session()->has('user') ? Session::get('user')[0]->IDTaiKhoan : '' }}" />
<link rel="icon" href="/img/logo.ico" type="image/icon type">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/emojis.css">
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="/js/scrollbar.js"></script>
<script src="/js/event/event.js"></script>
<script src="/js/ajax/BaiDang/ajax.js"></script>
<script src="/js/ajax/MoiQuanHe/ajax.js"></script>
<script src="/js/ajax/BinhLuan/ajax.js"></script>
<script src="/js/ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/js/header.js"></script>
<script src="/js/ajax/TroChuyen/ajax.js"></script>
<script src="/js/realtime/state.js"></script>
<script src="/js/ajax/TroChuyen/ajax-second.js"></script>
<script src="/js/PlaceHolderLoading/ajax.js"></script>
<script src="/js/ajax/BinhLuan/ajax_second.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.2/socket.io.js" integrity="sha512-YybopSVjZU0fe8TY4YDuQbP5bhwpGBE/T6eBUEZ0usM72IWBfWrgVI13qfX4V2A/W7Hdqnm7PIOYOwP9YHnICw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>