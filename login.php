<?php
session_start();

/*$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'social';

$link = mysqli_connect($host, $user, $pass, $name);*/

include 'users_connect.php';

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];

    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);

    if(!empty($user)) {
		$hash = $user['password'];
		
		if (password_verify($_POST['password'], $hash)) {
			$_SESSION['auth'] = true;
			$_SESSION['login'] = $login;
			header('Location: index.php');
			ob_end_flush();// все ок, авторизуем...
		} else {
			echo 'Пароль введен не верно';// пароль не подошел, выведем сообщение
		}
    } else {
        echo 'Такого логина не существует';
        echo '<a href="login.php">Авторизация</a>';
    }

}
?>
<form action="" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit">
</form>



