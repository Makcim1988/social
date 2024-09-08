<?php
session_start();
/*if(isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}*/
?>
<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<p>текст для любого пользователя</p>
        <a href="login.php">Авторизация</a>
        <a href="register.php">Регистрация</a>
        <?php 
            
            if(!empty($_SESSION['auth'])) {
                echo $_SESSION['login'] . ' ';
                echo 'текст для авторизованного пользователя';
                echo '<a href="logout.php">Выйти</a>';
            } else {
                echo 'Вы не авторизованы';
            }
        ?>
    </body>
</html>


