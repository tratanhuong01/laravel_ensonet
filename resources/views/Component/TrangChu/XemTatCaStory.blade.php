<?php

$viewAllStoryButton = 'stories';

?>
<div onclick="window.location.href='{{ url($viewAllStoryButton) }}'" class="w-12 h-12 absolute top-1/3 right-0 rounded-full dark:bg-dark-third 
cursor-pointer text-center py-1.5 mt-2 bg-gray-300" id="viewAllStoryButton">
    <i class='bx bx-right-arrow-alt text-3xl dark:text-white'></i>
</div>