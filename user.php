<?php

session_start();

require_once 'data.php';

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $userQuery = "SELECT * FROM `users` WHERE `id`= {$id}";
    $result = mysqli_query($connect, $userQuery);
    $row = mysqli_fetch_row($result);
    $user = new User($row);
    echo "Логин: {$user->login} <br>Тип аккаунта: {$user->type}";
}