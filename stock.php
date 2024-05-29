<?php
require_once "api/connect.php";
require_once "api/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Акции</title>
</head>
<body>
    <?showHeader();?>
    <div class="wrapper">
        <div class="content">
            <?
            $title = "Семейная скидка";
            $description = ["Семейная 5% (не забудьте сообщить регистратору Имя и Фамилию члена вашей семьи,который тоже проходит лечение в нашей клинике)"];
            $img = "img/content/2.jpg";
            require 'components/info_card.php';
            ?>
        </div>
        <?showFooter();?>
    </div>

</body>
</html>