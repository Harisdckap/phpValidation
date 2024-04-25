<?php
session_start();

$servername = "localhost";
$username = "dckap";
$password = "Dckap2023Ecommerce";
$database = "Php Menus";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header('Location:/view/index.php');
    } else {
        echo "Invalid password!";
    }
} else {
     header('Location:/loginprocess/login.php');
}

$conn->close();
?>
