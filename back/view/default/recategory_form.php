<?php if($_SESSION['status'] == 3){ ?>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    
    <a href="<?php echo $back;?>">НАЗАД</a><br /><br />

    <input type="hidden" name="recategory" size="100" value="1" />
    <input type="hidden" name="category_id" size="100" value="<?php echo $category_id; ?>" />
    <p>Название категории:</p>
    <input type="text" name="category_name" value="<?php echo $category_name; ?>" /><br />
    <p>URL категории:</p>
    <input type="text" name="category_url" value="<?php echo $url; ?>" /><br />    
    <p>Родительская категория</p>
    <select name="parent_id" class="form-control">
        <option value="0">Не выбрано</option>
        <?php foreach ($categories_list as $cl) { ?>
                <option value="<?php echo $cl['category_id']; ?>" <?php if (isset($parent_id) && $parent_id == $cl['category_id']) { echo 'selected="selected"'; } ?>><?php echo $cl['category_name']; ?></option>
        <?php } ?>
    </select>
    <p>Короткий текст:</p>
    <textarea name="category_text_small" cols="75" rows="2"><?php echo $category_text_small; ?></textarea><br />
    <p>Полный текст:</p>
    <textarea name="category_text" cols="75" rows="4"><?php echo $category_text; ?></textarea><br />
    <p>SEO Title:</p>
    <input type="text" name="category_seo_title" size="100" value="<?php echo $category_seo_title; ?>" /><br />
    <p>SEO Description:</p>
    <input type="text" name="category_seo_description" size="100" value="<?php echo $category_seo_description; ?>" /><br />
    <p>SEO Keywords:</p>
    <input type="text" name="category_seo_keywords" size="100" value="<?php echo $category_seo_keywords; ?>" /><br />
    
    <p>Сортировка:</p>
    <input type="text" name="sort_order" size="100" value="<?php echo $sort_order; ?>" /><br />
    <p>Статус</p>
    <select name="status" class="form-control">
        <option value="0" <?php if($status==0){ echo 'selected="selected"'; } ?>>Выкл</option>
        <option value="1" <?php if($status==1){ echo 'selected="selected"'; } ?>>Вкл</option>
    </select>    
    <br /><br />
    
    <img src="<?php echo $category_image;?>" height="150px" /><br />
    <input name="userfile" type="file"><br /><br />

    
    <input type="submit" name="enter" value="Сохранить" />
</form>
<?php } else echo "Доступ закрыт!"; ?>