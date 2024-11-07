<?php
session_start(); // Pastikan session dimulai di awal
include('..//koneksi.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: ../admin/login.php");
    exit();
}

$email = $_SESSION['email'];
$userName = $_SESSION['username'];

$id = "";
$nama = "";
$desc = "";
$jenis = "";
$lokasi = "";
$tanggal = "";
$anggota = "";
$jam = "";
$harga = "";
$sukses = "";
$error = "";
$sukses2 = "";
$error2 = "";
$limit = 10 * 1024 * 1024; // Batasan ukuran file (10MB)

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];

    // Hapus data dari tabel terkait terlebih dahulu
    $sqlDeleteMember = "DELETE FROM venue_aktivitas_member WHERE id_aktivitas = '$id'";
    $qDeleteMember = mysqli_query($conn, $sqlDeleteMember);

    if ($qDeleteMember) {
        // Hapus data dari tabel utama setelah menghapus data dari tabel terkait
        $sqlDeleteAktivitas = "DELETE FROM venue_aktivitas WHERE id_aktivitas = '$id'";
        $qDeleteAktivitas = mysqli_query($conn, $sqlDeleteAktivitas);

        if ($qDeleteAktivitas) {
            $_SESSION['sukses2'] = "Data Berhasil Dihapus";
            // Redirect ke halaman admin_aktivitas.php setelah berhasil menghapus data
            header("Location: ../admin/admin_aktivitas.php");
            exit();
        } else {
            $_SESSION['error2'] = "Gagal menghapus data aktivitas: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error2'] = "Gagal menghapus data member: " . mysqli_error($conn);
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT va.*, v.location AS venue_lokasi
             FROM venue_aktivitas va
             JOIN venues v ON va.id_venue = v.id_venue
             WHERE va.id_aktivitas = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);

    $nama = $r1['nama_aktivitas'];
    $desc = $r1['desc_aktivitas'];
    $jenis = $r1['sport'];
    $tanggal = $r1['date'];
    $anggota = $r1['membership'];
    $jam = $r1['jam_main'];
    $harga = $r1['price'];
    $nama_file = $r1['photo'];

    if ($nama == '') {
        $_SESSION['error'] = "Data tidak ditemukan";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $desc = $_POST['desc_aktivitas'];
    $jenis = $_POST['jenis_olga'];
    $tanggal = $_POST['tanggal'];
    $anggota = $_POST['keanggotaan'];
    $jam = $_POST['jam_main'];
    $harga = $_POST['harga'];
    $email = $_SESSION['email'];

    if (empty($tanggal)) {
        $_SESSION['error'] = "Tanggal main harus diisi";
    } else {
        $fetchVenueIdQuery = "SELECT id_venue, sport FROM venues WHERE email = '$email'";
        $fetchVenueIdResult = mysqli_query($conn, $fetchVenueIdQuery);

        if ($fetchVenueIdResult && mysqli_num_rows($fetchVenueIdResult) > 0) {
            $venueRow = mysqli_fetch_assoc($fetchVenueIdResult);
            $id_venue = $venueRow['id_venue'];
            $sportFromDB = $venueRow['sport'];

            if ($jenis == $sportFromDB) {
                if (ctype_digit($nama)) {
                    $_SESSION['error'] = "Nama aktivitas tidak dapat hanya berisi angka.";
                } elseif (strlen($nama) < 5 || strlen($nama) > 30) {
                    $_SESSION['error'] = "Nama aktivitas harus memiliki panjang antara 5 sampai 30 karakter.";
                } elseif (ctype_punct($nama)) {
                    $_SESSION['error'] = "Nama aktivitas tidak dapat hanya berisi simbol.";
                }

                if (empty($_SESSION['error'])) {
                    if (!empty($_FILES['foto']['name'])) {
                        $nama_file = $_FILES['foto']['name'];
                        $tmp = $_FILES['foto']['tmp_name'];
                        $upload_folder = '../img';

                        // Pindahkan file gambar ke folder tujuan
                        if (move_uploaded_file($tmp, $upload_folder . $nama_file)) {
                            if ($op == 'edit') {
                                $sql1 = "UPDATE venue_aktivitas SET 
                                            nama_aktivitas = '$nama',
                                            desc_aktivitas = '$desc',
                                            sport = '$jenis',
                                            date = '$tanggal',
                                            membership = '$anggota',
                                            jam_main = '$jam',
                                            price = '$harga',
                                            photo = '$nama_file',
                                            id_venue = '$id_venue'
                                         WHERE id_aktivitas = '$id'";
                                $q1 = mysqli_query($conn, $sql1);

                                if ($q1) {
                                    $_SESSION['sukses'] = "Data aktivitas berhasil diupdate";
                                } else {
                                    $_SESSION['error'] = "Data aktivitas gagal diupdate";
                                }
                            } else {
                                $sql1 = "INSERT INTO venue_aktivitas (nama_aktivitas, desc_aktivitas, sport, date, membership, jam_main, price, photo, id_venue, max_member) 
                                          VALUES ('$nama', '$desc', '$jenis', '$tanggal', '$anggota', '$jam', '$harga', '$nama_file', '$id_venue', 999)";
                                $q1 = mysqli_query($conn, $sql1);

                                if ($q1) {
                                    $_SESSION['sukses'] = "Data aktivitas berhasil ditambahkan";
                                } else {
                                    $_SESSION['error'] = "Data aktivitas gagal ditambahkan";
                                }
                            }
                        } else {
                            $_SESSION['error'] = "Harap pilih gambar yang akan diunggah";
                        }
                    } else {
                        $_SESSION['error'] = "Harap pilih gambar yang akan diunggah";
                    }
                }
            } else {
                $_SESSION['error'] = "Jenis olahraga tidak sesuai dengan email.";
            }
        } else {
            $_SESSION['error'] = "Venue tidak ditemukan untuk email ini";
        }
    }
    header("Location: ../admin/admin_aktivitas.php"); // Redirect ke halaman aktivitas setelah form diproses
    exit();
}
