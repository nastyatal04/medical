<? session_start();?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: monospace;
      }
      .header_menu {
        display: flex;
        flex-direction: row;
        justify-content: center;
        background-color: rgb(230, 194, 179);
        margin: 0;
        padding: 4px 16px;
      }
      .header_btn {
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 8px 24px;
        border-radius: 8px;
        background-color: rgb(215, 149, 122);
        cursor: pointer;
        font-size: 1.25rem;
        text-decoration: none;
        width: max-content;
      }
      .header_btn:hover {
        background-color: rgb(194, 125, 98);
      }
      .card-basket {
        display: flex;
        flex-direction: row;
        gap: 24px;
        padding: 16px;
        border-radius: 8px;
        width: 50%;
        font-size: 1rem;
        border: 1px solid rgb(171, 183, 219);
        border-radius: 8px;
      }
      .card-basket img {
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 8px;
        width: 130px;
      }
      .btn-container {
        display: flex;
        flex-direction: row;
        gap: 8px;
        font-size: 1rem;
        align-items: center;
      }
      .znack-btn {
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 8px;
        border-radius: 8px;
        background-color: rgb(215, 149, 122);
        cursor: pointer;
        height: 40px;
        width: 40px;
        border: 0;
        outline: 0;
        font-size: 1rem;
      }
      .znack-btn:focus {
        outline:none!important;
      }
      .znack-btn:hover {
        background-color: rgb(194, 125, 98);
      }
      .card-basket .count {
        padding: 8px;
        font-weight: bold;
      }
      .card-basket .name {
        font-weight: bold;
        color: rgb(145, 85, 60);
      }
      .card-basket .price {
        font-weight: bold;
        margin: 0 16px;
      }
      .info-basket {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        align-items: center;
      }
      .btn_wrapper {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
      }
      .negativ_btn {
        color: rgb(215, 149, 122);
        font-weight: bold;
        text-align: center;
        padding: 8px;
        border-radius: 8px;
        background-color: white;
        cursor: pointer;        
        width: max-content;
        border: 0;
        outline: 0;
        font-size: 1rem;
      }      
      .negativ_btn:focus {
        outline:none!important;
      }
      .negativ_btn:hover {
        background-color: rgb(255, 244, 240);
      }
    </style>
  </head>
  <body>
    <div class="header_menu">
      <p>
        <a href="index.php" class="header_btn">Главная</a>
        <a href="onas.php" class="header_btn">О нас</a>
        <a href="doctors.php" class="header_btn">Врачи</a>
        <a href="stock.php" class="header_btn">Акции</a>      
        <a href="contacts.php" class="header_btn">Контакты</a>  
      </p>
    </div>
  </body>
</html>
