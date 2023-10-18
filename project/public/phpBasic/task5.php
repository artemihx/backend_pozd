<?php

$header = 'Это заголовок';
$content = '<h1>Заголовок статьи</h1><p>Текст какой-то статьи</p>';
$sidebar = "2 + 2 = " . 2+2;
$footer = 'дно';


require __DIR__ . '/blocks/header.php';
require __DIR__ . '/blocks/sidebar.php';
require __DIR__ . '/blocks/content.php';
require __DIR__ . '/blocks/footer.php';

?>