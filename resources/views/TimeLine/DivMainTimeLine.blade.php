<div id="myLoading" class="hidden">
    @include('TimeLine/Modal')
</div>
<div id="messengerLoading" class="hidden">
    @include('TimeLine/ModalMessenger')
</div>
<div id="notifyLoading" class="hidden">
    @include('TimeLine/ModalNotify')
</div>
<div id="lastModalLoading" class="hidden">
    @include('TimeLine/ModalLast')
</div>
@if (session()->has('user'))
<script>
    var userJson = "{{ json_encode(Session::get('user')[0]) }}";
    userJson = JSON.parse(userJson.replaceAll('&quot;', '"'));
</script>
@endif