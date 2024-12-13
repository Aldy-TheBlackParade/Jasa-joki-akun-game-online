<?php
include '../db.php'; // Menghubungkan ke database

$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: categories.php");
} else {
    echo "Error: " . $conn->error;
}
?>