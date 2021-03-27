<li class="w-full pb-4 flex" style="font-size: 16px;">
    <div class="w-10/12 text text-gray-600  dark:text-white ">
        <i class="fas fa-home text-2xl"></i>
        &nbsp;&nbsp;&nbsp;Sống tại <b>{{ $data->TenDiaChi }}</b>
    </div>
    <div class="w-2/12">
        <ul class="w-full flex">
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="fas fa-globe-europe text-xl cursor-pointer"></i>
            </li>
            <li class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-edit text-xl cursor-pointer"></i>
            </li>
            <li onclick="deleteAbout('{{ $data->IDNoiOHienTai }}',
            'PlaceLiveCurrent','placeLiveCurrentMain')" class="p-2  dark:text-white  text-gray-600">
                <i class="far fa-trash-alt text-xl cursor-pointer"></i>
            </li>
        </ul>
    </div>
</li>