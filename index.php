<?php
require_once "api/connect.php";
require_once "api/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <style>
        .form {
            display: flex;
            flex-direction: column;
            width: 400px;
            font-size: 1rem;
            background-color: rgb(250, 230, 222);
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin: 22px auto;
            border-radius: 16px;
        }
        .form_label {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
    </style>
</head>
<body>
    <?showHeader();?>
    <div class="wrapper">
        <div class="content">
            <form action="#" method="post" class="form">
                <?
                    $title = "Записаться на приём";
                    require 'components/min_title.php';
                    getServ($conn);
                    getDoc($conn);
                ?>
                <label for="" class="form_label">Имя<input type="text" name="login"   class="inputs"></label>
                <label for="" class="form_label">Телефон<input type="text" name="password"  class="inputs"></label>
                <input type="date" name="calendar">

                <p>Время создания публикации</p>
                <input type="time" name="cron" value="03:15" step="1800">

                <label for="appt-time">Choose an appointment time: </label>
                <input id="appt-time" list="times" type="time" name="appt-time" value="08:00">
                <datalist id="times">
                    <option value="08:00:00">
                    <option value="08:15:00">
                    <option value="08:30:00">
                    <option value="09:00:00">
                    <option value="09:15:00">
                    <option value="09:30:00">
                    <option value="10:00:00">
                    <option value="10:15:00">
                    <option value="10:30:00">
                    <option value="11:00:00">
                    <option value="11:15:00">
                    <option value="11:30:00">
                    <option value="12:00:00">
                    <option value="12:15:00">
                    <option value="12:30:00">
                    <option value="13:00:00">
                    <option value="13:15:00">
                    <option value="13:30:00">
                    <option value="14:00:00">
                    <option value="14:15:00">
                    <option value="14:30:00">
                    <option value="15:00:00">
                    <option value="15:15:00">
                    <option value="15:30:00">
                    <option value="16:00:00">
                    <option value="16:15:00">
                    <option value="16:30:00">
                    <option value="17:00:00">
                    <option value="17:15:00">
                    <option value="17:30:00">
                    <option value="18:00:00">
                    <option value="18:15:00">
                    <option value="18:30:00">
                </datalist>
                <input type="submit" value="Записаться" name="atr_btn" class="atr_btn">        
            </form>
            </div>
            <?showFooter();?>
        </div>
</body>
<script src="api/script.js"></script>
</html>

<!-- https://samozapis-spb.ru/specialnosti/stomatolog -->
<!-- https://runebook.dev/ru/docs/html/element/input/time -->