<?php
// Получение данных из формы
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Подключение к базе данных
$servername = "local";
$username_db = "user";
$password_db = "";
$dbname = "database";
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Проверка соединения
if ($conn->connect_error) {
die("Ошибка соединения: " . $conn->connect_error);
}

// Вставка данных в таблицу пользователей
$sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
echo "Пользователь зарегистрирован успешно!";
} else {
echo "Ошибка при регистрации пользователя: " . $conn->error;
}

$sql = "SELECT * FROM user WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "Пользователь уже зарегистрирован!";
} else {
echo "Пользователь не найден.";
}
// Закрытие соединения
$conn->close();
?>