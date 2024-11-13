<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../koneksi.php');

// Ensure no output before this point
if (!isset($_SESSION['email'])) {
    header("Location: ../admin/login.php");
    exit();
}


// Ambil level pengguna berdasarkan email yang terkait dengan sesi
$email = $_SESSION['email']; // Pastikan sesi telah dimulai
$sqlGetLevel = "SELECT level FROM users WHERE email = ?";
$stmtGetLevel = $conn->prepare($sqlGetLevel);
$stmtGetLevel->bind_param("s", $email);
$stmtGetLevel->execute();
$resultLevel = $stmtGetLevel->get_result();
$rowLevel = $resultLevel->fetch_assoc();
$level = $rowLevel['level'];
$stmtGetLevel->close();
$email = $_SESSION['email'];

$userName = $_SESSION['username'];

$id = $nama = $alamat = $no_telp = $hari = $waktu = $durasi = $harga = $status = $sukses = $error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sqlDelete = "DELETE FROM venue_membership WHERE id_membership = '$id'";
    $resultDelete = mysqli_query($conn, $sqlDelete);

    if ($resultDelete) {
        $sukses = "Data Berhasil Dihapus";
        header("Location: ../admin/admin_keanggotaan.php"); // Redirect setelah berhasil menghapus
        exit();
    } else {
        $error = "Data Gagal Terhapus";
    }
}


if ($op == 'edit') {
    $id = $_GET['id'];
    $sqlFetch = "SELECT * FROM venue_membership WHERE id_membership = '$id'";
    $resultFetch = mysqli_query($conn, $sqlFetch);
    $row = mysqli_fetch_array($resultFetch);

    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $no_telp = $row['no_telp'];
    $hari = explode(",", $row['hari_main']);
    $waktu = $row['waktu_main'];
    $durasi = $row['durasi_main'];
    $harga = $row['harga'];
    $status = $row['status'];

    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}

if (!function_exists('generateAutoId')) {
    function generateAutoId($conn)
    {
        $getLastIdQuery = "SELECT MAX(id_membership) AS max_id FROM venue_membership";
        $result = mysqli_query($conn, $getLastIdQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $lastIdRow = mysqli_fetch_assoc($result);
            $lastId = $lastIdRow['max_id'];
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }

        return $newId;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $hari = implode(",", $_POST['hari_main']);
    $waktu = $_POST['waktu_main'];
    $durasi = $_POST['durasi_main'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $email = $_SESSION['email'];
    $fetchVenueIdQuery = "SELECT id_venue, email FROM venues WHERE email = '$email'";
    $fetchVenueIdResult = mysqli_query($conn, $fetchVenueIdQuery);

    if ($fetchVenueIdResult && mysqli_num_rows($fetchVenueIdResult) > 0) {
        $venueRow = mysqli_fetch_assoc($fetchVenueIdResult);
        $id_venue = $venueRow['id_venue'];
        $email = $venueRow['email'];

        if (ctype_digit($nama) || strlen($nama) < 5 || strlen($nama) > 30 || ctype_punct($nama)) {
            $error = "Terdapat kesalahan pada kolom nama.";
        }

        if (ctype_digit($alamat) || strlen($alamat) < 10 || strlen($alamat) > 100 || ctype_punct($alamat)) {
            $error = "Terdapat kesalahan pada kolom alamat.";
        }

        if (empty($error)) {
            if ($op == 'edit') {
                $sqlUpdate = "UPDATE venue_membership SET nama = '$nama', alamat = '$alamat', no_telp = '$no_telp', hari_main = '$hari', waktu_main = '$waktu', durasi_main = '$durasi', harga = '$harga', status = '$status' WHERE id_membership = '$id'";
                $resultUpdate = mysqli_query($conn, $sqlUpdate);

                if ($resultUpdate) {
                    $sukses = "Data member berhasil diupdate";
                } else {
                    $error = "Data member gagal diupdate: " . mysqli_error($conn);
                }
            } else {
                $id_membership = generateAutoId($conn);

                $sqlInsert = "INSERT INTO venue_membership (id_membership, nama, alamat, no_telp, hari_main, waktu_main, durasi_main, harga, status, id_venue, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sqlInsert);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sssssssssss", $id_membership, $nama, $alamat, $no_telp, $hari, $waktu, $durasi, $harga, $status, $id_venue, $email);
                    $resultInsert = mysqli_stmt_execute($stmt);

                    if ($resultInsert) {
                        $sukses = "Data member berhasil ditambahkan";
                        header("Location: ../admin/admin_keanggotaan.php");
                    } else {
                        $error = "Data member gagal ditambahkan: " . mysqli_error($conn);
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    $error = "Prepared statement failed";
                }
            }
        } else {
            $error = "Terdapat kesalahan validasi pada kolom nama atau alamat.";
        }
    } else {
        $error = "Venue tidak ditemukan untuk email ini";
    }
}
