<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "kelompok";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua soal
$sql = "SELECT * FROM banksoal";
$result = $conn->query($sql);

// Jika hasil query tidak kosong, kirim data soal sebagai JSON
if ($result->num_rows > 0) {
    $soal = array();
    while ($row = $result->fetch_assoc()) {
        $soal[] = $row;
    }
    echo json_encode($soal);
} else {
    echo "0 results";
}
$conn->close();
?>
