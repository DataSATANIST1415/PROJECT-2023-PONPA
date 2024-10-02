<?php
session_start();

// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "root", "bibliateka");

// Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

// Проверка авторизации
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php"); // Перенаправление на страницу авторизации
    exit;
}

// Получение данных о пользователе
$query = "SELECT * FROM user_data WHERE phone_number = '" . $_SESSION['phone_number'] . "'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    // Отображение данных из базы данных
    echo "Данные пользователя: " . $user_data['first_name'] . " " . $user_data['last_name'] . "<br>";
    echo "Телефон: " . $user_data['phone_number'] . "<br>";
    echo "Дата рождения: " . $user_data['birth_date'] . "<br>";
} else {
    echo "Ошибка: пользователь не найден";
}

// Закрытие соединения
mysqli_close($conn);
?>
