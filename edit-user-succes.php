<?php

session_start();
require_once 'data.php';

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $id = $_POST['id'];
    $type = $_POST['type'];

    if (!empty($login) && !empty($pass) && !empty($type) && !empty($id)) {
        $query = "UPDATE `users` SET `login`= '".$login."' WHERE `id` ='".$id."'";
        mysqli_query($connect, $query);

        $query2 = "UPDATE `users` SET `pass`= '".$pass."' WHERE `id` ='".$id."'";
        mysqli_query($connect, $query2);

        $query3 = "UPDATE `users` SET `type`= '".$type."' WHERE `id` ='".$id."'"; 

        if ($_SESSION['type'] == 'admin' && $type != 'user') {
            mysqli_query($connect, $query3);
            echo "Готово!<br>";
        } else {
            echo "Error! Так нельзя<br>";
        }

        echo '<a href="panel.php">Назад</a>';
    }
}