<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION['id'] = null;
header('Location: index.php');
ob_end_flush();
