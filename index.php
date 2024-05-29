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
        }
    </style>
</head>
<body>
    <?showHeader();?>
    <div class="wrapper">
        <div class="content">
            <form action="" method="post" class="form">
                <?
                    getServ($conn);
                    getDoc($conn);
                ?>
                <label for="" class="form_label">Имя<input type="text" name="login"   class="inputs"></label>
                <label for="" class="form_label">Телефон<input type="text" name="password"  class="inputs"></label>
                <input type="submit" value="Записаться" name="atr_btn" class="atr_btn">        
            </form>
            </div>
            <?showFooter();?>
        </div>
</body>
<script src="api/script.php"></script>
</html>