
<?php

session_start();

require_once 'data.php';

if (isset($_SESSION['login'])) {
    $name = $_SESSION['login'];
} else {
    $name = "Гость";
}

if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Привет, <?php echo $name; ?>!
        <?php
            if (!isset($_SESSION['login'])) {
                echo 'Вы можете  <a href="login.php">войти </a>';
                echo 'или <a href="register.php">зарегистрироваться</a><br>';
            } 

            if (isset($_SESSION['type']) && isset($_SESSION['login'])) {
                switch ($_SESSION['type']) {
                    case 'user': 
                        echo '<a href="panel.php">Панель пользователя</a>';
                        echo ' <a href="logout.php">Выйти</a><br>';
                        break;
                    case 'admin': 
                        echo '<a href="panel.php">Панель управления</a>';
                        echo ' <a href="logout.php">Выйти</a><br>';
                        echo '<br><a href="add-post.php">Добавить запись</a><br>';
                        break;
                }
            }

        echo "<br>";
        
        if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') {
            foreach ($posts as $item) {
                echo $item->postForAdmin()."<br>";
            }
        } else {
            foreach ($posts as $item) {
                echo $item->post()."<br>";
            }
        }
        ?>
    </body>
</html>
