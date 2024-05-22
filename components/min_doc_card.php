<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .min_doc_card {
        display: flex;
        flex-direction: column;
        gap: 24px;
        padding: 16px;
        border-radius: 8px;
        width: max-content;
        font-size: 1rem;
        border: 1px solid rgb(171, 183, 219);
        border-radius: 8px;
      }
      .min_doc_card img {
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 8px;
        width: 200px;
      }
      .min_doc_card .name {
        font-weight: bold;
        color: rgb(145, 85, 60);
      }
      .inf_min_doc_card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 100%;
        align-items: center;
        gap: 4px;
      }
    </style>
</head>
<body>    
  <form action="" method="post" class="min_doc_card">
    <img
        src="<?echo $img;?>"
        alt=""
    />
    <div class="inf_min_doc_card">
        <div>
            <div class="name"><?php echo $name;?></div>
            <div class="inf"><?echo $specialization;?></div>
            <div class="inf" name="experience"><?echo calcExperience($experience);?></div>
        </div>
    </div>   
  </form>
</body>
</html>

