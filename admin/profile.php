<?php
include('../koneksi.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari session
$email = $_SESSION['email'];
$userName = $_SESSION['username'];
$level = $_SESSION['level'];
$venueName = isset($_SESSION['nama_venue']) ? $_SESSION['nama_venue'] : 'N/A';
$sport = isset($_SESSION['sport']) ? $_SESSION['sport'] : 'N/A';
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }
    .profile-container {
        max-width: 600px;
        margin: auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .profile-header {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    .profile-info {
        font-size: 16px;
        color: #555;
    }
    .profile-info p {
        margin: 10px 0;
    }
</style>

<div class="container-fluid">
    <div class="profile-container">
        <h2 class="profile-header">Profil Pengguna</h2>
        <div class="profile-info">
            <p><strong>Nama Pengguna:</strong> <?php echo htmlspecialchars($userName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Level:</strong> <?php echo htmlspecialchars($level); ?></p>
            <p><strong>Nama Venue:</strong> <?php echo htmlspecialchars($venueName); ?></p>
            <p><strong>Jenis Olahraga:</strong> <?php echo htmlspecialchars($sport); ?></p>
        </div>
        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
