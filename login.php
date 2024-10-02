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
    <div class="container bg-body-tertiary" style="margin-top: 280px;">
        <p class="text-center">Вход</p>
        <form action="login1.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Телефон</label>
                <input type="text" class="form-control" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit" name="submit">Войти</button>
            </div>
        </form>
    </div>
</body>
</html>
