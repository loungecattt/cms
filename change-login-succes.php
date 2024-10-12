<?php

session_start();

require_once 'data.php';

if (isset($_POST['submit'])) {
    $newlogin = $_POST['newlogin'];
    $id = $_SESSION['id'];
    $query = "UPDATE `users` SET `login`= '".$newlogin."' WHERE `id` ='".$id."'";
    $result = mysqli_query($connect, $query);
    $_SESSION['login'] = $newlogin;
    echo "Готово, $newlogin";
    echo '<br>Вернуться в <a href="panel.php">Панель пользователя</a><br>';
}