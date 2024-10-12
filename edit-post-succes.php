<?php

require_once 'data.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    if (!empty($title) && !empty($content)) {
        // $query = "INSERT INTO `posts` (`id`, `title`, `content`) VALUES (null,'{$title}','{$content}');";
        $query = "UPDATE `posts` SET `title`= '".$title."' WHERE `id` ='".$id."'";
        $result = mysqli_query($connect, $query);

        $query2 = "UPDATE `posts` SET `content`= '".$content."' WHERE `id` ='".$id."'";
        $result2 = mysqli_query($connect, $query2);

        echo "Готово!<br>";
        echo '<a href="index.php">Посмотреть запись</a>';
    }
}