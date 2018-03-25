<?php
include '/model/'.$add_controller.'.php';
$model = new $add_controller;

if(isset($_POST['category_id'])){
    
    //подключим другой шаблон для выведения товара в категории
    $add_tpl = 'one_category';
    
    //получим инфу по новости
    $news_info = $model->getOneCategory($_POST['category_id']);
    $category_name = $news_info['category_name'];
    $category_text = $news_info['category_text'];
    $title = $news_info['category_seo_title'];
    $desc = $news_info['category_seo_description'];
    $key = $news_info['category_seo_keywords'];
    $img = IMAGE . $news_info['category_image'];

    $back = HTTP_SERVER . '/categories';
    
    //Добавляем массив товаров с данной категории
    $category_id = $_POST['category_id'];
    $product_mass = $model->getProduct_To_Category($category_id);
    $products = array();
    foreach($product_mass as $prod){
        $products[] = array(
        'name' => $prod['name'],
        'price' => $prod['price'],
        'articul' => $prod['articul'],
        'link' => '/categories/'.$model->GetCategoryLink($category_id).'/'.$model->getProductLink($prod['product_id'])
       );
    }
}
//Выводим все категории на экран
else{
    $categories_mass = $model->getCategories();
    $news = array();
    foreach ($categories_mass as $val) {
        $categories[] = array(
            'name' => $val['category_name'],
            'text' => $val['category_text_small'],
            'img' => $val['category_image'],
            'link' => 'categories/'.$model->getCategoryLink($val['category_id'])
        );
    }
}
//Если кликаем на товар, то происходит переход на one_product.php
if(isset($_POST['product_id'])){
    
    $add_tpl = 'one_product';
    
    $news_info = $model->getOneProduct($_POST['product_id']);
    $name = $news_info['name'];
    $product_description = $news_info['product_description'];
    $articul = $news_info['articul'];
    $price = $news_info['price'];
    $quantity = $news_info['quantity'];
    $img = IMAGE . $news_info['product_image'];

    $back = HTTP_SERVER . '/categories';
           
}

/* !!!!!!!!!!!!!!!!!!!!!!!!   Часть контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!!!!! */
if(isset($_REQUEST['method']) && $_REQUEST['method']=='ajax'){
	
	$ajax = '';
}
/* !!!!!!!!!!!!!!!!!!!!!   КОНЕЦ Части контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!! */
