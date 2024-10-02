<?php
session_start();

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') { $login = null; }
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') { $password = null; }
}

if (empty($login) || empty($password)) {
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);

include("bd.php");

$result = mysqli_query($db, "SELECT * FROM authorised_users WHERE userlogin='$login'");

if ($result) {
    $myrow = mysqli_fetch_array($result);

    if (empty($myrow['userpassword'])) {
        exit("Извините, введённый вами login или пароль неверный 500.");
    } else {
        //print($myrow['userpassword']);
        //print($password);
        if ($myrow['userpassword'] == $password) {
            $_SESSION['userlogin'] = $myrow['userlogin'];
            $_SESSION['employername'] = $myrow['employername'];
            $_SESSION['userrole'] = $myrow['userrole'];
            

            if ($_SESSION['userrole'] == 'admin') {

                header("Location: admin-index.php");
            } elseif ($_SESSION['userrole'] == 'waiter') {

                header("Location: waiter-index.php");
            } elseif ($_SESSION['userrole'] == 'cooker') {

                header("Location: cooker-index.php");
            }
        } else {
            exit("Извините, введённый вами login или пароль неверный 400.");
        }
    }
} else {
    exit("Ошибка при выполнении запроса к базе данных.");
}
?>

