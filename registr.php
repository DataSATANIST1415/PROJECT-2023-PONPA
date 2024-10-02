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
        <p class="text-center">Регистрация</p>
        <form action="registr1.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Имя</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Отчество</label>
                <input type="text" class="form-control" name="patronymic">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Паспортные данные</label>
                <input type="text" class="form-control" name="passport_data">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
                <input type="text" class="form-control" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Дата рождения</label>
                <input type="date" class="form-control" name="birth_date">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Повтор пароля</label>
                <input type="password" class="form-control" name="repeat_password">
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit" name="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</body>
</html>