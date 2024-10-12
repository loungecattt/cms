<?php

class Post {
    public $id;
    public $title;
    public $content;
    public $img;
    public $shortContent;

    function __construct($row) {
        $this->id = $row[0];
        $this->title = $row[1];
        $this->content = $row[2];
        $this->img = $row[3];
        $this->shortContent = $row[4];
    }

    function post() {
        echo "<a href='post.php?id=" . $this->id ."'>{$this->title}</a><br>";
        // echo '<img src="{'. $this->img . '}" width="auto" height="auto">';
        if(!empty($this->img)) {
            echo "<a href='post.php?id=" . $this->id ."'>" . '<img src="img/'. $this->img . '" width="200" height="auto">' ."</a><br>";
            // echo '<img src="img/'. $this->img . '" width="200" height="auto"><br>';
        }
        echo $this->shortContent.'<br>';
        echo '<div style="width:550px"><hr></div>';
    }

    function postForAdmin() {
        echo "<a href='post.php?id=" . $this->id ."'>{$this->title}</a><br>";

        if(!empty($this->img)) {
            echo "<a href='post.php?id=" . $this->id ."'>" . '<img src="img/'. $this->img . '" width="200" height="auto">' ."</a><br>";
            // echo '<img src="img/'. $this->img . '" width="200" height="auto"><br>';
        }

        echo $this->shortContent.'<br>';
        echo '<a href="edit-post.php?id=' . $this->id .'">редактировать</a> &bull;';
        echo ' <a href="delete-post.php?id=' . $this->id .'">удалить</a>';
        echo '<div style="width:550px"><hr></div>';
    }

    function showList() {
        echo "{$this->title} <br>";
        echo '<a href="post.php?id=' . $this->id .'">посмотреть</a> &bull;';
        echo ' <a href="edit-post.php?id=' . $this->id .'">редактировать</a> &bull;';
        echo ' <a href="delete-post.php?id=' . $this->id .'">удалить</a>';
        echo '<div style="width:550px"><hr></div>';
    }
}

class Comment {

    public $id;
    public $user;
    public $date;
    public $content;

    function __construct($row) {
        $this->id = $row[0];
        $this->user = $row[1];
        $this->date = $row[2];
        $this->content = $row[3];
    }

    function post() {
        echo $this->content.'<br>';
        echo $this->user.' ';
        echo $this->date;

        // echo date_format($this->date, 'Y-m-d H:i:s');

        // echo date("D-M-Y", $this->date); 

        echo '<div style="width:550px"><hr></div>';
    }
}

class User {
    public $id;
    public $login;
    public $pass;
    public $type;

    function __construct($user) {
        $this->id = $user[0];
        $this->login = $user[1];
        $this->pass = $user[2];
        $this->type = $user[3];
    }

    function showList() {
        echo "{$this->login} <br>";
        echo '<a href="user.php?id=' . $this->id .'">посмотреть</a>';
        echo ' <a href="edit-user.php?id=' . $this->id .'">редактировать</a>';
        echo ' <a href="delete-user.php?id=' . $this->id .'">удалить</a>';
        echo '<div style="width:550px"><hr></div>';
    }
}