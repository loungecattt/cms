<?php

require_once 'data.php';

if (isset($_POST['img'])) {
    $img = $_POST['img'];
} else {
    $img = "";
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $short = $_POST['short_content'];

    if (!empty($title) && !empty($content)) {
        $query = "INSERT INTO `posts` (`id`, `title`, `content`, `img`, `short_content`) VALUES (null,'{$title}','{$content}', '{$img}', '{$short}');";
        $result = mysqli_query($connect, $query);
        echo "Готово!<br>";
        echo '<a href="index.php">Посмотреть запись</a>';
    }
}