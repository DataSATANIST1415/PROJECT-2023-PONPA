<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'root';
$db_name = 'bibliateka';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $search_query = trim($search_query); // Remove leading and trailing spaces
    $search_query = htmlspecialchars($search_query); // Prevent SQL injection

    // Query to search for books by title or author
    $query = "SELECT * FROM books WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Display search results
        while ($row = $result->fetch_assoc()) {
            echo "<div style='width: 100px; height: 50px;'>";
            echo "<h2>" . $row['title'] . " by " . $row['author'] . "</h2>";
            echo "<p>Price: " . $row['price'] . "</p>";
            echo "<img src='" . $row['image'] . "' alt='Book Cover'>";
            echo "<p>Availability: " . ($row['available'] ? 'Available' : 'Not Available') . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No books found matching your search query.</p>";
    }
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

                        
                            <li class="nav-item">
                                <a class="nav-link" href="bronirSUPER.html">Бронирование</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="lkSUPER.php">Личный кабинет</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Авторизация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registr.php">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Выйти</a>
                            </li>
                            <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                            ?>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Мы работаем уже 20 лет на рынке бронирования книг, у нас большой опыт, количество положительных отзывов уже перевалило за сотни тысяч. Количество довольных клиентов не даст соврать, мы добропорядочная компания. В нашем ассортименте имеется большое количество книг разных авторов, жанров и цветов. нашими услугами пользуются много людей по России. Мы оказываем услуги всем кто в них нуждается. Книги мы печатаем сами. Если вам нужны услуги бронирования книг, то вы попали на нужный сайт.</strong>
                </div>
            </div>
        </div>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <input name="search" placeholder="Искать здесь..." type="search">
    <button type="submit">Поиск</button>
</form>
    <div class="content">
        <p class="tovar"></p>
    </div>
    <section>
        <div class="cards">
            <?php include 'booking.php'; ?>
        </div>
    </section>
    <footer class="footer">
        <ul>
            <li class="foot_list1">
                <h3>Клиентам</h3>
                <a href="index.php"><br>Главная</br></a>
                <a href="lkSUPER.php"><br>Личный кабинет</br></a>
                <a href="registr.php"><br>Регистрация</br></a>
                <a href="bronirSUPER.html"><br>Забронировать книгу</br></a>
                <a href="filialsSUPER.html"><br>Филиалы</br></a>
                <a href="lkSUPER.php"><br>личный кабинет</br></a>
                <a href="logout.php"><br>Выйти</br></a>
                <div class="nomer">
                    <br>Тел.8-800-555-35-35</br>
                </div>
            </li>
        </ul>
    </footer>

</body>
</html>