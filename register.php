<?php
session_start();
?>
    <form action="" method="POST">
        <input type='text' name='login' placeholder="Логин">
        <input type='password' name='password' placeholder="Пароль">
        <input type='password' name='confirm' placeholder="Повторите пароль">
        <input type='text' name='name' placeholder="Имя">
        <input type='text' name='secondname' placeholder="Фамилия">
        <input type='email' name='email' placeholder="email">
        <div class="birthday-block">
            <p class="birthday-block-text">Дата рождения</p>
            <select name="day" name="day">
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo "<option value=' . $i . '>$i</option>";
                }
                ?>
            </select>
            <select name="month" name="month">
                <?php
                $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                foreach ($months as $month) {
                    echo "<option value=' . $month . '>$month</option>";
                }
                ?>
            </select>
            <select name="year" name="year">
                <?php
                for ($i = 1900; $i <= 2024; $i++) {
                    echo "<option value=' . $i . '>$i</option>";
                }
                ?>
            </select>
        </div>
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
$name = '';
$secondname = '';
$email = '';
$day = '';
$month = '';
$year = '';

if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm']) and !empty($_POST['name']) and !empty($_POST['secondname']) and !empty($_POST['email']) and !empty($_POST['day']) and !empty($_POST['month']) and !empty($_POST['year'])) {


    if ($_POST['password'] == $_POST['confirm']) {
        if (strlen($_POST['login']) >= 4 and strlen($_POST['login']) <= 10) {
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

        if (strlen($_POST['name']) != '' and strlen($_POST['password']) <= 32) {
            $name = $_POST['name'];
        } else {
            echo 'Фамилия должна быть от 1 до 32 символов';
        }

        if (strlen($_POST['secondname']) != '' and strlen($_POST['secondname']) <= 32) {
            $secondname = $_POST['secondname'];
        } else {
            echo 'Имя должно быть от 1 до 32 символов';
        }

        if (strlen($_POST['email']) != '' and preg_match("/[0-9a-z]+@[a-z]/", $_POST['email']) === 1) {
            $email = $_POST['email'];
        } else {
            echo 'email введен не верно!';
        }

        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        //echo "$login";
        //echo "$password";

        $query = "SELECT * FROM users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        if (empty($user)) {
            $query = "INSERT INTO users (`login`, `password`, `name`, `secondname`, `email`, `day`, `month`, `year`) VALUES ('$login', '$password', '$name', '$secondname', '$email', '$day', '$month', '$year')";
            mysqli_query($link, $query);

            $_SESSION['auth'] = true;
            $_SESSION['login'] = $login;
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
