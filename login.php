<?php
session_start();

/*$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'social';

$link = mysqli_connect($host, $user, $pass, $name);*/

require_once 'users_connect.php';

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);

    if(!empty($user)) {
        //$_SESSION['flash'] = 'Вы успешно авторизовались!';
        //echo $_SESSION['flash'];
        //header('Location: index.php');
        //ob_end_flush();
        //echo 'Вы успешно авторизовались!';
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        header('Location: index.php');
        ob_end_flush();
    } else {
        echo 'Логин или пароль введен неверно';
        echo '<a href="login.php">Авторизация</a>';
    }

}
?>
<form action="" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit">
</form>



