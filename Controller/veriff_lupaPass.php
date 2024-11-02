<?php
session_start();
include('../koneksi.php');

$response = array();

if (isset($_POST["otp_code"])) {
    $otp = $_SESSION['otp'];
    $otpExpiration = $_SESSION['otp_expiration'];
    $otp_code = $_POST['otp_code'];

    if (time() > $otpExpiration) {
        $response['success'] = false;
        $response['message'] = "<div class='alert alert-danger'>Maaf, kode OTP sudah kadaluwarsa. Silakan isi Email kembali.</div>";
    } elseif ($otp != $otp_code) {
        $response['success'] = false;
        $response['message'] = "<div class='alert alert-danger'>Kode OTP tidak valid. Silakan coba lagi.</div>";
    } else {
        $response['success'] = true; // Verifikasi berhasil
    }
}

// Mengembalikan respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
