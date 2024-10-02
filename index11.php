<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <div class="logo"></div>

          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon nau-nrs"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="filialsSUPER.html">Филиалы</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bronirSUPER.html">Бронирование</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="lkSUPER.html">Личный кабинет</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="log.html">Авторизация</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="reg.html">Регистрация</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Мы работаем уже 20 лет на рынке бронирования книг, у нас большой опыт, количество положительных отзывов уже перевалило за сотни тысяч. Количество довольных клиентов не даст соврать, мы добропорядочная компания. В нашем ассортименте имеется большое количество книг разных авторов, жанров и цветов. нашими услугами пользуются много людей по России. Мы оказываем услуги всем кто в них нуждается. Книги
                    мы печатаем сами. Если вам нужны услуги бронирования книг, то вы попали на нужный сайт. 
                </div>
            </div>
        </div>
    </div>
    <form action="" method="get">
        <input name="s" placeholder="Искать здесь..." type="search">
        <button type="submit">Поиск</button>
    </form>
    <div class="content">
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="'.$row["image"].'" alt="'.$row["title"].'">';
                echo '<h3>'.$row["title"].'</h3>';
                echo '<h3>'.$row["author"].'</h3>';
                echo '<p class="price">'.$row["price"].' руб/мин</p>';
                echo '<button><a href="filialsSUPER.html">Выбрать</a></button>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
    
    <footer class="footer">
        <ul>
            <li class="foot_list1">
                <h3>Клиентам</h3>
                <a href="indexSUPER.html"><br>Главная</br></a>
                <a href="lkSUPER.html"><br>Личный кабинет</br></a>
                <a href="reg.html"><br>Регистрация</br></a>
                <a href="bronirSUPER.html"><br>Забронировать книгу</br></a>
                <a href="filialsSUPER.html"><br>Филиалы</br></a>
                <div class="nomer">
                    <br>Тел.8-800-555-35-35</br>
                </div>
            </li>
        </ul>
    </footer>
</body>
</html>