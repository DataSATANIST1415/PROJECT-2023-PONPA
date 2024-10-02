<?php

session_start();

$conn = mysqli_connect("localhost", "root", "root", "bibliateka");


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
    } else {
        echo "Ошибка: пользователь не найден";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/css1/CSSER.css" rel="stylesheet">
    </head>
    <body>
            <div class="container bg-body-tertiary" style="margin-top: 50px;">
                <p class="text-center">Персональные данные</p>
                <form class="text-center">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Фамилия:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['first_name'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Имя:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['last_name'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Отчество:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['patronymic'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Паспортные данные:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['passport_data'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Номер телефона:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['phone_number'] ?></label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Дата рождения:</label>
                        <label for="exampleInputEmail1" class="form-label"><?= $user_data['birth_date'] ?></label>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-success"><a href="bcards.html">Ваши карты</a></button>

                        <div class="container bg-body-tertiary" style="margin-top: 50px;">
        <p class="text-center">Бронирования</p>
        <?php include 'booking111.php'; ?>

        <div class="container bg-body-tertiary" style="margin-top: 50px;">
        <p class="text-center">Бронирования2</p>
        <?php include 'bookinglist.php'; ?>
    </div>
    </div>

                        </div>
                    <div class="d-flex">
                        <button class="btn btn-success"><a href="logout.php">выйти из сессии</a></button>
                    </div>


                    <div class="d-flex">
                        <button class="btn btn-success"><a href="index.php">на главную</a></button>
                    </div>
                </form>
            </div>
            <!-- Остальной контент -->
    </body>
    </html>
