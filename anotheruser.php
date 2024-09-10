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

    $query_from = "SELECT * FROM users WHERE id='$id'";
    $result_from = mysqli_query($link, $query_from) or die(mysqli_error($link));
    $user_from = mysqli_fetch_assoc($result_from);
    $name_from = $user_from['name'];
    $secondname_from = $user_from['secondname'];
?>	
	<section class='another-user-section'>
		<h2 class='another-user-title'><?=$user['name'] . ' ' . $user['secondname']?></h2>
		<p class='another-user-birth'>Дата рождения: <?=$user['day'] . ' ' . $user['month'] . ' ' . $user['year']?></p>
		<a href="logout.php">Выйти</a>
		<a href="profile.php">Назад</a>
        <a href="chat.php?id=<?= $id_to ?>">Написать сообщение пользователю <?= $user['name'] . $user['secondname'] ?> </a>
		<div class='another-user-wall-block'>
			<h3 class=another-user-wall-title>Стена</h3>
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
		$query2 = "INSERT INTO wallmessage (`from_id`, `name_from`, `secondname_from`, `to_id`, `message`) VALUES ('$id', '$name_from', '$secondname_from', '$id_to', '$message')";
        mysqli_query($link, $query2);
		$_POST['wall-message'] = '';
		header('Location: anotheruser.php?id=' . $id_to . '');
		die();
	} else {
		echo 'Отсутсвует текст сообщения';
	}
	
	$query = "SELECT * FROM wallmessage WHERE to_id='$id_to'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    var_dump($data);

    $res = '';
	
	foreach ($data as $elem) {
		/*$res .= '<ul>';
		
		$res .= '<li><a href="anotheruser.php?id=' . $elem['id'] . '">' . $elem['name'] . ' ' . $elem['secondname'] . '</a></li>';
		echo $elem['id'];
		$res .= '</ul>';*/
		
		$res .= '<p>' . $elem['name_from'] . $elem['secondname_from'] . '</p>';
		$res .= '<p>' . $elem['date_message'] . '</p>';
		$res .= '<p>' . $elem['message'] . '</p>';
	}
	
	echo $res;
?>
	
<?php } else {
    echo 'Вы не авторизованы';
} ?>
</body>
</html>