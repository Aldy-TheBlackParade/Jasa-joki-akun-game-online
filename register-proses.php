<?php
include 'db.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Menyimpan data ke database
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // Redirect ke halaman login setelah berhasil
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
