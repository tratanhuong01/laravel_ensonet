@switch($idQuyenRiengTu)
@case('CONGKHAI')
<i onclick="changePrivacyAboutMain('{{ $typeChange }}', '{{ $id }}' ,this)" class="fas fa-globe-europe text-xl cursor-pointer"></i>
@break
@case('CHIBANBE')
<i onclick="changePrivacyAboutMain('{{ $typeChange }}', '{{ $id }}' ,this)" class="fas fa-user-friends text-xl cursor-pointer"></i>
@break
@case('RIENGTU')
<i onclick="changePrivacyAboutMain('{{ $typeChange }}', '{{ $id }}' ,this)" class="fas fa-lock text-xl cursor-pointer"></i>
@break
@endswitch