<?php 
session_start();
?>
<form action="" method="POST">
    <input type='text' name='login'>
    <input type='password' name='password'>
    <input type='password' name='confirm'>
    <input type='submit'>
</form>

<?php
/*$host = 'MySQL-8.0';
$user = 'root';
$pass = '';
$name = 'social';

$link = mysqli_connect($host, $user, $pass, $name);*/

include 'users_connect.php';
$login = '';
$password = '';

if(!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
	
	
    if ($_POST['password'] == $_POST['confirm']) {
		if (strlen($_POST['login']) >= 4 and strlen($_POST['login']) <= 10 ) {
			if (preg_match('#\b[a-zA-Z0-9]+\b#', $_POST['login']) === 1) {
				$login = $_POST['login'];
			} else {
				echo 'Логин должен состоять из латинских символов';
			}
		} else {
			echo 'Логин должен содержать от 4-х до 10-и символов';
		}
		
		if (strlen($_POST['password']) >= 6 and strlen($_POST['password']) <= 10) {
			if (preg_match('#\b[a-zA-Z0-9]+\b#', $_POST['password']) === 1) {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			} else {
				echo 'Логин должен состоять из латинских символов';
			}
		} else {
			echo 'Пароль должен содержать от 6-и до 10-и символов';
		}
        
        
        //echo "$login";
        //echo "$password";

        $query = "SELECT * FROM users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if(empty($user)) {
            $query = "INSERT INTO users (`login`, `password`) VALUES ('$login', '$password')";
            mysqli_query($link, $query);
    
            $_SESSION['auth'] = true;
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
			header('Location: profile.php');
        } else {
            echo 'Пользователь с таким логином уже существует';
        }
    } else {
        echo 'Пароль не совпадает';
    }
    
}
