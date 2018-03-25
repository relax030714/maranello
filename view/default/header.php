<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    </head>
<body>
    <header>
        <a href="../" class="name">Maranello</a>
	<nav class="dws-menu">
            <ul>
            <li class="menu"><a href="/categories">Меню</a>
                <ul class="submenu">
                    <li><a href="/categories/pizza">Пиццы</a>
                        <ul class="subsubmenu">
                            <li><a href="/categories/pizza/mara">Маранелла</a></li>
                        </ul>
                    </li>
                    <li><a href="/categories/salats">Салаты</a>
                        <ul class="subsubmenu">
                            <li><a href="/categories/salats/cesar">Цезарь</a></li>
                        </ul>
                    </li>
                    <li><a href="/categories/firsts">Первые блюда</a>
                        <ul class="subsubmenu">
                            <li><a href="/categories/firsts/bul">Бульон</a></li>
                        </ul>
                    </li>
                    <li><a href="/categories/seconds">Вторые блюда</a>
                        <ul class="subsubmenu">
                            <li><a href="/categories/seconds/lazm">Лазанья Мясная</a></li>
                        </ul>
                    </li>
                    <li><a href="/categories/desserts">Десерты</a>
                        <ul class="subsubmenu">
                            <li><a href="/categories/desserts/chizcake">Чизкейк</a></li>
                        </ul>
                    </li>
                    <li><a href="/categories/drink">Напитки</a>
                         <ul class="subsubmenu">
                            <li><a href="/categories/drink/rich">Сок Rich</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu"><a href="">Доставка</a></li>
            <li class="menu"><a href="">Акции</a></li>
            <li class="menu"><a href="/news">Новости</a></li>
            <li class="menu"><a href="/about">О нас</a></li>
            <li class="menu"><a href="">Контакты</a></li>
            <li class="menu"><a href="">Отзывы</a></li>
            <?php if(!isset($_SESSION['status'])){ ?>
            <li class="menu"><a href="/registration">Регистрация</a></li>
            <li class="menu"><a href="/login">Вход</a></li>
            <?php } ?>
            <?php if(isset($_SESSION['status'])){ ?>
            <li class="menu"><a href="/logout"><?php echo "Привет, ".$_SESSION['name']." / "?>Выход</a></li>
            <?php } ?>
            <?php if($_SESSION['status'] == 3){ ?>
            <li class="menu"><a href="../../back">Админка</a></li>
            <?php } ?>
            <ul>   
	</nav>      
    </header> 
</body>
</html>
    
