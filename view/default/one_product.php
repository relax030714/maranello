<html>
<head>
    <title><?php echo $name ?></title>
</head>
<body>
    <section>
        <h1 class="product_name"><?php echo $name; ?></h1>
        <img class="product_image" src="<?php echo $img;?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>"/>
        <div class="product_info"><p><?php echo "Цена: ".$price." грн."; ?></p>
             <p><?php echo "Количество на складе: ".$quantity; ?></p>
             <p><?php echo "Артикул: ".$articul?></p>
        </div>
        <div class="product_description"><?php echo "Состав: ".$product_description?></div>
    </section>
</body>
</html>
