<?php
// Connect to the database
$servername = "localhost";
$user = "root";
$password = "root";
$db = "bibliateka";

// Create connection
$conn = new mysqli($server, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve all books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

// Display books
while ($row = $result->fetch_assoc()) {
    ?>
    <div class="card" style="position: relative;">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
        <h3><?php echo $row['title']; ?></h3>
        <h3><?php echo $row['author']; ?></h3>
        <p class="price"><?php echo $row['price']; ?> </p>
        <button style="position: relative; bottom: 0; left: 0; width: 100%;">
        <a href="filialsSUPER.html">Выбрать</a></button>
    </div>
    <?php
}

// Close connection
$conn->close();
?>
