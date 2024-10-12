<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>
    <a href="index.php">На главную</a><br>
    <?php
        if($_SESSION['type'] == 'admin') {
            echo '<br><b>Добавить пользователя:</b></br>';
        } else {
            echo '<br><b>Регистрация:</b></br>';
        }
    ?>
        <form method="post" action="register-succes.php">
            Логин<input type="text" name="login" style="height: 15px; margin-left: 10px; margin-bottom: 3px; width: 100px;"/><br>
            Пароль<input type="text" name="pass" style="height: 15px; margin-right: 10px; margin-left: 2px; margin-bottom: 5px; width: 100px;"/>
            <br><input type="submit" value="ок" name="submit"/>
        </form>
    </body>
</html>