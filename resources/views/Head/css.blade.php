<!-- meta -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if (session()->has('user'))
<meta property="userID" content="Session::get('user')[0]->IDTaiKhoan" />
@endif
<!-- meta -->

<!-- css general -->
<link rel="stylesheet" href="{{ URL::asset('css/loading.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/tailwind_second.css') }}">
<link rel="stylesheet" href="{{ URL::asset('tailwind/tailwind.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('tailwind/tailwind.custom.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/emojis.css') }}">
<!-- css general -->

<!-- cdn general -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.2/socket.io.js" integrity="sha512-YybopSVjZU0fe8TY4YDuQbP5bhwpGBE/T6eBUEZ0usM72IWBfWrgVI13qfX4V2A/W7Hdqnm7PIOYOwP9YHnICw==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<!-- cdn general -->

<!-- js general -->
<script src="{{ URL::asset('js/ajax/login/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/header/ajax.js')}}"></script>
<script src="{{ URL::asset('js/scrollbar.js')}}"></script>
<script src="{{ URL::asset('js/event/event.js')}}"></script>
<script src="{{ URL::asset('js/ajax/post/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/post/ajax_second.js')}}"></script>
<script src="{{ URL::asset('js/ajax/about/ajax_second.js')}}"></script>
<script src="{{ URL::asset('js/ajax/about/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/relationship/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/comment/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/chat/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/chat/ajax_second.js')}}"></script>
<script src="{{ URL::asset('js/ajax/image/ajax.js')}}"></script>
<script src="{{ URL::asset('js/loading/ajax.js')}}"></script>
<script src="{{ URL::asset('js/ajax/comment/ajax_second.js')}}"></script>
<script src="{{ URL::asset('js/library/common.js')}}"></script>
<script src="{{ URL::asset('js/library/emojii.js')}}"></script>
<script src="{{ URL::asset('js/library/emojii_chat.js')}}"></script>
<script src="{{ URL::asset('js/ajax/main/ajax.js')}}"></script>
<script src="{{ URL::asset('js/realtime/notification.js')}}"></script>
<script src="{{ URL::asset('js/header.js')}}"></script>
<script src="{{ URL::asset('js/ajax/profile/ajax.js') }}"></script>
<script src="{{ URL::asset('js/ajax/story/ajax.js') }}"></script>
<script src="{{ URL::asset('js/ajax/post/ajax_third.js') }}"></script>
<script src="{{ URL::asset('js/ajax/chat/ajax_third.js') }}"></script>
@if (session()->has('user'))
<script src="{{ URL::asset('js/realtime/state.js') }}"></script>
@endif
<!-- js general -->

<!-- icon website general -->
<link rel="icon" href="./img/logo.ico" type="image/icon type">
<!-- icon website general -->

<!-- style general -->
<style>
    * {
        font-family: 'Lato', sans-serif;
    }
</style>
<!-- style general -->