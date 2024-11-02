<?php
$server = "localhost"; // Mengganti $_server menjadi $server
$username = "root";
$password = "";
$database = "arenafinder"; // Mengganti $db menjadi $database

// membuat koneksi ke database
$conn = new mysqli($server, $username, $password, $database);

// cek koneksi berhasil atau tidak
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
