<?php

session_start();

require_once 'data.php';

$user;

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (!empty($login) && !empty($pass)) {
        $query = "SELECT * FROM `users` WHERE `login`='".$login."' && `pass`='".$pass."';";
        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_row($result);

        if (!empty($row)) {
            $user = new User($row);

            if ($user->login == $login && $user->pass == $pass) {
                $_SESSION['login'] = $login;
                $_SESSION['type'] = $user->type;
                $_SESSION['id'] = $user->id;
                echo "Вы вошли как $login <br>";
                echo '<a href="index.php">На главную</a>';
            }
        } else {
            echo "Логин или пароль не правильный";
            echo '<br><a href="login.php">Назад</a>';
        }
    } 
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $_SESSION['name'] = $name;
} elseif (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    $name = "Гость";
}