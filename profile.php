<?php
session_start();
ob_start();
echo $_GET['id'];
echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
<section class="profile-section">
    <h2 class="profile-title">Профиль пользователя</h2>
    <p>текст для любого пользователя</p>
    <a href="login.php">Авторизация</a>
    <a href="register.php">Регистрация</a>
</section>

<?php
include 'users_connect.php';
if (!empty($_SESSION['auth'])) {
	$id = (int) $_SESSION['id']; // id отправителя
	$id_to = (int) $_SESSION['id']; //(int) $_GET['id']; // id получателя
    //$id = $_SESSION['id'];
    $login = $_SESSION['login'];
    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
?>
	<section class='user-section'>
		<h2 class='user-title'><?=$user['name'] . ' ' . $user['secondname']?></h2>
		<p class='user-birth'>Дата рождения: <?=$user['day'] . ' ' . $user['month'] . ' ' . $user['year']?></p>
		<a href="logout.php">Выйти</a>
		<a href="profile.php">Назад</a>
		<div class='user-wall-block'>
			<h3 class=user-wall-title>Стена</h3>
			<form action='' method='POST'>
				<textarea name='wall-message'></textarea>
				<input type='submit'>
			</form>
		</div>
	</section>
<?php	
	/*$query = "SELECT * FROM wallmessage WHERE id='$id_to'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));*/
	if (!empty($_POST['wall-message'])) {
		$message = $_POST['wall-message'];
		$query = "INSERT INTO wallmessage (`from_id`, `to_id`, `message`) VALUES ('$id', '$id_to', '$message')";
        mysqli_query($link, $query);
		$_POST['wall-message'] = '';
		header('Location: profile.php');
		die();
	} else {
		echo 'Напишите сообщение';
	}
	
	$_POST['wall-message'] = '';
	
	$query = "SELECT * FROM wallmessage WHERE to_id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user2 = mysqli_fetch_assoc($result);
	
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	
	$res = '';
	
	echo $id;
	//var_dump($data);
	foreach ($data as $elem) {
		
		$res .= '<p>' . $user['name'] . ' ' . $user['secondname'] . '</p>';
		$res .= '<p>' . $elem['date_message'] . '</p>';
		$res .= '<p>' . $elem['message'] . '</p>';
	}
	
	echo $res;

	$query2 = "SELECT * FROM users WHERE login!='$login'";
    $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
	for ($data2 = []; $row = mysqli_fetch_assoc($result2); $data2[] = $row);
	
	$res2 = '';
	
	foreach ($data2 as $elem) {
		$res2 .= '<ul>';
		
		$res2 .= '<li><a href="anotheruser.php?id=' . $elem['id'] . '">' . $elem['name'] . ' ' . $elem['secondname'] . '</a></li>';
		//echo $elem['id'];
		$res2 .= '</ul>';
	}

	echo $res2;
	//die();
} else {
    echo 'Вы не авторизованы';
}
?>
</body>
</html>