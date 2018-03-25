<?php if($_SESSION['status'] == 3){ ?>
<ul>
<li><a href="/back/recategories">Добавить или редактировать категорию</a></li>
<li><a href="/back/reproducts">Добавить или редактировать товар</a></li>
<li><a href="/back/renews">Добавить или редактировать новость</a></li>
</ul>
<?php } else echo "Доступ закрыт!"; ?>

