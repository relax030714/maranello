<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="category_id" size="100" value="0" />
    <input type="submit" name="enter" value="Добавить новую категорию" />
</form>
<ul>
<?php
foreach ($categories as $cat) {
    echo "<li><a href='" . $cat['link'] . "'>" . $cat['name'] . "</a> / <a href='?del=" . $cat['category_id'] . "'>DEL</a></li>";
}
?>
</ul>
<a href="/back/">НАЗАД</a><br /><br />