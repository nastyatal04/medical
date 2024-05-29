<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .doc_card {
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
      .doc_card img {
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 8px;
        width: 130px;
      }
      
      .doc_card .count {
        padding: 8px;
        font-weight: bold;
      }
      .doc_card .name {
        font-weight: bold;
        color: rgb(145, 85, 60);
      }
      .doc_card .price {
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
      /* .negativ_btn {
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
      } */
    </style>
</head>
<body>    
  <form action="" method="post" class="doc_card">
    <img
        src="<?echo $img;?>"
        alt=""
    />
    <div class="info-basket">
        <div>
            <div class="name"><?php echo $name;?></div>
            <div class="color"><?echo $specialization;?></div>
            <div class="color"><?echo $description;?></div>
        </div>
        <div class="price" name="price"><?echo calcExperience($experience);?></div>
    </div> 
  </form>
</body>
</html>

