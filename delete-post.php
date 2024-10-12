<?php

session_start();

require_once 'data.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `posts` WHERE `id`= {$id}";
    $result = mysqli_query($connect, $query);
    echo "Запись удалена!<br>";
    echo '<a href="index.php">На главную</a>';
}