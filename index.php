<? session_start();?>
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
        .form .mintitle {
            margin: 0 auto;
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
                <label for="fullname" class="form_label">Имя<input type="text" id="fullname" name="fullname" class="inputs"></label>
                <label for="phone" class="form_label">Телефон<input type="text" id="phone" name="phone" class="inputs"></label>
                <label for="recording_date">Дата
                <?
                    $date = new DateTime();
                    $date->add(new DateInterval('P14D'));
                        echo "<input type='date' id='recording_date' name='recording_date' value='".date("Y-m-d")."' max='".$date->format('Y-m-d')."' min='".date("Y-m-d")."'> "
                ?>
                </label>       
                <?getTime($conn)?>        
                <input type="submit" value="Записаться" name="atr_btn" class="atr_btn">        
            </form>
            <? 
            if(isset($_SESSION['errorsData'])) {
                echo '<h3 >'.$_SESSION['errorsData'].'</h3>';
            }
            if(isset($_SESSION['errorsRequest'])) {
                echo '<h3 >'.$_SESSION['errorsRequest'].'</h3>';
            }
            if(isset($_SESSION['noErrors'])) {
                echo '<h3 >'.$_SESSION['noErrors'].'</h3>';
            }
            ?>
            </div>
            <?showFooter();?>
        </div>
</body>
<script src="api/scropt.js"></script>
</html>

<?
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['atr_btn'])) {
            if(!isset($_SESSION['errors'])) {
                $_SESSION['errorsData'] = "";
                $_SESSION['errorsRequest'] = "";
                $_SESSION['noErrors'] = "";
            }
            $doc_id = $_REQUEST['doc_select'];
            $fullname = $_REQUEST['fullname'];
            $phone = $_REQUEST['phone'];
            $date = date('Y-m-d', strtotime($_REQUEST['recording_date']));
            $time = $_REQUEST['time_select'];
            sendingRequest($conn, $doc_id, $fullname, $phone, $date, $time);
        }
    }
?>