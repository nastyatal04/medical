<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card_conn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin: 16px;
            height: 250px;
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
    </style>
</head>
<body>
    <div class="card_conn">
        <img class="img_conn" src=<?echo $img;?> alt="">
        <div class="info_conn">
            <div class = "paragraph">
                <?
                    require 'components/min_title.php';
                    foreach ($description as $desc) {
                        echo "<span>".$desc."</span>";
                    }
                ?>               

            </div>
        </div>
    </div>
</body>
</html>
