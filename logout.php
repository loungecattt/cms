<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['type']);

echo "Вы вышли<br>";
echo '<a href="index.php">На главную</a>';