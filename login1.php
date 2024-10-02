<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "root", "bibliateka");

// Проверка соединения
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

// Обработка формы входа
if (isset($_POST['submit'])) {
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Проверка данных
    $query = "SELECT * FROM user_data WHERE phone_number = '$phone_number'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Ошибка выполнения запроса: " . mysqli_error($conn);
    } elseif (mysqli_num_rows($result) > 0) {
        $query = "SELECT * FROM users WHERE password = '$password'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Ошибка выполнения запроса: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result); // Получение данных из результата запроса
            // Авторизация успешна
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['phone_number'] = $phone_number;
            $_SESSION['user_id'] = $user_data['id']; // Хранение ID пользователя
            header("Location: lkSUPER.php"); // Перенаправление в личный кабинет
            exit;
        } else {
            echo "Неверный логин или пароль";
        }
    } else {
        echo "Неверный логин или пароль";
    }
}

// Закрытие соединения
mysqli_close($conn);
?>
