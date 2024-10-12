<?php

session_start();

require_once 'data.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if (!empty($login) && !empty($pass)) {
        $query = 'INSERT INTO `users` (`id`, `login`, `pass`) VALUES (null,"'.$login.'","'.$pass.'");';
        $result = mysqli_query($connect, $query);

        if ($_SESSION['type'] == 'admin') {
            echo 'Готово!<br>';
            echo '<a href="panel.php">Назад</a>';

        } else {
            echo 'Готово, выможете <a href="login.php">войти</a> на сайт';
        }
    }
}