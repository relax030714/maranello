<?php
include '/model/'.$add_controller.'.php';
$model = new $add_controller;

/* --------------------------------------------------- */
/* -------------- Код удаления новости ------------- */
/* --------------------------------------------------- */
if(isset($_GET['del']) && $_GET['del']){
    $model->delNews($_GET['del']);
    header( 'Location: /back/renews');
}






/* -------------------------------------------------------------------- */
/* --------------- РЕДАКТИРОВАНИЕ ИЛИ СОЗДАНИЕ НОВОСТЕЙ  -------------- */
/* -------------------------------------------------------------------- */
//если пришло из формы news_id значит это пришла форма из формы редактирования или создания новости
//здесь мы проверяем только на существование, так как для пустой формы мы будем передавать эту переменную со значением 0
if(isset($_POST['news_id'])){
    
    //если получили данные из формы и нужно сохранить
    if(isset($_POST['renews'])){
        if($_POST['news_id']==0){
            $news_id = $model->setNews($_POST);
            header( 'Location: /back/renews');
        }
        else{
            $model->updateNews($_POST);
            $news_id = $_POST['news_id'];
        }
    }
    
    //подключим свою верстку
    $add_tpl = 'renews_form';
    $back = HTTP_SERVER . '/back/renews';

    //разделим код на форму для редактирования уже существующей новости
    if($_POST['news_id']){
        
        $url = $model->getNewsLink($_POST['news_id']);
        $action = HTTP_SERVER . '/back/renews/' . $url;
        
        //получим все данные о новости и передаем в форму
        $news_info = $model->getNew($_POST['news_id']);
        //соберем переменные для передачи в верстку
        $news_id = $_POST['news_id'];
        $name = $news_info['name'];
        $text = $news_info['text'];
        $title = $news_info['title'];
        $status = $news_info['status'];
    }    
    //код формы для заведения новых новостей
    else{
        
        $url = '';
        $action = HTTP_SERVER . '/back/renews';        
        
        //значение по умолчанию что бы не делать проверок на существование в верстке
        $news_id = 0;
        $name = '';
        $text = '';
        $title = '';
        $status = 1; 
    }
}
/* -------------------------------------------------------------------- */
/* ------------ КОНЕЦ РЕДАКТИРОВАНИЯ ИЛИ СОЗДАНИЯ НОВОСТЕЙ  ----------- */
/* -------------------------------------------------------------------- */


    else{
        $news_mass = $model->getNews(0,10);
        $news = array();
        foreach ($news_mass as $val) {
            $news[] = array(
                'news_id' => $val['news_id'],
                'name' => $val['name'],
                'link' => 'renews/'.$model->getNewsLink($val['news_id'])
        );
    } 
    }


    /* !!!!!!!!!!!!!!!!!!!!!!!!   Часть контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!!!!! */
    if(isset($_REQUEST['method']) && $_REQUEST['method']=='ajax'){
	
	$ajax = '';
    }
    /* !!!!!!!!!!!!!!!!!!!!!   КОНЕЦ Части контроллера только для AJAX обращений   !!!!!!!!!!!!!!!!!!!!!!!! */




