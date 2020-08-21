<div class="container">
    <h2><?= esc($news['title']); ?></h2>
    <hr>
    <?= esc($news['text']); ?>
    <hr>
    <p>Author: <?= esc($news['author']) ?></p>
</div>
<?php
//$cookie_name = "user";
//$cookie_value = "John Doe";
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
//?>
<!--<html>-->
<!--<body>-->
<!---->
<?php
//if(!isset($_COOKIE[$cookie_name])) {
//    echo "Cookie named '" . $cookie_name . "' is not set!";
//} else {
//    echo "Cookie '" . $cookie_name . "' is set!<br>";
//    echo "Value is: " . $_COOKIE[$cookie_name];
//}
//?>