<?php
session_start();
$_SESSION['auth'] = null;
header('Location: index.php');
ob_end_flush();
