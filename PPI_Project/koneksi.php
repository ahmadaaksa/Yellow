<?php
// Konfigurasi koneksi database
$servername = "localhost"; // Biasanya localhost
$username = "root";        // Username default XAMPP
$password = "";            // Password default XAMPP (biasanya kosong)
$dbname = "contoh_db";     // Nama database yang telah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil!";
?>

