<html>
<head>
    <title>Maranello</title>
</head>
<body>
    <section>
        <div class="main-categories">Наш ассортимент:</div>
        <ul class="categories">
        <?php foreach($categories as $category){ ?>
            <li class="category"><a href="<?php echo $category['link'];?>"><img src="../../img/<?php echo $category['img']?>"></a><a href="<?php echo $category['link'];?>"><p class="cat_text"><?php echo $category['text'];?></p></a></li>           
        <?php } ?>
        </ul>
    </section>
</body>
</html>



