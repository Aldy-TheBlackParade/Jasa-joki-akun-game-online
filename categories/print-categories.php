<?php
require '../dompdf/vendor/autoload.php'; // Pastikan path ini sesuai dengan lokasi autoload.php
include '../db.php'; // Menghubungkan ke database

// Ambil data kategori
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Mulai menulis HTML untuk PDF
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { width: 50px; height: auto; }
        .photo-column { width: 15%; }
    </style>
</head>
<body>
    <h1>Daftar Kategori</h1>s
    <table>
        <thead>
            <tr>
                <th class="photo-column">Photo</th>
                <th>Categories</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>';

// Tambahkan data kategori ke dalam tabel
while ($row = $result->fetch_assoc()) {
    $imagePath = '../assets/thumbnail/' . $row['photo'];
    if (file_exists($imagePath)) {
        $html .= '<tr>
                    <td class="photo-column"><img src="' . $imagePath . '" /></td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                  </tr>';
    } else {
        $html .= '<tr>
                    <td class="photo-column">Gambar tidak tersedia</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                  </tr>';
    }
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Buat instance Dompdf
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html); // Memuat HTML ke Dompdf
$dompdf->setPaper('A4', 'landscape'); // Mengatur ukuran kertas dan orientasi
$dompdf->render(); // Merender PDF

// Output PDF ke browser
$dompdf->stream("daftar_kategori.pdf", ["Attachment" => false]); // 'false' untuk membuka di browser, 'true' untuk mendownload
?>