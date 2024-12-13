<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];

    // Jika foto baru tidak diupload, gunakan foto yang lama
    if (empty($photo)) {
        $sql = "UPDATE categories SET name='$name', price='$price' WHERE id=$id";
    } else {
        $target = "../assets/thumbnail/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        $sql = "UPDATE categories SET name='$name', price='$price', photo='$photo' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: categories.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>