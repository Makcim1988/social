<!--<meta charset="utf-8">-->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$name = 'social';

$link = mysqli_connect($host, $user, $password, $name);
mysqli_query($link, "SET NAMES 'utf8'");