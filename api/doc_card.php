<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>    
  <form action="" method="post" class="card-basket">
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
    <div class="btn_wrapper">
      <div  class="btn-container">
          <?echo "<input type='hidden' name='id_inp' value=".$id.">";?>
      </div>
      <input type='submit' value='Удалить товар' name='del_prd_btn' class="negativ_btn">
    </div>    
  </form>
</body>
</html>

