<?php
require_once "api/connect.php";
require_once "api/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Врачи</title>
</head>
<body>
    <?showHeader();?>
    <div class="wrapper">
        <div class="content">
            <?showDoctors($conn);?>
        </div>   
        <?showFooter();?>     
    </div>

</body>
</html>