<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$level = isset($_SESSION['level']) ? $_SESSION['level'] : '';

if (isset($_SESSION['sport'])) {
    $sportFromVenues = $_SESSION['sport'];
} else {
    $sportFromVenues = ''; // Tambahkan nilai default jika sport tidak ada
}

// Menampilkan pesan sukses atau error jika ada
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
$sukses = isset($_SESSION['sukses']) ? $_SESSION['sukses'] : null;

// Menghapus pesan setelah ditampilkan
unset($_SESSION['error'], $_SESSION['sukses']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Aktivitas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-8 col-12">
                <?php if ($level != 'SUPER ADMIN'): ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #02406d; color: white">
                            <h6 class="m-0 font-weight-bold">Tambah/Edit <span style="color: #a1ff9f;">Aktivitas</span></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive overflow-hidden">
                                <!-- Menampilkan pesan sukses atau error -->
                                <?php if ($error || $sukses): ?>
                                    <div class="alert <?php echo $error ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                        <?php echo $error ? $error : $sukses; ?>
                                    </div>
                                <?php endif; ?>

                                <form action="../Controller/CRUD_Aktivitas.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Aktivitas</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ''; ?>" required autofocus>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="desc_aktivitas" class="col-sm-2 col-form-label">Deskripsi Aktivitas</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="desc_aktivitas" name="desc_aktivitas" required><?php echo isset($desc) ? $desc : ''; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jenis_olga" class="col-sm-2 col-form-label">Jenis Olahraga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jenis_olga" name="jenis_olga" value="<?php echo $sportFromVenues; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Main</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="-Pilih Tanggal-" class="form-control" id="tanggal" name="tanggal" value="<?php echo isset($tanggal) ? $tanggal : ''; ?>" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Keanggotaan</label>
                                        <div class="col-sm-10">
                                            <input type="radio" id="member" name="keanggotaan" value="Member" <?php echo (isset($anggota) && $anggota == "Member") ? 'checked' : ''; ?>>
                                            <label for="member">Member</label>

                                            <input type="radio" id="nonmember" name="keanggotaan" value="Non Member" style="margin-left: 20px;" <?php echo (isset($anggota) && $anggota == "Non Member") ? 'checked' : ''; ?>>
                                            <label for="nonmember">Non Member</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jam_main" class="col-sm-2 col-form-label">Jam Main</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="jam_main" id="jam_main" required>
                                                <option value="">-Jam Main-</option>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <option value="<?php echo $i; ?>" <?php echo (isset($jam) && $jam == $i) ? "selected" : ""; ?>><?php echo $i; ?> jam</option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="harga" name="harga" readonly value="<?php echo isset($harga) ? $harga : ''; ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                        <div class="col-sm-10">
                                            <input class="col-xxl-8 col-12" type="file" id="foto" name="foto" required="required" style="margin-left: -10px;" />
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label">Tampilan</label>
                                        <div class="col-sm-10">
                                            <?php
                                            if (!empty($nama_file)) {
                                                echo "<img src='../img/$nama_file' alt='Gambar' style='width: 100px; height: auto;'>";
                                            }
                                            ?>
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
        const jamMainSelect = document.getElementById("jam_main");
        const hargaInput = document.getElementById("harga");
        const jenisLapanganSelect = document.getElementById("jenis_olga");
        const keanggotaanMember = document.getElementById("member");
        const keanggotaanNonMember = document.getElementById("nonmember");

        jamMainSelect.addEventListener("input", calculatePrice);
        keanggotaanMember.addEventListener("change", calculatePrice);
        keanggotaanNonMember.addEventListener("change", calculatePrice);

        function calculatePrice() {
            const selectedJamMain = parseInt(jamMainSelect.value);
            const selectedLapangan = jenisLapanganSelect.value;
            const isMember = keanggotaanMember.checked;

            let basePricePerHour = 0;

            switch (selectedLapangan) {
                case "Sepak bola":
                case "Bola Voli":
                case "Bola Basket":
                    basePricePerHour = 50000;
                    break;
                case "Tenis Lapangan":
                case "Bulu tangkis":
                    basePricePerHour = 18000;
                    break;
                case "Renang":
                    basePricePerHour = 10000;
                    break;
                case "Futsal":
                    basePricePerHour = isMember ? 90000 : 105000;
                    break;
                default:
                    hargaInput.value = "Jenis olahraga tidak diketahui";
                    hargaInput.style.color = "red";
                    return;
            }

            const totalPrice = selectedJamMain * basePricePerHour;
            hargaInput.value = totalPrice;
            hargaInput.style.color = "black";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>
    <script>
        flatpickr("#tanggal", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d"
        });
    </script>

</body>
</html>
