<?php
session_start();
include('../koneksi.php');

// Redirect jika tidak ada sesi email (belum login)
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Deklarasi variabel
$email = $_SESSION['email'];
$userName = $_SESSION['username'];
$anggota = "";
$jenis_lap = "";
$tgl = "";
$waktu_mulai = "";
$waktu_selesai = "";
$harga = "";
$status = "";
$sukses = "";
$error = "";
$sukses2 = "";
$error2 = "";

// Cek koneksi database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil parameter op dari URL
$op = isset($_GET['op']) ? $_GET['op'] : "";

// Hapus data jika ada parameter 'delete'
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM venue_price WHERE id_price = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    $sukses2 = $q1 ? "Data Berhasil Dihapus" : "Data Gagal Terhapus: " . mysqli_error($conn);
}

// Edit data jika ada parameter 'edit'
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT vp.*, v.sport FROM venue_price vp JOIN venues v ON vp.id_venue = v.id_venue WHERE vp.id_price = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $anggota = $r1['membership'];
        $jenis_lap = $r1['sport'];
        $tgl = $r1['date'];
        $waktu_mulai = $r1['start_hour'];
        $waktu_selesai = $r1['end_hour'];
        $harga = $r1['price'];
        $status = $r1['status_pemesanan'];
    } else {
        $error = "Error querying database: " . mysqli_error($conn);
    }
}

// Proses penyimpanan data jadwal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anggota = $_POST['keanggotaan'];
    $jenis_lap = $_POST['jenis_lap'];
    $tgl = $_POST['tanggal'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];

    if (empty($tgl)) {
        $error = "Tanggal main harus diisi";
    } else {
        // Ambil ID venue
        $fetchVenueIdQuery = "SELECT v.id_venue, vl.id_lapangan FROM venues v JOIN venue_lapangan vl ON v.id_venue = vl.id_venue WHERE v.email = '$email' AND v.sport = '$jenis_lap'";
        $fetchVenueIdResult = mysqli_query($conn, $fetchVenueIdQuery);

        if ($fetchVenueIdResult && mysqli_num_rows($fetchVenueIdResult) > 0) {
            $venueRow = mysqli_fetch_assoc($fetchVenueIdResult);
            $id_venue = $venueRow['id_venue'];
            $id_lapangan = $venueRow['id_lapangan'];

            
            // Ambil harga dari database
            $fetchPriceQuery = "SELECT price FROM venue_price WHERE id_venue = '$id_venue' AND date = '$tgl' AND membership = '$anggota' LIMIT 1";
            $fetchPriceResult = mysqli_query($conn, $fetchPriceQuery);
            if ($fetchPriceResult && mysqli_num_rows($fetchPriceResult) > 0) {
                $priceRow = mysqli_fetch_assoc($fetchPriceResult);
                $harga = $priceRow['price'];
            } else {
                $error = "Harga tidak ditemukan untuk tanggal dan jenis lapangan ini.";
            }


            if ($waktu_mulai && $waktu_selesai) {
                $startHour = (int) explode(":", $waktu_mulai)[0];
                $endHour = (int) explode(":", $waktu_selesai)[0];

                // Validasi waktu istirahat
                if ($startHour >= 16 && $startHour < 17) {
                    $error = "Durasi waktu istirahat";
                } else {
                    // Cek apakah ada jadwal bentrok
                    $checkScheduleQuery = "SELECT COUNT(*) AS count_schedule FROM venue_price WHERE id_venue = '$id_venue' AND date = '$tgl' AND ((start_hour <= '$waktu_mulai' AND end_hour >= '$waktu_mulai') OR (start_hour <= '$waktu_selesai' AND end_hour >= '$waktu_selesai') OR (start_hour >= '$waktu_mulai' AND end_hour <= '$waktu_selesai')) AND membership = '$anggota'";
                    $checkScheduleResult = $conn->query($checkScheduleQuery);

                    if ($checkScheduleResult) {
                        $row = $checkScheduleResult->fetch_assoc();
                        $countSchedule = $row['count_schedule'];

                        if ($countSchedule > 0) {
                            $error = "Jadwal dengan tanggal, waktu, dan keanggotaan yang sama sudah ada.";
                        } else {
                            // Insert atau update jadwal
                            if ($op == 'edit') {
                                $sql1 = "UPDATE venue_price SET id_venue = '$id_venue', id_lapangan = '$id_lapangan', membership = '$anggota', date = '$tgl', start_hour = '$waktu_mulai', end_hour = '$waktu_selesai', price = '$harga' WHERE id_price = '$id'";
                                $q1 = mysqli_query($conn, $sql1);
                                $sukses = $q1 ? "Data jadwal berhasil diupdate" : "Data jadwal gagal diupdate: " . mysqli_error($conn);
                            } else {
                                $sql1 = "INSERT INTO venue_price (id_venue, id_lapangan, membership, date, start_hour, end_hour, price) VALUES ('$id_venue', '$id_lapangan', '$anggota', '$tgl', '$waktu_mulai', '$waktu_selesai', '$harga')";
                                $q1 = mysqli_query($conn, $sql1);
                                $sukses = $q1 ? "Data jadwal berhasil ditambahkan" : "Data jadwal gagal ditambahkan: " . mysqli_error($conn);
                            }
                        }
                    } else {
                        $error = "Gagal melakukan pengecekan jadwal: " . mysqli_error($conn);
                    }
                }
            } else {
                $error = "Input waktu mulai dan waktu selesai harus diisi";
            }
        } else {
            $error = "Tempat atau jenis olahraga tidak sesuai untuk email ini";
        }
    }
}

// Refresh halaman dengan pesan berhasil atau gagal
if ($error || $sukses || $error2 || $sukses2) {
    $refreshUrl = "../admin/admin_jadwallapangan.php";
    if ($error2 || $sukses2) {
        $refreshUrl .= "#tabel-card";
    }
    header("refresh:2;url=$refreshUrl");
    exit();
}
