<?php
include 'db.php'; // Menghubungkan ke database

session_start(); // Memulai session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari pengguna di database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Memverifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // Menyimpan username di session
            echo "Login successful!";
            // Redirect ke halaman admin atau halaman lain setelah berhasil
            header("Location: admin.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>
