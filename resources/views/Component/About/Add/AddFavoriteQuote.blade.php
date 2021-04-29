<div class="w-full hidden FavoriteQuote">
    <textarea name="" id="FavoriteQuoteText" class="w-full my-2 p-2 border-2 border-solid border-gray-200 
            dark:bg-dark-third dark:border-dark-main shadow-lg dark:text-white  resize-none outline-none h-28 rounded-lg" placeholder="Câu trích dẫn yêu thích của bạn"></textarea>
    <div class="w-full flex relative h-16 pt-3 ">
        <div onclick="PrivacyAbout(this,'PrivacyInputFavoriteQuote')" class="bg-gray-200 cursor-pointer dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute left-0 font-bold">
            <i class="fas fa-globe-europe"></i>&nbsp;&nbsp;Công khai
        </div>
        <div onclick="addChild(dashboard.routes.ProcessAddFavoriteQuote,'FavoriteQuote',
        'InfoFavoriteQuote','FavoriteQuoteText','FavoriteQuoteMain')" class=" cursor-pointer bg-1877F2 text-white ml-3 rounded-lg p-2 absolute right-0 font-bold">
            Lưu
        </div>
        <div onclick="AddView('FavoriteQuote')" class=" cursor-pointer bg-gray-200 dark:bg-dark-third dark:text-white  rounded-lg p-2 absolute right-12 font-bold">
            Hủy
        </div>
    </div>
</div>