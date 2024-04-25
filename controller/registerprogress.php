<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli('localhost', 'dckap', 'Dckap2023Ecommerce', 'Php Menus'); 


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT)); 

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location:/loginprocess/login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location:/registerprogress/register.php");
    exit();
}
?>