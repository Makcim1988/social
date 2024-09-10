<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<main class="main-section">
    <div class="main-logo">
        <h1 class="main-title">
            ЧАТИК
        </h1>
        <p class="main-text">
            ЧАТИК помогает вам всегда оставаться на связи и общаться со своими знакомыми.
        </p>
    </div>
    <div class="main-menu">
        <button class="login-button"><a href="login.php">Войти</a></button>
        <button class="register-button"><a href="register.php">Зарегистрироваться</a></button>
        <?php
		echo $_SESSION['id'];
        if (!empty($_SESSION['auth'])) { ?>
            <section class="auth-section">
                <?php $id = $_SESSION['id']; echo '<p class="profile-name">' . $_SESSION['login']; ?>
                <button class="profile-button"><a href="profile.php">Профиль</a></button>
                <button class="logout-button"><a href="logout.php">Выйти</a></button>
            </section>
        <?php } else { ?>
            <section class="auth-section">
                <p class="not-auth">Вы не авторизованы</p>
            </section>
        <?php } ?>
    </div>
</main>
</body>
</html>


