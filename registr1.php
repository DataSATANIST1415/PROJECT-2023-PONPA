<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "root", "bibliateka");

// Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

// Обработка формы регистрации
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $patronymic = $_POST['patronymic'];
    $passport_data = $_POST['passport_data'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // Проверка пароля
    if ($password != $repeat_password) {
        echo "Пароли не совпадают";
    } else {
        // Вставка данных в таблицу users
        $query = "INSERT INTO users (username, email, password) VALUES ('$first_name', '$last_name', '$password')";
        mysqli_query($conn, $query);

        // Вставка данных в таблицу user_data
        $query = "INSERT INTO user_data (user_id, first_name, last_name, patronymic, passport_data, phone_number, birth_date) VALUES (LAST_INSERT_ID(), '$first_name', '$last_name', '$patronymic', '$passport_data', '$phone_number', '$birth_date')";
        mysqli_query($conn, $query);

        echo "Регистрация успешна";
        header("Location: login.php"); // Перенаправление на страницу авторизации
        exit;
    }
}

// Закрытие соединения
mysqli_close($conn);
?>
