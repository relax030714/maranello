<?php
include '/model/'.$add_controller.'.php';
$model = new $add_controller;




/* --------------------------------------------------- */
/* -------------- Код удаления категории ------------- */
/* --------------------------------------------------- */
if(isset($_GET['del']) && $_GET['del']){
    $model->delCategory($_GET['del']);
    header( 'Location: /back/recategories');
}






/* -------------------------------------------------------------------- */
/* --------------- РЕДАКТИРОВАНИЕ ИЛИ СОЗДАНИЕ КАТЕГОРИЙ -------------- */
/* -------------------------------------------------------------------- */
//если пришло из формы category_id значит это пришла форма из формы редактирования или создания товара
//здесь мы проверяем только на существование, так как для пустой формы мы будем передавать эту переменную со значением 0
if(isset($_POST['category_id'])){
    
    //если получили данные из формы и нужно сохранить
    if(isset($_POST['recategory'])){
        if($_POST['category_id']==0){
            $category_id = $model->setCategory($_POST);
            header( 'Location: /back/recategories');
        }
        else{
            $model->updateCategory($_POST);
            $category_id = $_POST['category_id'];
        }
        //код для обработки пришедшей картинки
        if (isset($_FILES["userfile"])) {
                if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
                //Возвращает TRUE, если файл filename был загружен при помощи HTTP POST
                        $filename=basename($_FILES['userfile']['name']);       
                        //basename -- Возвращает имя файла из указанного пути                                     
                        $uploadfile = '../img/'.$filename;        
                        if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
                            $model->setImageCategory($category_id, $filename);
                        };
                }
        } 
    }
    
    //подключим свою верстку
    $add_tpl = 'recategory_form';
    $back = HTTP_SERVER . '/back/recategories';
    
    //нам понадобится перечень категорий для выбора parent_id
    $categories_list = $model->getCategoriesList();

    //разделим код на форму для редактирования уже существующей категории
    if($_POST['category_id']){
        
        $url = $model->getCatsLink($_POST['category_id']);
        $action = HTTP_SERVER . '/back/recategories/' . $url;
        
        //получим все данные о категрии и передаем в форму
        $cat_info = $model->getCategory($_POST['category_id']);
        //соберем переменные для передачи в верстку
        $category_id = $_POST['category_id'];
        $parent_id = $cat_info['parent_id'];
        $category_name = $cat_info['category_name'];
        $category_text = $cat_info['category_text'];
        $category_text_small = $cat_info['category_text_small'];
        $category_seo_title = $cat_info['category_seo_title'];
        $category_seo_description = $cat_info['category_seo_description'];
        $category_seo_keywords = $cat_info['category_seo_keywords'];
        $category_image = IMAGE . $cat_info['category_image'];
        $status = $cat_info['status'];
        $sort_order = $cat_info['sort_order'];
    }    
    //код формы для заведения новых категорий
    else{
        
        $url = '';
        $action = HTTP_SERVER . '/back/recategories';        
        
        //значение по умолчанию что бы не делать проверок на существование в верстке
        $category_id = 0;
        $parent_id = 0;
        $category_name = '';
        $category_text = '';
        $category_text_small = '';
        $category_seo_title = '';
        $category_seo_description = '';
        $category_seo_keywords = '';
        $category_image = NOIMAGE;
        $status = 1;
        $sort_order = 1;  
    }
}
/* -------------------------------------------------------------------- */
/* ------------ КОНЕЦ РЕДАКТИРОВАНИя ИЛИ СОЗДАНИя КАТЕГОРИЙ ----------- */
/* -------------------------------------------------------------------- */





/* -------------------------------------------------------------- */
/* ----------------- Мы зашли на листинг категорий -------------- */
/* -------------------------------------------------------------- */
else{
    $cat_mass = $model->getCategories(0,10);
    $categories = array();
    foreach ($cat_mass as $val) {
        $categories[] = array(
            'category_id' => $val['category_id'],
            'name' => $val['category_name'],
            'link' => 'recategories/'.$model->getCatsLink($val['category_id'])
        );
    } 
}



/* ----------------------------------------------------------------- */
/* ----------- Часть контроллера только для AJAX обращений --------- */
/* ----------------------------------------------------------------- */
if(isset($_REQUEST['metod']) && $_REQUEST['metod']=='ajax'){
	
	$ajax = '';
}