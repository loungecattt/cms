<?php

session_start();

$login = $_SESSION['login'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="change-login-succes.php">
            Текущий логин: <?php echo $login?>
            <br><input type="text" name="newlogin" style="height: 15px; width:200px;"/ placeholder="Новый логин">
            <br><input type="submit" value="ok" name='submit' style="margin-top:3px;"/>
        </form>
        <br><a href="panel.php">Отмена</a>
    </body>
</html>