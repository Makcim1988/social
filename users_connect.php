<!--<meta charset="utf-8">-->
<?php
$host = 'MySQL-8.0';
$user = 'root';
$password = '';
$name = 'social';

$link = mysqli_connect($host, $user, $password, $name);
mysqli_query($link, "SET NAMES 'utf8'");