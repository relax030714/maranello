<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    
    <a href="<?php echo $back;?>">НАЗАД</a><br /><br />

    <input type="hidden" name="renews" size="100" value="1" />
    <input type="hidden" name="news_id" size="100" value="<?php echo $news_id; ?>" />
    <p>Название новости:</p>
    <input type="text" name="name" value="<?php echo $name; ?>" /><br />
    <p>URL новости:</p>
    <input type="text" name="news_url" value="<?php echo $url; ?>" /><br />
    <p>Текст новости:</p>
    <textarea name="text" cols="75" rows="2"><?php echo $text; ?></textarea><br />
    <p>title новости:</p>
    <textarea name="title" cols="75" rows="4"><?php echo $title; ?></textarea><br />
    <p>Статус</p>
    <select name="status" class="form-control">
        <option value="0" <?php if($status==0){ echo 'selected="selected"'; } ?>>Выкл</option>
        <option value="1" <?php if($status==1){ echo 'selected="selected"'; } ?>>Вкл</option>
    </select>    
    <br /><br />
    
    <input type="submit" name="enter" value="Сохранить" />
</form>