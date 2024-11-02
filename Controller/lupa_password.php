<?php
session_start();

function displayAlert($message, $redirect = null) {
    echo "<script>alert('$message');";
    if ($redirect) {
        echo "window.location.href='$redirect';";
    }
    echo "</script>";
}

function isValidPassword($password) {
    $lengthCheck = (strlen($password) >= 8 && strlen($password) <= 12);
    $numberCheck = preg_match('/\d/', $password);
    $uppercaseCheck = preg_match('/[A-Z]/', $password);
    $lowercaseCheck = preg_match('/[a-z]/', $password);
    $specialCharCheck = preg_match('/[\W_]/', $password);

    return $lengthCheck && $numberCheck && $uppercaseCheck && $lowercaseCheck && $specialCharCheck;
}

if (isset($_POST["reset"])) {
    include('../koneksi.php');
    $psw = $_POST["password"];
    $konfirPsw = $_POST["konfir_password"];

    // Periksa apakah email ada di sesi
    if (!isset($_SESSION['email'])) {
        displayAlert("Email belum diset. Silakan kembali dan masukkan email Anda.");
        exit();
    }
    
    $email = $_SESSION['email'];

    if (empty($psw) || empty($konfirPsw)) {
        displayAlert("Password tidak boleh kosong. Silahkan masukkan sandi lagi.", "../admin/gantipassword_form.php");
    } elseif ($psw !== $konfirPsw) {
        displayAlert("Password dan konfirmasi password tidak cocok.", "../admin/gantipassword_form.php");
    } elseif (!isValidPassword($psw)) {
        displayAlert("Password harus memiliki 8 sampai 12 karakter, mengandung angka, huruf besar, huruf kecil, dan karakter khusus.", "../admin/gantipassword_form.php");
    } else {
        // Ambil sandi yang ada dari database
        $existingPasswordQuery = mysqli_query($conn, "SELECT password FROM users WHERE email='$email'");
        if ($existingPasswordQuery && mysqli_num_rows($existingPasswordQuery) > 0) {
            $existingPasswordData = mysqli_fetch_assoc($existingPasswordQuery);
            $existingPassword = $existingPasswordData['password'];

            // Periksa apakah sandi baru sama dengan yang sudah ada
            if (password_verify($psw, $existingPassword)) {
                displayAlert("Password baru harus berbeda dengan password yang sudah ada sebelumnya.", "../admin/gantipassword_form.php");
            } else {
                // Perbarui sandi jika berbeda
                $hash = password_hash($psw, PASSWORD_DEFAULT);
                $updateQuery = mysqli_query($conn, "UPDATE users SET password='$hash' WHERE email='$email'");

                if ($updateQuery) {
                    displayAlert("Selamat, sandi akun anda berhasil diganti", "../admin/login.php");
                } else {
                    displayAlert("Terjadi kesalahan saat mengupdate password. Silakan coba lagi.");
                }
            }
        } else {
            displayAlert("Pengguna tidak ditemukan.");
        }
    }
}
?>
