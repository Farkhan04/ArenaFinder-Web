<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST["recover"])) { // Menggunakan 'recover' sebagai nama tombol
    include('../koneksi.php');
    $email = $_POST["email"];

    if (empty($email)) {
        echo "<script>alert('Mohon isi kolom email untuk mengirim kode OTP.');</script>";
        exit();
    }

    // Mengecek apakah email terdaftar
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($sql) <= 0) {
        echo "<script>alert('Maaf, email belum terdaftar.'); window.location.replace('../admin/daftar.php');</script>";
        exit();
    }

    $user = mysqli_fetch_assoc($sql);
    if ($user["is_verified"] == 0) {
        echo "<script>alert('Maaf, akun Anda belum terverifikasi. Silakan verifikasi akun Anda terlebih dahulu.'); window.location.replace('../admin/daftar.php');</script>";
        exit();
    }

    // Menghasilkan kode OTP
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expiration'] = time() + (5 * 60);
    $_SESSION['email'] = $email; 

    // Mengirim email menggunakan PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'tengkufarkhan3@gmail.com';
        $mail->Password = 'bynv cdfj izrp wiho';
        $mail->setFrom('arenafinder.app@gmail.com', 'OTP Verification');
        $mail->addAddress($email);

        // Body email
        $mail->isHTML(true);
        $mail->Subject = "Kode OTP untuk verifikasi";
        $mail->Body = "<p>Kode OTP Anda adalah: <strong>$otp</strong></p>
                       <p>Silakan masukkan kode ini untuk melanjutkan.</p>";

        // Mengirim email
        $mail->send();
        header("Location: ../admin/OTP_Password.php");
        exit();
    } catch (Exception $e) {
        echo "<script>alert('Email gagal dikirim: {$mail->ErrorInfo}');</script>";
    }
}
