<?php

session_start();
require_once 'data.php';

$login = $_SESSION['login'];
$type = $_SESSION['type'];
$posts = array();
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
            if ($type == 'admin') {
                echo '<h4>Панель управления</h4>';
            } else {
                echo '<h4>Панель пользователя</h4>';
            }
        ?>
        Логин: <?php echo $login?>
        (<a href="change-login.php">изменить</a>)<br>
        Пароль: ***** (<a href="change-pass.php">изменить</a>)
        <?php 
        
        if ($type == 'admin') {

            // Posts

            $query = "SELECT * FROM `posts`";
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_array($result)) {
                $posts[] = new Post($row);
            }

            echo "<br><br><h4>Все записи:</h4>";
        
            foreach ($posts as $item) {
                echo $item->showList();
            }

            echo '<br><a href="add-post.php">Добавить запись</a><br>';

            // Users

            $usersQuery = "SELECT * FROM `users`";
            $usersResult = mysqli_query($connect, $usersQuery);

            while ($row = mysqli_fetch_row($usersResult)) {
                $users[] = new User($row);
            }

            echo "<br><br><h4>Все пользователи:</h4>";
        
            foreach ($users as $item) {
                echo $item->showList();
            }

            echo '<br><a href="register.php">Добавить пользователя</a><br>';
        }
        ?>
        <br>
</html>