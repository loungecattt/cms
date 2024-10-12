<?php

session_start();

require_once 'data.php';

if (isset($_POST['submit'])) {
    $pass = $_POST['pass'];
    $newpass = $_POST['newpass'];
    $login = $_SESSION['login'];
    $id = $_SESSION['id'];

    if (!empty($login) && !empty($pass)) {
        $query = "SELECT * FROM `users` WHERE `login`='{$login}' && `pass`='{$pass}';";
        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_row($result);

        if (!empty($row)) {
            $user = new User($row);

            if ($user->login == $login && $user->pass == $pass) {
                $query = "UPDATE `users` SET `pass`= '{$newpass}' WHERE `id` ='{$id}'";
                $result = mysqli_query($connect, $query);
                echo "Готово, $login";
                echo '<br>Вернуться в <a href="panel.php">панель пользователя</a><br>';
            }
        } else {
            echo "Логин или пароль не правильный";
            echo '<br><a href="change-pass.php">Назад</a>';
        }
    } 
}