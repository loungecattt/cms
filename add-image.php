<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Загрузка изображений</title>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <input type="submit" value="Загрузить файл!">
    </form>

    <?php

    if(isset($_FILES['file'])) {
      $check = can_upload($_FILES['file']);
    
      if($check === true) {
        make_upload($_FILES['file']);
        echo "<strong>Файл успешно загружен!</strong>";
      }
      else {
        echo "<strong>$check</strong>";  
      }
    }

    function can_upload($file) {
        if($file['name'] == '') {
            return 'Вы не выбрали файл.';
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
        $name = mt_rand(0, 10000) . $file['name'];
        copy($file['tmp_name'], 'img/' . $name);
      }
    ?>
  </body>
</html>