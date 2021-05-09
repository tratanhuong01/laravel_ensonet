<div class="w-full mx-auto">
    <p class="text-2xl py-2 font-bold">
        Đăng nhập gần đây
    </p>
    <p class="pb-3 text-gray-500 tex-xm">
        Nhấp vào ảnh của bạn hoặc thêm tài khoản.
    </p>
    <div class="w-full flex flex-wrap">
        @php
        $accountSave = json_decode(Cookie::get('accountSave'))
        @endphp
        @foreach ($accountSave as $account)
        <div id="cookie{{$account->ID}}" class="w-1/4 mr-5 mt-5 relative border-2 border-solid border-gray-300 
		shadow-lg cursor-pointer">
            <img onclick="clickLoginAccountSave('{{ $account->ID }}','{{ json_encode($account) }}',
            '{{ $account->TinhTrang }}')" src="{{ $account->AnhDaiDien }}" class="w-full mx-auto object-cover h-40" alt="">
            <p onclick="clickLoginAccountSave('{{ $account->ID }}','{{ json_encode($account) }}',
            '{{ $account->TinhTrang }}')" class="font-bold my-3 text-center text-xm">
                {{ $account->Ho . " " . $account->Ten }}
            </p>
            <span onclick="removeAccountSave('{{ $account->ID }}')" class="absolute top-0 left-0 cursor-pointer 
				px-1.5 flex  items-center hover:bg-white hover:-left-2 rounded-full bg-gray-300 font-bold
				justify-center transform hover:scale-125 hover:-top-2 ">
                &times;
            </span>
        </div>
        @endforeach
        <div onclick="openAddAccount()" class="w-1/4 mr-5 relative border-2 mt-5 border-solid border-gray-300 
			shadow-lg cursor-pointer">
            <div class="w-full mx-auto relative h-40 bg-gray-300">
                <div class="w-10 h-10 rounded-full bg-blue-500 flex justify-center top-1/2
                    left-1/2 transform -translate-y-1/2 -translate-x-1/2 absolute">
                    <i class="bx bx-plus text-3xl text-white my-1"></i>
                </div>
            </div>
            <p class="font-bold my-3 text-center text-blue-500 text-xm">
                Thêm tài khoản
            </p>
        </div>
    </div>
</div>