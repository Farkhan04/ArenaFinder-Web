<?php
session_start();
include('../koneksi.php');

if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp']; // Kode OTP yang disimpan dalam sesi
    $otpExpiration = $_SESSION['otp_expiration']; // Waktu kadaluwarsa OTP yang disimpan dalam sesi
    $email = $_SESSION['mail']; // Email pengguna yang disimpan dalam sesi
    $otp_code = $_POST['otp_code']; // Kode OTP yang dimasukkan oleh pengguna

    // Cek apakah OTP sudah kadaluwarsa
    if (time() > $otpExpiration) {
        // Hapus data pengguna dari database
        $deleteQuery = "DELETE FROM users WHERE email = '$email'";
        mysqli_query($conn, $deleteQuery);

        $verificationMessage = "Maaf, kode OTP sudah kadaluwarsa. Silakan daftar kembali.";
        echo <<<EOL
        <html>
        <head>
            <style>
                .custom-alert {
                    padding: 15px;
                    background-color: #f44336;
                    color: white;
                    border-radius: 5px;
                    margin-bottom: 15px;
                }
                .alert-container {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="alert-container">
                <div class="custom-alert">
                    $verificationMessage
                </div>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = '../admin/daftar.php';
                }, 3000);
            </script>
        </body>
        </html>
EOL;
    } elseif ($otp != $otp_code) {
        // Jika OTP salah, tampilkan pesan tanpa mengalihkan halaman
        $verificationMessage = "Kode OTP tidak valid. Silakan coba lagi.";
        echo <<<EOL
        <html>
        <head>
            <style>
                .custom-alert {
                    padding: 15px;
                    background-color: #f44336;
                    color: white;
                    border-radius: 5px;
                    margin-bottom: 15px;
                }
                .alert-container {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="alert-container">
                <div class="custom-alert">
                    $verificationMessage
                </div>
            </div>
        </body>
        </html>
EOL;
    } else {
        // Jika OTP benar, update status verifikasi pengguna
        $query = "UPDATE users SET is_verified = 1 WHERE email = '$email'";
        if (mysqli_query($conn, $query)) {
            $verificationMessage = "Verifikasi akun sukses. Silahkan login sekarang!";
            echo "<script>alert('$verificationMessage'); window.location.href = 'login.php';</script>";
        } else {
            $verificationMessage = "Terjadi kesalahan saat memperbarui status verifikasi.";
            echo "<script>alert('$verificationMessage'); window.location.href = '../admin/daftar.php';</script>";
        }
    }
}
?>