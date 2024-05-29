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
        height: 100%;
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
      /*  //////////////// */
      
      .desc_serv {
        margin: 8px 32px;
      }
      .doc_wrapper {
        display: flex;
        flex-direction: row;
        gap: 8px;
        margin: 8px 32px;
      }
      .wrapper {
        height: 100%;
        display: flex;
        flex-direction: column;
        gap: 4px;
      }
      .content {
        flex: 1 0 auto;
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
      <!-- 6808 -->
    </div>
  </body>
</html>
