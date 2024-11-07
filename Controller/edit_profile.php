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

// Proses update nama pengguna
if (isset($_POST['update'])) {
    $newUserName = $_POST['username'];

    // Update nama pengguna di database
    $sql = "UPDATE users SET username = '$newUserName' WHERE email = '$email'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['username'] = $newUserName; // Update session username
        echo "<script>alert('Nama pengguna berhasil diperbarui!'); window.location.href = '../admin/admin_profile.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui nama pengguna.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nama Pengguna</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .edit-container {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .edit-header {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="edit-container">
    <h2 class="edit-header">Edit Nama Pengguna</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Nama Pengguna Baru:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($userName); ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
            <a href="../admin/admin_profile.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
