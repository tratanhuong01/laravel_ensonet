<style>
    .feelComment {
        display: none;
    }

    .feels:hover>.feelComment {
        display: flex;
    }
</style>
<ul class="-left-2 feelComment absolute bottom-full flex flex-column dark:bg-dark-second bg-white rounded-lg border-solid 
            dark:border-dark-third border-gray-300 border rounded-3xl">
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','0@1')">👍</li>
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','1@1')">❤️</li>
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','2@1')">😆</li>
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','3@1')">😥</li>
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','4@1')">😮</li>
    <li class="px-2 py-2 text-3xl cursor-pointer rounded-full hover:bg-gray-300 
                dark:hover:bg-dark-third" onclick="FeelCommentPost('{{ $comment->IDBinhLuan }}','5@1')">😡</li>
</ul>