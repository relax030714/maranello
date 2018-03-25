<?php
//controller
include '/model/'.$add_controller.'.php';
$model = new $add_controller;




/* --------------------------------------------------- */
/* -------------- Код удаления товара ---------------- */
/* --------------------------------------------------- */
if(isset($_GET['del']) && $_GET['del']){
    $model->delProduct($_GET['del']);
    header( 'Location: /back/reproducts');
}






/* -------------------------------------------------------------------- */
/* --------------- РЕДАКТИРОВАНИЕ ИЛИ СОЗДАНИЕ ТОВАРА ----------------- */
/* -------------------------------------------------------------------- */
//если пришло из формы product_id значит это пришла форма из формы редактирования или создания товара
//здесь мы проверяем только на существование, так как для пустой формы мы будем передавать эту переменную со значением 0
if(isset($_POST['product_id'])){
    
    //если получили данные из формы и нужно сохранить
    if(isset($_POST['reproduct'])){
        if($_POST['product_id']==0){
            $product_id = $model->setProduct($_POST);
            header( 'Location: /back/reproducts');
        }
        else{
            $model->updateProduct($_POST);
            $product_id = $_POST['product_id'];
        }
        //код для обработки пришедшей картинки
        if (isset($_FILES["userfile"])) {
                if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
                //Возвращает TRUE, если файл filename был загружен при помощи HTTP POST
                        $filename=basename($_FILES['userfile']['name']);       
                        //basename -- Возвращает имя файла из указанного пути                                     
                        $uploadfile = '../img/'.$filename;        
                        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
                            $model->setImageProduct($product_id, $filename);
                        };
                }
        } 
    }
    
    //подключим свою верстку
    $add_tpl = 'reproduct_form';
    $back = HTTP_SERVER . '/back/reproducts';
    
    
    $products_list = $model->getProductsList();
    $categories_list = $model->getCategoriesList();

    //разделим код на форму для редактирования уже существующего товара
    if($_POST['product_id']){
        
        $url = $model->getProdsLink($_POST['product_id']);
        $action = HTTP_SERVER . '/back/reproducts/' . $url;
        
        //получим все данные о товаре и передаем в форму
        $prod_info = $model->getProduct($_POST['product_id']);
        //соберем переменные для передачи в верстку
        $product_id = $_POST['product_id'];
        $category_id = $prod_info['category_id'];
        $name = $prod_info['name'];
        $product_description = $prod_info['product_description'];
        $articul = $prod_info['articul'];
        $price = $prod_info['price'];
        $quantity = $prod_info['quantity'];
        $product_image = IMAGE . $prod_info['product_image'];
        $status = $prod_info['status'];
    }    
    //код формы для заведения новых товаров
    else{
        
        $url = '';
        $action = HTTP_SERVER . '/back/reproducts';        
        
        //значение по умолчанию что бы не делать проверок на существование в верстке
        $product_id = 0;
        $category_id = 0;
        $name = '';
        $product_description = '';
        $articul = 0;
        $price = 0;
        $quantity = 0;
        $product_image = NOIMAGE;
        $status = 1;
    }
}
/* -------------------------------------------------------------------- */
/* ------------ КОНЕЦ РЕДАКТИРОВАНИЯ ИЛИ СОЗДАНИЯ ТОВАРА    ----------- */
/* -------------------------------------------------------------------- */





/* -------------------------------------------------------------- */
/* ----------------- Мы зашли на листинг товаров   -------------- */
/* -------------------------------------------------------------- */
else{
    $prod_mass = $model->getProducts(0,10);
    $products = array();
    foreach ($prod_mass as $val) {
        $products[] = array(
            'product_id' => $val['product_id'],
            'name' => $val['name'],
            'link' => 'reproducts/'.$model->getProdsLink($val['product_id'])
        );
    } 
}



/* ----------------------------------------------------------------- */
/* ----------- Часть контроллера только для AJAX обращений --------- */
/* ----------------------------------------------------------------- */
if(isset($_REQUEST['method']) && $_REQUEST['method']=='ajax'){
	
	$ajax = '';
}