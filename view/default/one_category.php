<html>
<head>
    <title><?php echo $category_name ?></title>
</head>
<body>
    <section>
        <h1 class="category_name"><?php echo $category_name; ?></h1>
        <img class="category_image" src="<?php echo $img;?>" title="<?php echo $category_name; ?>" alt="<?php echo $category_name; ?>"/>
        <div class="category_text"><?php echo $category_text; ?></div>
        <hr>
        <ul class="category_list">
        <?php foreach($products as $prod){ ?>
            <li><div><a class="category_product" href="<?php echo $prod['link'];?>"><?php echo $prod['name'];?><br><span><?php echo "Цена: ".$prod['price']." грн.";?></span></a></div></li>
        <?php } ?>
        </ul>
    </section>
</body>
</html>
