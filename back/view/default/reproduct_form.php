<?php if($_SESSION['status'] == 3){ ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    
    <a href="<?php echo $back;?>">НАЗАД</a><br /><br />

    <input type="hidden" name="reproduct" size="100" value="1" />
    <input type="hidden" name="product_id" size="100" value="<?php echo $product_id; ?>" />
    <p>Название товара:</p>
    <input type="text" name="name" value="<?php echo $name; ?>" /><br />
    <p>URL товара:</p>
    <input type="text" name="product_url" value="<?php echo $url; ?>" /><br />
    <p>Категория товара: </p>
    <select name="category_id" class="form-control">
        <option value="0">Не выбрано</option>
        <?php foreach ($categories_list as $cl) { ?>
                <option value="<?php echo $cl['category_id']; ?>" <?php if (isset($categoty_id) && $cl['category_id'] == $product_id) { echo 'selected="selected"'; } ?>><?php echo $cl['category_name']; ?></option>
        <?php } ?>
    </select>
    <p>Артикул товара:</p>
    <textarea name="articul" cols="75" rows="2"><?php echo $articul; ?></textarea><br />
    <p>Состав:</p>
    <textarea name="product_description" cols="75" rows="4"><?php echo $product_description; ?></textarea><br />
    <p>Цена товара:</p>
    <textarea name="price" cols="75" rows="4"><?php echo $price; ?></textarea><br />
    <p>Количество:</p>
    <input type="text" name="quantity" size="100" value="<?php echo $quantity; ?>" /><br />

    <p>Статус</p>
    <select name="status" class="form-control">
        <option value="0" <?php if($status==0){ echo 'selected="selected"'; } ?>>Выкл</option>
        <option value="1" <?php if($status==1){ echo 'selected="selected"'; } ?>>Вкл</option>
    </select>    
    <br /><br />
    
    <img src="<?php echo $product_image;?>" height="150px" /><br />
    <input name="userfile" type="file"><br /><br />

    
    <input type="submit" name="enter" value="Сохранить" />
</form>
<?php } else echo "Доступ закрыт!"; ?>