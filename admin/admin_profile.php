<?php
session_start();
include('../koneksi.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari session
$email = $_SESSION['email'];
$userName = $_SESSION['username'];
$userLevel = isset($_SESSION['level']) ? $_SESSION['level'] : 'Level tidak tersedia';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>

<div class="profile-container">
    <h2 class="profile-header">Profil Pengguna</h2>
    <div class="profile-info">
        <p><strong>Nama Pengguna:</strong> <?php echo htmlspecialchars($userName); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Level:</strong> <?php echo htmlspecialchars($userLevel); ?></p>
    </div>
    <div class="text-center mt-4">
        <a href="../Controller/edit_profile.php" class="btn btn-primary">Edit Nama Pengguna</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
