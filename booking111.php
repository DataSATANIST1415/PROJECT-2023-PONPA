<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "root", "bibliateka");

// Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php"); // Перенаправление на страницу авторизации
    exit;
}

$phone_number = $_SESSION['phone_number'];

$query = "SELECT * FROM user_data WHERE phone_number = '$phone_number'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    // Отображение бронирований из базы данных
} else {
    echo "Ошибка: пользователь не найден";
}

// Закрытие соединения
mysqli_close($conn);
?>