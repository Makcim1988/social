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
<?php 
include 'users_connect.php';

if (!empty($_SESSION['auth'])) {
	$id = (int) $_SESSION['id']; // id отправителя
	$id_to = (int) $_GET['id']; //id получателя
	
    $query = "SELECT * FROM users WHERE id='$id_to'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
?>	
	<section class='another-user-section'>
		<h2 class='another-user-title'>Чат с пользователем <?=$user['name'] . ' ' . $user['secondname']?></h2>
		<p class='another-user-birth'>Дата рождения: <?=$user['day'] . ' ' . $user['month'] . ' ' . $user['year']?></p>
		<a href="logout.php">Выйти</a>
		<a href="profile.php">Назад</a>
		<div class='another-user-chat-block'>
			<h3 class=another-user-chat-title>Чат</h3>
			<form action='' method='POST'>
				<textarea name='chat-message'></textarea>
				<input type='submit'>
			</form>
		</div>
	</section>

<?php 
	/*$query = "SELECT * FROM wallmessage WHERE id='$id_to'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));*/
	if (!empty($_POST['chat-message'])) {
		$message = $_POST['chat-message'];
		$query2 = "INSERT INTO chat (`from_id`, `to_id`, `message_from, `message_to``) VALUES ('$id', '$id_to', '$message')";
        mysqli_query($link, $query2);
		$_POST['wall-message'] = '';
		header('Location: anotheruser.php?id=' . $id_to . '');
		die();
	} else {
		echo 'Отсутсвует текст сообщения';
	}
	
	$query = "SELECT * FROM wallmessage WHERE to_id='$id_to'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
	
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
	
	$res = '';
	
	foreach ($data as $elem) {
		/*$res .= '<ul>';
		
		$res .= '<li><a href="anotheruser.php?id=' . $elem['id'] . '">' . $elem['name'] . ' ' . $elem['secondname'] . '</a></li>';
		echo $elem['id'];
		$res .= '</ul>';*/
		
		$res .= '<p>' . $elem['from_id'] . '</p>';
		$res .= '<p>' . $elem['date_message'] . '</p>';
		$res .= '<p>' . $elem['message'] . '</p>';
	}
	
	echo $res;
?>
	
<?php } else {
    echo 'Вы не авторизованы';
} ?>
</body>
</head>