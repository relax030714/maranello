<?php if($_SESSION['status'] == 3){ ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" size="100" value="0" />
    <input type="submit" name="enter" value="Добавить Товар" />
</form>
<ul>
<?php
foreach ($products as $prod) {
    echo "<li><a href='" . $prod['link'] . "'>" . $prod['name'] . "</a> / <a href='?del=" . $prod['product_id'] . "'>DEL</a></li>";
}
?>
</ul>
<a href="/back/">НАЗАД</a><br /><br />
<?php } else echo "Доступ закрыт!"; ?>