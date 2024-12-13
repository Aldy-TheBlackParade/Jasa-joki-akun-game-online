<?php
$servername = "localhost"; // atau alamat server database Anda
$username = "root"; // username database Anda
$password = ""; // password database Anda
$dbname = "db_soccer"; // nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
