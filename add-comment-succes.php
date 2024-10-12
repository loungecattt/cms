<?php

require_once 'data.php';

session_start();

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {
    $user = 'guest';
}

if (isset($_POST['submit'])) {
    $postId = $_POST['id'];
    $comment = $_POST['comment'];

    if (isset($_SESSION['time'])) {
        if (time() < $_SESSION['time'] + 60) {
            print "Подождите 60 секунд";
            echo '<br><a href="post.php?id=' . $postId .'">Назад</a>';
            exit;
        }
    }

    if (!empty($comment)) {
        $query = "INSERT INTO `comments` (`post_id`, `user`, `content`) VALUES ('{$postId}','{$user}','{$comment}');";
        $result = mysqli_query($connect, $query);
        echo "Ваш комментарий добавлен!<br>";
        echo '<a href="post.php?id=' . $postId .'">Посмотреть</a>';
        $_SESSION['time'] = time();
    } else {
        print "Введите текст комментария";
        echo '<br><a href="post.php?id=' . $postId .'">Назад</a>';
    }
} else {
    print "error";
}