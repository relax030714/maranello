<?php
include '/model/'.$add_controller.'.php';
$model = new $add_controller;

$valid_types = array("xls", "xlsx");

if (isset($_FILES["userfile"])) {
    $statusf = 'Вы загрузили EXCEL файл на сайт';
    $selector_file_is_here - false;
    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        $filename=basename($_FILES['userfile']['name']);
        $ext = substr($_FILES['userfile']['name'], 1 + strrpos($_FILES['userfile']['name'], "."));
        if(in_array($ext, $valid_types)){
            $uploaddir = DIR_ROOT . 'uploads/';
            $uploadfile = $uploaddir.$filename;
            move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
            $selector_file_is_here = 1;
        }
        else{
            $error = 'Error: bed type of file'; 
        }
    }
    else { $error = "Error: empty file.";}
    
    require_once(LIBS . '/PHPExcel/Classes/PHPExcel/IOFactory.php');
			
    $xls = PHPExcel_IOFactory::load($uploadfile);
    $xls->setActiveSheetIndex(0);
    $sheet = $xls->getActiveSheet();

    // Получили строки 			
    $rowIterator = $sheet->getRowIterator();

    //далее обойдем их в цикле:
    $stroka = 0;
    $mass_report = array();
    $new_prods = array();
    
    foreach ($rowIterator as $row) {
            // Получили ячейки текущей строки и обойдем их в цикле
            if($stroka!=0){   //таким образом я отсек первую строку файла и начал разбор со второй
                    $cellIterator = $row->getCellIterator();     // Получили ячейки текущей строки и обойдем их в цикле
                    $stolbec = 0;  			         // Что бы потом использовать только нужные столбцы
                    foreach ($cellIterator as $cell) {
                            if($stolbec==0){        $name = $cell->getCalculatedValue();} //так получаем значение ячейки
                            elseif($stolbec==1){    $art = $cell->getCalculatedValue();}
                            elseif($stolbec==2){    $price = $cell->getCalculatedValue();}
                            elseif($stolbec==3){    $quantity = $cell->getCalculatedValue();}
                            elseif($stolbec==4){    $status = $cell->getCalculatedValue();}
                            $stolbec++;
                    }
                    $mass_report[] = array(
                            'name' => $name,
                            'art'  => $art, 
                            'price' => $price,
                            'quantity' => $quantity,
                            'status' => $status);
            }
            $stroka++;
    }      
    if($mass_report){
        $new_prods = $model->setProductFromPrice($mass_report);
    }

    $statusf .= "<br /> В базу отправлено " . ($stroka - 1) . " товаров:";
    foreach ($new_prods as $val) {
        $statusf .= "<p> Товар с id - $val</p>";
    }
}
else{
    $statusf = 'Еще не выбрали файл excel для заливки данных на сайт.';
}




