<?php
require_once "api/connect.php";
require_once "api/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <style>
        .card_conn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin: 16px;
            height: 250px;
            font-size: 0.8rem;
        }
        .img_conn {
            width: 350px;
            object-fit: cover;
            height: 100%;
            border-radius: 16px 0 0 16px;
        }
        span{
            padding: 0 35px;
        }
        .paragraph {
            display: flex;
            flex-direction: column;
        }
        .info_conn {
            width: 350px;
            background-color: rgb(250, 230, 222);
            border-radius: 0 16px 16px 0;
            height: 100%;
        }
        
        .map {
            width: 100%;
        }
        .map iframe {
            width: 100%;
        }
    </style>
</head>
<body>
    <?showHeader();?>
    
    <div class="wrapper">
        <div class="content">
        <div class="card_conn">
            <img class="img_conn" src="img/content/1.jpg" alt="">
            <div class="info_conn">
                <div class = "paragraph">
                    <?
                        $title = "Адрес:";
                        require 'components/min_title.php';
                    ?>
                    <span>г.Тверь, ул. Горького, д. 10а</span>
                </div>
                <div class = "paragraph">
                    <?
                        $title = "Телефон:";
                        require 'components/min_title.php';
                    ?>
                    <span>8 (4822) 32-53-54</span>
                    <span>8 (963) 220 53 54</span>
                </div>
                <div class = "paragraph">
                    <?
                        $title = "Время работы:";
                        require 'components/min_title.php';
                    ?>
                    <span>Пн-сб: 9:00 - 19:00</span>
                    <span>Вс: выходной</span>
                </div>
            </div>
        </div>
            <div class="map" style="position:relative;overflow:hidden;">           
            <iframe src="https://yandex.ru/map-widget/v1/org/sonet/1693950851/?ll=35.898988%2C56.842167&z=13" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        </div>
        </div>
        <?showFooter();?>
    </div>
</body>
</html>