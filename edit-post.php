<?php

session_start();
require_once 'data.php';

$postId = $_GET['id'];
$getPostTitleQuery = "SELECT * FROM `posts` WHERE `id`='{$postId}'";
$result = mysqli_query($connect, $getPostTitleQuery);
$row = mysqli_fetch_row($result);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="edit-post-succes.php">
            Название
            <br><input type="text" name="title" style="height: 20px; width:200px;" value="<?php echo $row[1]?>"/>
            <br>Текст
            <br><input type="textarea" name="content" style="width:400px; padding: 0 0 200px;" value="<?php echo $row[2]?>">
            <br><input type="submit" value="ok" name='submit' style="margin-top:5px;"/>
            <input type="hidden" name="id" value="<?php echo $postId ?>">
        </form>
        <br><a href="index.php">Отмена</a>
    </body>
</html>