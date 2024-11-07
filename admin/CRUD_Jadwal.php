<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Koneksi dan sesi
include_once '../koneksi.php'; // Pastikan koneksi terhubung dengan benar

if (!isset($_SESSION['email'])) {
    die("Email tidak ditemukan di sesi. Pastikan pengguna sudah login.");
}

$email = $_SESSION['email'];
$userName = $_SESSION['username'] ?? 'Guest'; // Gunakan default jika tidak ada username

// Inisialisasi variabel
$id = "";
$anggota = "";
$jenis_lap = "";
$tgl = "";
$waktu_mulai = "";
$waktu_selesai = "";
$harga = "";
$status = "";
$sukses = "";
$error = "";

// Ambil level pengguna
$sqlGetLevel = "SELECT level FROM users WHERE email = ?";
$stmtGetLevel = $conn->prepare($sqlGetLevel);
$stmtGetLevel->bind_param("s", $email);
$stmtGetLevel->execute();
$resultLevel = $stmtGetLevel->get_result();
$rowLevel = $resultLevel->fetch_assoc();
$level = $rowLevel['level'] ?? 'Admin';
$stmtGetLevel->close();

// Ambil jenis olahraga dari database untuk digunakan di dropdown
$fetchSportsQuery = "SELECT DISTINCT sport FROM venues WHERE email = ?";
$stmtFetchSports = $conn->prepare($fetchSportsQuery);
$stmtFetchSports->bind_param("s", $email);
$stmtFetchSports->execute();
$sportsResult = $stmtFetchSports->get_result();

// Mengambil nilai dari formulir jika ada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis_lap = $_POST['jenis_lap'] ?? '';
}

// Query untuk mengambil ID venue dan lapangan berdasarkan jenis olahraga
$fetchVenueIdQuery = "SELECT v.id_venue, vl.id_lapangan, v.sport
                      FROM venues v 
                      JOIN venue_lapangan vl ON v.id_venue = vl.id_venue
                      WHERE v.email = ? AND v.sport = ?";
$stmtFetchVenueId = $conn->prepare($fetchVenueIdQuery);
$stmtFetchVenueId->bind_param("ss", $email, $jenis_lap);
$stmtFetchVenueId->execute();
$fetchVenueIdResult = $stmtFetchVenueId->get_result();

if ($fetchVenueIdResult && mysqli_num_rows($fetchVenueIdResult) > 0) {
    $venueRow = mysqli_fetch_assoc($fetchVenueIdResult);
    $id_venue = $venueRow['id_venue'];
    $id_lapangan = $venueRow['id_lapangan'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah/Edit Jadwal</title>
    <!-- Include CSS Bootstrap dan Flatpickr -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-8 col-12">
                <?php if ($level != 'SUPER ADMIN'): ?>
                    <div class="card shadow mb-4 overflow-hidden" id="form-jadwal">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #02406d; color: white">
                            <h6 class="m-0 font-weight-bold">Tambah/Edit <span style="color: #a1ff9f;">Jadwal</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive overflow-hidden">
                                <?php if (!empty($error) || !empty($sukses)): ?>
                                    <div class="alert <?php echo !empty($error) ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                        <?php echo !empty($error) ? $error : $sukses; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="../Controller/CRUD_Jadwal.php" method="POST" autocomplete="off" onsubmit="return validasiForm()" name="jadwal-form">
                                    <div class="mb-3 row">
                                        <label for="jenis_lap" class="col-sm-2 col-form-label">Keanggotaan</label>
                                        <div class="col-sm-10">
                                            <input type="radio" id="member" name="keanggotaan" value="1" <?php echo ($anggota == "1") ? "checked" : ""; ?> required>
                                            <label for="member">Member</label>
                                            <input type="radio" id="nonmember" name="keanggotaan" value="0" style="margin-left: 20px;" <?php echo ($anggota == "0") ? "checked" : ""; ?> required>
                                            <label for="nonmember">Non Member</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jenis_lap" class="col-sm-2 col-form-label">Jenis Olahraga</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="jenis_lap" name="jenis_lap" required>
                                                <option value="" disabled selected>Pilih Jenis Olahraga</option>
                                                <?php while ($sportRow = $sportsResult->fetch_assoc()): ?>
                                                    <option value="<?php echo htmlspecialchars($sportRow['sport']); ?>" <?php echo ($jenis_lap == $sportRow['sport']) ? "selected" : ""; ?>>
                                                        <?php echo htmlspecialchars($sportRow['sport']); ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Main</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="-Pilih Tanggal-" class="form-control" id="tanggal" name="tanggal" value="<?php echo htmlspecialchars($tgl); ?>" required>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            flatpickr("#tanggal", {
                                                enableTime: false,
                                                minDate: "today",
                                                dateFormat: "Y-m-d",
                                            });
                                        });
                                    </script>
                                    <div class="mb-3 row">
                                        <label for="waktu-mulai" class="col-sm-2 col-form-label">Waktu Mulai</label>
                                        <div class="col-sm-10">
                                            <input type="time" class="form-control" id="waktu-mulai" name="waktu_mulai" value="<?php echo htmlspecialchars($waktu_mulai); ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="waktu-selesai" class="col-sm-2 col-form-label">Waktu Selesai</label>
                                        <div class="col-sm-10">
                                            <input type="time" class="form-control" id="waktu-selesai" name="waktu_selesai" value="<?php echo htmlspecialchars($waktu_selesai); ?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($harga); ?>" readonly>
                                            <input type="text" class="form-control" id="status" name="status" readonly hidden value="Belum Dipesan">
                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-xxl-8 col-12">
                                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary w-100 mt-5" id="save-btn">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
    </div>

    <script>
        // Mendapatkan elemen input dari DOM
        const waktuMulaiInput = document.getElementById("waktu-mulai"); // Input waktu mulai
        const waktuAkhirInput = document.getElementById("waktu-selesai"); // Input waktu selesai

        function validasiForm() {
            const waktuMulai = waktuMulaiInput.value; // Nilai input waktu mulai
            const waktuSelesai = waktuAkhirInput.value; // Nilai input waktu selesai

            if (waktuMulai >= waktuSelesai) {
                alert("Waktu mulai harus lebih kecil dari waktu selesai.");
                return false; // Mencegah form dari pengiriman
            }

            return true; // Mengizinkan form untuk dikirim
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3"></script>

</body>



</html>