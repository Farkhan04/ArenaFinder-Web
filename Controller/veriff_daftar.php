<?php
session_start();
include('../koneksi.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Menggunakan autoload Composer

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    if (empty($username) || empty($email) || empty($password)) {
        $message = "Harap isi semua kolom pada formulir pendaftaran.";
    } else {
        $check_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $rowCount = mysqli_num_rows($check_query);

        // Cek jika pengguna dengan email sudah terdaftar
        if ($rowCount > 0) {
            $message = "Pengguna dengan email ini sudah terdaftar!";
        } elseif (usernameExists($conn, $username)) {
            $message = "Nama pengguna sudah terdaftar. Mohon pilih nama pengguna lain.";
        } elseif (!isValidPassword($password)) {
            $message = "Password harus memiliki 8 sampai 12 karakter, mengandung angka, huruf besar, huruf kecil, dan karakter khusus.";
        } else {
            // Jika semua validasi berhasil
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $result = mysqli_query($conn, "INSERT INTO users (username, email, password, is_verified, level) VALUES ('$username', '$email', '$password_hash', 0, '$level')");

            if ($result) {
                $otp = rand(100000, 999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['otp_expiration'] = time() + (5 * 60); 
                $_SESSION['mail'] = $email;

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';

                    $mail->Username = 'tengkufarkhan3@gmail.com';
                    $mail->Password = 'bynv cdfj izrp wiho';

                    $mail->setFrom('hanntok2802@gmail.com', 'ArenaFinder');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = "Kode verifikasi akun anda";
                    $mail->Body = "<p>Kepada pengguna,</p> <h3>Kode OTP anda adalah $otp <br></h3>
                    <br><br>
                    <p>Untuk pertanyaan lebih lanjut, hubungi kami di:</p>
                    <b>arenafinder.app@gmail.com</b>";

                    $mail->send();
                    echo "<script>
                        alert('Daftar akun sukses, kode OTP dikirim ke $email');
                        window.location.replace('../admin/veriff_daftar.php');
                    </script>";
                } catch (Exception $e) {
                    echo "<script>alert('Daftar akun gagal, email tidak valid');</script>";
                }
            }
        }
    }
}

// Menampilkan pesan dan mengarahkan ke halaman pendaftaran jika sudah terdaftar
if (isset($message)) {
    echo "<script>alert('$message'); window.location.replace('../admin/daftar.php');</script>";
    exit();
}

function usernameExists($conn, $username) {
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    return mysqli_num_rows($result) > 0;
}

function isValidPassword($password) {
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,12}$/";
    return preg_match($pattern, $password);
}
?>
