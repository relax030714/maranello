<br />
<hr />
<br />
<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
	<input name="userfile" type="file">
	<button type="submit" class="btn btn-success">Выполнить</button>
</form>
<br />
<hr />
<br />
<?php
    if(isset($statusf) && $statusf){
        echo '<p>' . $statusf . '</p>';
    }
?>
<br />
<hr />
<br />