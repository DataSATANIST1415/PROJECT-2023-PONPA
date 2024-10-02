<?php
session_start(); // Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "root", "bibliateka"); // Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
} // Проверка авторизации
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php"); // Перенаправление на страницу авторизации
    exit;
} // Получение данных из формы
$author = $_POST['author'];
$title = $_POST['title'];
$booking_date = $_POST['booking_date'];
$return_date = $_POST['return_date'];
$filial_city = $_POST['filial_id']; // Проверка авторизованного пользователя
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "Ошибка: пользователь не авторизован";
    exit;
} // Проверка данных
if (empty($booking_date) || empty($return_date) || empty($filial_city)) {
    echo "Ошибка: не все поля заполнены";
    exit;
} // Поиск книги по автору и названию
$query = "SELECT * FROM books WHERE author = '$author' AND title = '$title'";
$result = mysqli_query($conn, $query); if (!$result || mysqli_num_rows($result) == 0) {
    echo "Ошибка: книга не найдена";
    exit;
} // Получение данных о книге
$book_data = mysqli_fetch_assoc($result); // Проверка доступности книги
if ($book_data['available'] == 0) {
    echo "Ошибка: книга недоступна";
    exit;
} // Рассчет стоимости бронирования
$price = $book_data['price'];
$days = (strtotime($return_date) - strtotime($booking_date)) / 86400;
$discount = 0;
if ($days >= 90) {
    $discount = 25;
} elseif ($days >= 60) {
    $discount = 20;
} elseif ($days >= 30) {
    $discount = 15;
}
$final_price = $price * $days * (1 - $discount / 100); // Получение id филиала по названию города
$query = "SELECT id FROM filials WHERE city_name = '$filial_city'";
$result = mysqli_query($conn, $query); if (!$result || mysqli_num_rows($result) == 0) {
    echo "Ошибка: филиал не найден";
    exit;
}
$filial_data = mysqli_fetch_assoc($result);
$filial_id = $filial_data['id']; // Добавление бронирования в базу данных
$query = "INSERT INTO bookings (user_id, book_id, booking_date, return_date, filial_id, price) VALUES ('$user_id', '" . $book_data['id'] . "', '$booking_date', '$return_date', '$filial_id', '$final_price')";
$result = mysqli_query($conn, $query); if (!$result) {
    echo "Ошибка добавления бронирования: " . mysqli_error($conn);
} else {
    echo "Бронирование успешно добавлено";
}
// Закрытие соединения
mysqli_close($conn);
?>
