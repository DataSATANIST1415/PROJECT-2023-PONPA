<?php
$login = $username = $password = $role = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST["username"]);
    $password = ($_POST["userpassword"]);
    $role = ($_POST["radio"]);
    $login = ($_POST["userlogin"]);
}

if ($role == "admin") {
    $role = 'admin';
} elseif($role == "waiter") {
    $role = 'waiter';
} else {
    $role = 'cooker';
}
include "bd.php";
mysqli_set_charset($db,'utf8');
$query = $db->prepare("INSERT INTO `authorised_users`(`userlogin`, `employername`, `userpassword`, `userrole`) VALUES ('$login','$username','$password','$role')");
$result = $query->execute();
if ($result) {
    header( "location: /admin-index.php" );
}
?>