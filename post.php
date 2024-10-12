<?php

session_start();

require_once 'data.php';
$comments = array();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `posts` WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_row($result);
    
    if (!empty($row)) {
        $post = new Post($row);
        $title = $post->title;
        $content = $post->content;
        $img = $post->img;
    }

    $commentQuery = "SELECT * FROM `comments` WHERE `post_id`='{$id}'";
    $commentResult = mysqli_query($connect, $commentQuery);
    // $commentRow = mysqli_fetch_array($commentResult);
    // print_r($commentRow);

    if (!empty($commentResult)) {
        while ($comment = mysqli_fetch_array($commentResult)) {
            $comments[] = new Comment($comment);
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php echo '<a href="index.php">На главную</a>' ?>
        <div><h3><?php echo $title ?></h3></div>
        <img src="img/<?php echo $img ?>" width="400" height="auto">
        <div style="width:400px;"><br><?php echo $content ?></div>
        <h4>Комментарии:</h4>
        <div><?php 
        
        if (isset($comments)) {
            foreach ($comments as $item) {
                echo $item->post()."<br>";
            }
        } else {
            echo 'Комментариев нет';
        }
        
        ?></div>
        Добавить комментарий:
        <form method="post" action="add-comment-succes.php">
            <input type="textarea" name="comment" style="width:300px; margin-right: 10px; padding: 0 0 100px;" />
            <br><input type="submit" name="submit"value="Отправить" style="margin-top: 3px;"/>
            <br><input type="hidden" name="id" value="<?php echo $id ?>">
        </form>
        <br><br><br><br>
    </body>
</html>