<?php include("../Controller/CRUD_Keanggotaan.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-8 col-12">
            <?php
            // Display the form only if the user is not 'SUPER ADMIN'
            if ($level != 'SUPER ADMIN') {
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                        style="background-color: #02406d; color: white">
                        <h6 class="m-0 font-weight-bold">Tambah/Edit <span
                                style="color: #a1ff9f;">Keanggotaan</span></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <?php if ($error || $sukses): ?>
                                <div class="alert <?php echo $error ? 'alert-danger' : 'alert-success'; ?>" role="alert">
                                    <?php echo $error ? $error : $sukses; ?>
                                </div>
                            <?php endif; ?>

                            <form action="../Controller/CRUD_Keanggotaan.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_membership" name="id_membership"
                                            value="<?php echo generateAutoId($conn); ?>" required hidden>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="<?php echo $nama ?>" required autofocus>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="alamat" name="alamat" required><?php echo $alamat ?></textarea>
                                    </div>
                                </div>

                                <!-- JavaScript for error handling and validation -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Function to show error messages
                                        function showError(element, message) {
                                            var errorElement = element.nextElementSibling;
                                            if (!errorElement || !errorElement.classList.contains('error-message')) {
                                                errorElement = document.createElement('div');
                                                errorElement.className = 'error-message';
                                                errorElement.style.color = 'red';
                                                errorElement.style.fontSize = '0.8em';
                                                element.parentNode.insertBefore(errorElement, element.nextSibling);
                                            }
                                            errorElement.textContent = message;
                                        }

                                        // Function to clear error messages
                                        function clearError(element) {
                                            var errorElement = element.nextElementSibling;
                                            if (errorElement && errorElement.classList.contains('error-message')) {
                                                errorElement.parentNode.removeChild(errorElement);
                                            }
                                        }

                                        // Input validation for nama
                                        var namaTempatInput = document.getElementById('nama');
                                        var lokasiInput = document.getElementById('alamat');

                                        namaTempatInput.addEventListener('input', function() {
                                            var namaTempatValue = this.value;
                                            if (/^\d+$/.test(namaTempatValue)) {
                                                showError(this, "Nama tidak dapat hanya berisi angka.");
                                            } else if (/^[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/.test(namaTempatValue)) {
                                                showError(this, "Nama tidak dapat hanya berisi simbol.");
                                            } else if (namaTempatValue.length < 5 || namaTempatValue.length > 30) {
                                                showError(this, "Nama harus memiliki panjang antara 5 sampai 30 karakter.");
                                            } else {
                                                clearError(this);
                                            }
                                        });

                                        lokasiInput.addEventListener('input', function() {
                                            var lokasiValue = this.value;
                                            if (/^\d+$/.test(lokasiValue)) {
                                                showError(this, "Alamat tidak dapat hanya berisi angka.");
                                            } else if (/^[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]+$/.test(lokasiValue)) {
                                                showError(this, "Alamat tidak dapat hanya berisi simbol.");
                                            } else if (lokasiValue.length < 10 || lokasiValue.length > 100) {
                                                showError(this, "Alamat harus memiliki panjang antara 10 sampai 100 karakter.");
                                            } else {
                                                clearError(this);
                                            }
                                        });
                                    });
                                </script>

                                <div class="mb-3 row">
                                    <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phoneNumber" name="no_telp"
                                            value="<?php echo $no_telp ?>" required oninput="validatePhoneNumber()">
                                    </div>
                                </div>

                                <script>
                                    function validatePhoneNumber() {
                                        var phoneNumberInput = document.getElementById('phoneNumber');
                                        var phoneNumberValue = phoneNumberInput.value;
                                        var numericValue = phoneNumberValue.replace(/\D/g, '');
                                        if (numericValue.length <= 13) {
                                            phoneNumberInput.value = numericValue;
                                        } else {
                                            alert("Nomor telepon harus berupa angka dengan panjang antara 10 sampai 13 karakter.");
                                            phoneNumberInput.value = phoneNumberValue.substring(0, 13);
                                        }
                                    }
                                </script>


                                <div class="mb-3 row">
                                    <label for="hari_main" class="col-sm-2 col-form-label"
                                        style="cursor: pointer">Hari Main</label>
                                    <div class="col-sm-10 d-flex flex-wrap" style="margin-left: -10px;">
                                        <?php
                                        $selectedDays = is_array($hari) ? $hari : array();

                                        $daysOfWeek = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu");

                                        foreach ($daysOfWeek as $day) {
                                            $isChecked = in_array($day, $selectedDays) ? "checked" : "";
                                        ?>
                                            <div class="form-check mx-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="hari_main[]" id="<?= strtolower($day) ?>"
                                                    value="<?= $day ?>" <?= $isChecked ?>>
                                                <label class="form-check-label" for="<?= strtolower($day) ?>">
                                                    <?= $day ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label for="waktu-main" class="col-sm-2 col-form-label">Waktu Main</label>
                                    <div class="col-sm-10">
                                        <input type="time" class="form-control" id="waktu_main" name="waktu_main"
                                            value="<?php echo $waktu ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="durasi_main" class="col-sm-2 col-form-label">Jam Main</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="durasi_main" id="durasi_main" required>
                                            <option value="">-Durasi Main-</option>
                                            <option value="1" <?php if ($durasi == "1") echo "selected"; ?>>1 jam</option>
                                            <option value="2" <?php if ($durasi == "2") echo "selected"; ?>>2 jam</option>
                                            <option value="3" <?php if ($durasi == "3") echo "selected"; ?>>3 jam</option>
                                            <option value="4" <?php if ($durasi == "4") echo "selected"; ?>>4 jam</option>
                                            <option value="5" <?php if ($durasi == "5") echo "selected"; ?>>5 jam</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga" name="harga"
                                            readonly value="<?php echo $harga ?>">
                                        <input type="text" class="form-control" id="status" name="status"
                                            hidden value="Member Aktif">
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-success" name="tambah"
                                        style="width: 120px;">Simpan</button>
                                    <a href="../admin/admin_keanggotaan.php" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    // Mendapatkan elemen-elemen yang diperlukan
    var jamMainSelect = document.getElementById("durasi_main");
    var hargaInput = document.getElementById("harga");

    // Tambahkan event listener untuk memantau perubahan pada pilihan jam_main
    jamMainSelect.addEventListener("change", function() {
        // Mendapatkan nilai yang dipilih oleh pengguna
        var selectedValue = jamMainSelect.value;

        // Tentukan harga berdasarkan nilai yang dipilih
        var harga = 0;
        if (selectedValue == "1") {
            harga = 90000;
        } else if (selectedValue == "2") {
            harga = 180000;
        } else if (selectedValue == "3") {
            harga = 360000;
        } else if (selectedValue == "4") {
            harga = 720000;
        } else if (selectedValue == "5") {
            harga = 1440000;
        } else {
            <?php echo $error ?>
        }

        // Masukkan harga ke dalam input harga
        hargaInput.value = harga;
    });
</script>