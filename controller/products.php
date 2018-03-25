<?php
/*include '/model/'.$add_controller.'.php';
$model = new $add_controller;

if(isset($_POST['product_id'])){
    
    //подключим другой шаблон для выведения товара в категории
    $add_tpl = 'one_product';
    
    //получим инфу по новости
    $news_info = $model->getOneProduct($_POST['product_id']);
    $name = $news_info['name'];
    $articul = $news_info['articul'];
    $price = $news_info['price'];
    $quantity = $news_info['quantity'];
    $img = IMAGE . $news_info['product_image'];

    $back = HTTP_SERVER . '/categories';
}
else{
    $category_id = $_POST['product_id'];
    $product_mass = $model->getProduct_To_Category($category_id);
    $products = array();
        foreach($product_mass as $prod){
            $products[] = array(
              'name' => $prod['name'],
              'price' => $prod['price'],
              'articul' => $prod['articul']
            );
        }
    } 

/* !!!!!!!!!!!!!!!!!!!!!!!!   Часть контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!!!!! */
/*if(isset($_REQUEST['metod']) && $_REQUEST['metod']=='ajax'){
	
	$ajax = '';
}
/* !!!!!!!!!!!!!!!!!!!!!   КОНЕЦ Части контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!! */