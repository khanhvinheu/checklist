<?php
//print_r($news);
foreach ($news as $news){
    echo $news['id'];
    echo '<br>';
    echo $news['title'];
    echo '<br>';
}