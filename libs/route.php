<?php
//Функция my_rout принимает $_GET['_route_'] переменную, которая была получена
//из URL строки с помощью .htaccess
//разбив на массив эту строку по /, функция прогоняет по базе данных (таблица url_alias) ища соответсвия
//и возвращает наш controller и дополнительные get параметры со своими ЧПУ
class My_rout extends Database{
    
    public function get_controller($route) {
        
        $add_controller = 'errors/404';
        
        $path = $this->get_path($route);
        if($path !== 404){
            $path_mass = explode('/', $path);
            $get_path = array();
            foreach ($path_mass as $pm) {
                $small_path = explode('=', $pm);
                if($small_path[0] == 'controller'){
                    $add_controller =  $small_path[1];
                }
                else{
                    $get_path[$small_path[0]] = $small_path[1];
                }
            }
            foreach ($get_path as $key => $value) {
                $_POST[$key] = $value;
            }

        }
        return $add_controller;
    }
    
    public function get_path($route) {
        
        $url = '';
        $control_true = 0;
        
        $route_mass = explode('/', $route);
        foreach ($route_mass as $rm) {
            $result = $this->get_one_db("SELECT url FROM url_alias WHERE alias = '$rm'");
            if($result){
                    foreach ($result as $value) {
                        $url .= '/'.$value;
                        //проверим что бы в пути был тоько один контроллер
                        $text="controller";
                        if(strstr($value, $text)) $control_true++;
                    }
            }
            else{
                //так мы отрезаем не существующие параметры URL
                return 404;
            }
        }
        if($control_true>1) return 404;
        //убрал первый слеш
        return substr($url, 1);
    }
    
    public function includder($add_controller) {
        
        //шаблон по умолчанию
        $add_tpl = $add_controller;
        
        //$selector - для определения AJAX запроса что бы можно было вернуть только результат...
        $selector = 0;  
        if(isset($_REQUEST['method']) && $_REQUEST['method']=='ajax'){
            $selector = 1;
        }
        //подключим нужные контроллеры
        if(!$selector){ include '/controller/header.php'; }
        include '/controller/'.$add_controller.'.php';
        if(!$selector){ include '/controller/footer.php'; }

        if(!$selector){ include VIEW.'header.php'; }
        if(!$selector){ include VIEW.$add_tpl.'.php'; }
        if(!$selector){ include VIEW.'footer.php'; }
    }

}