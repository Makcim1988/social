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
/*$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'social';

$link = mysqli_connect($host, $user, $pass, $name);*/

require_once 'users_connect.php';

if(!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    if ($_POST['password'] == $_POST['confirm']) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        echo "$login";
        echo "$password";

        $query = "SELECT * FROM users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if(empty($user)) {
            $query = "INSERT INTO users (`login`, `password`) VALUES ('$login', '$password')";
            mysqli_query($link, $query);
    
            $_SESSION['auth'] = true;
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
        } else {
            echo 'Пользователь с таким логином уже существует';
        }
    } else {
        echo 'Пароль не совпадает';
    }
    
}
