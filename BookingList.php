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

$query = "SELECT * FROM bookings WHERE phone_number = '$phone_number'";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Ошибка выполнения запроса: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result) > 0) {
    while ($booking = mysqli_fetch_assoc($result)) {
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Код бронирования:</label>
            <label for="exampleInputEmail1" class="form-label"><?= $booking['booking_code'] ?></label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Идентификатор книги:</label>
            <label for="exampleInputEmail1" class="form-label"><?= $booking['book_id'] ?></label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название Книги:</label>
            <label for="exampleInputEmail1" class="form-label"><?= $booking['book_title'] ?></label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Дата бронирования:</label>
            <label for="exampleInputEmail1" class="form-label"><?= $booking['booking_date'] ?></label>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Выбранный филиал:</label>
            <label for="exampleInputEmail1" class="form-label"><?= $booking['branch'] ?></label>
        </div>
        <?php
    }
} else {
    echo "У вас нет бронирований";
}

// Закрытие соединения
mysqli_close($conn);
?>