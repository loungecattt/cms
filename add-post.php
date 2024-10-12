<?php

    $name;

    if(isset($_FILES['file'])) {
      $check = can_upload($_FILES['file']);
    
      if($check === true) {
        make_upload($_FILES['file']);
        echo "<strong>Файл загружен: </strong>";
        print $name;
      }
      else {
        echo "<strong>$check</strong>";  
      }
    }

    function can_upload($file) {
        if($file['name'] == '') {
            return 'Файл не выбран.';
        }

        if($file['size'] == 0) {
            return 'Файл слишком большой.';
        }

        $getMime = explode('.', $file['name']);
        $mime = strtolower(end($getMime));

        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

        if(!in_array($mime, $types)) {
            return 'Недопустимый тип файла.';
        }
        return true;
      }
      
      function make_upload($file) {	
        global $name;
        $name = mt_rand(0, 10000) . "_" . $file['name'];
        copy($file['tmp_name'], 'img/' . $name);
      }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br><a href="index.php">На главную</a><br>
        <h4>Добавить изображение:</h4>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" style="margin-bottom:2px;"><br>
            <input type="submit" value="Загрузить">
        </form>
        <h4>Добавить запись:</h4>
        <form method="post" action="add-post-succes.php">
            Название
            <br><input type="text" name="title" style="height: 20px; width:200px;" />
            <br>Текст
            <br><input type="textarea" name="content" style="width:400px; padding: 0 0 200px;" />
            <br>Описание
            <br><input type="textarea" name="short_content" style="width:400px; padding: 0 0 100px;" />
            <br><input type="submit" value="Опубликовать" name='submit' style="margin-top:5px; margin-bottom:12px;"/>
            <input type="hidden" name="img" value="<?php echo $name ?>">
        </form>
        <br><br><br>
    </body>
</html>