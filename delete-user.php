<?php

session_start();

require_once 'data.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if($id == $_SESSION['id']) {
        echo "Error! Так нельзя!";
    } else {
        $query = "DELETE FROM `users` WHERE `id`= {$id}";
        $result = mysqli_query($connect, $query);
        echo "Пользватель удален!<br>";
    }
    echo '<br><a href="panel.php">Назад</a>';
}