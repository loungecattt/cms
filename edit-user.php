<?php

session_start();
require_once 'data.php';

$userId = $_GET['id'];
$getUserQuery = "SELECT * FROM `users` WHERE `id`='{$userId}'";
$result = mysqli_query($connect, $getUserQuery);
$row = mysqli_fetch_row($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h4>Редактировать пользователя</h4>
        <form method="post" action="edit-user-succes.php">
            Логин
            <br><input type="text" name="login" style="height: 15px; width:100px;" value="<?php echo $row[1]?>"/>
            <br>Пароль
            <br><input type="text" name="pass" style="height: 15px; width:100px;" value="<?php echo $row[2]?>">
            <input type="hidden" name="id" value="<?php echo $userId ?>">
        <br>Тип аккаунта<br>
        <select size="1" style="width: 109px; height: 20px;" name="type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br><input type="submit" value="ok" name='submit' style="margin-top:5px;"/>
        </form>
        <br><br><a href="index.php">Отмена</a>
    </body>
</html>