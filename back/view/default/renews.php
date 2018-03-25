<?php if($_SESSION['status'] == 3){ ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="news_id" size="100" value="0" />
    <input type="submit" name="enter" value="Добавить новость" />
</form>
<ul>
<?php
foreach ($news as $new) {
    echo "<li><a href='" . $new['link'] . "'>" . $new['name'] . "</a> / <a href='?del=" . $new['news_id'] . "'>DEL</a></li>";
}
?>
</ul>
<a href="/back/">НАЗАД</a><br /><br />
<?php } else echo "Доступ закрыт!"; ?>