<?php
session_start();

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
    $id = $_SESSION['id'];
    $login = $_SESSION['login'];
    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);

    echo $user['name'] . '<br>';
    echo $user['secondname'] . '<br>';
    echo $user['day'] . '.' . $user['month'] . '.' . $user['year'];

    echo '<a href="logout.php">Выйти</a>';
} else {
    echo 'Вы не авторизованы';
}
?>
</body>
</html>