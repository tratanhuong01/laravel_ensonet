<div class="w-2/5 absolute top-1/2 left-1/2 transform -translate-x-1/2 rounded-lg
        -translate-y-1/2 border-2 border-gray-300 border-solid shadow-xl bg-white">
    <div class="w-full relative py-3 border-b-2 border-gray-300 border-solid">
        <p class="font-bold text-2xl text-center">Xóa dữ liệu</p>
        <span onclick="closePost()" class="w-10 h-10 bg-gray-300 rounded-full font-bold text-2xl 
            flex justify-center pt-1 cursor-pointer top-2 right-2 absolute">
            &times;
        </span>
    </div>
    <div class="w-full p-2">
        <div class="w-full p-2">
            Hãy chắc chắn rằng bạn muốn xóa . Khi bạn đồng ý xóa đồng nghĩa với việc một số dữ liệu liên
            quan đến ID bạn vừa xóa sẽ mất . Nếu bạn đồng ý hãy bấm <b>Xóa</b> và bấm <b>Hủy</b> nếu bạn
            muốn thoát.
        </div>
        <div class="w-full py-2 my-2 h-12">
            @php
            $line1 = 'line1';
            @endphp
            <button type="button" onclick="deleteCategoryDetail('{{ $modal->type }}',
                '{{ $id }}')" class="px-5 py-2 bg-blue-500 text-white 
                    float-right mr-1 rounded-lg">
                Xóa
            </button>
            <button type="button" onclick="closePost()" class="px-5 py-2 bg-gray-500 text-white 
                    float-right mr-1 rounded-lg">
                Hủy
            </button>
        </div>
    </div>
</div>