<?php

require 'classes.php';

$posts = array();

// $connect = mysqli_connect("localhost", "root", "", "base");
$connect = mysqli_connect("localhost", "qwertyuser", "25374solnce", "qwerty");
mysqli_set_charset($connect, "utf8");

if (mysqli_connect_errno()) {
    echo 'ERROR: '.mysqli_connect_error();
}

$query = "SELECT * FROM posts";
$result = mysqli_query($connect, $query);

while ($row = mysqli_fetch_array($result)) {
    $posts[] = new Post($row);
}