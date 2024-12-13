<?php
include '../db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];
    $target = "../assets/thumbnail/" . basename($photo);

    // Menyimpan data ke database
    $sql = "INSERT INTO categories (name, price, photo) VALUES ('$name', '$price', '$photo')";
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        header("Location: categories.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $photo = $_FILES['photo']['name'];

    // Validasi input
    if (empty($name) || empty($price) || empty($photo)) {
        echo "Semua field harus diisi!";
        exit;
    }

    if (!is_numeric($price) || $price < 0) {
        echo "Harga harus berupa angka positif!";
        exit;
    }

    // Menyimpan data ke database
    $sql = "INSERT INTO categories (name, price, photo) VALUES ('$name', '$price', '$photo')";
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        header("Location: categories.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>