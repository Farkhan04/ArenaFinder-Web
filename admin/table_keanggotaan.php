<?php

$sukses = "";
$error = "";
$sukses2 = "";
$error2 = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($error || $sukses || $error2 || $sukses2) {
    // Set header sebelum mencetak pesan
    $refreshUrl = "keanggotaan.php";
    if ($error2 || $sukses2) {
        $refreshUrl .= "#tabel-card";
    }
    header("refresh:2;url=$refreshUrl"); // 2 = detik
}

?>

<!-- DataTales Example -->
<div class="card shadow mb-4" id="tabel-card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
        style="color: white; background-color: #02406d;">
        <h6 class="m-0 font-weight-bold">Tabel <span
                style="color: #a1ff9f">Keanggotaan</span></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php if ($error2 || $sukses2): ?>
                <div class="alert <?php echo $error2 ? 'alert-danger' : 'alert-success'; ?>"
                    role="alert">
                    <?php echo $error2 ? $error2 : $sukses2; ?>
                </div>
            <?php endif; ?>
            <form action="keanggotaan.php#tabel-card" method="GET">
                <div class="form-group" style="display: flex; gap: 10px;">
                    <input type="text" name="search" class="form-control" id="searchInput"
                        style="width: 30%;" placeholder="Tekan / untuk Mencari Member"
                        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="btn btn-info"
                        id="searchButton">Cari</button>
                    <?php if (isset($_GET['search'])): ?>
                        <a href="keanggotaan.php" class="btn btn-secondary">Hapus Pencarian</a>
                    <?php endif; ?>
                </div>
            </form>

            <script>
                document.getElementById('searchButton').addEventListener('click', function(event) {
                    var searchInput = document.getElementById('searchInput');

                    if (searchInput.value === '') {
                        event.preventDefault(); // Prevent form submission if the search field is empty
                        searchInput.placeholder = 'Kolom pencarian tidak boleh kosong!';
                        searchInput.style.borderColor = 'red'; // Change border color to red
                    } else {
                        // Perform AJAX request to check if the value exists in the database
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'aktivitas.php?checkValue=' + encodeURIComponent(searchInput.value), true);

                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                console.log(xhr.responseText);
                                var response = JSON.parse(xhr.responseText);
                                if (response.count === 0) {
                                    // Value not found in the database
                                    event.preventDefault();
                                    searchInput.placeholder = 'Pencarian tidak ditemukan!';
                                    searchInput.style.borderColor = 'red';
                                } else {
                                    // Reset styles
                                    searchInput.placeholder = 'Cari Aktivitas';
                                    searchInput.style.borderColor = '';
                                }
                            }
                        };

                        xhr.send();
                    }
                });

                document.getElementById('searchInput').addEventListener('click', function() {
                    var searchInput = document.getElementById('searchInput');
                    searchInput.placeholder = 'Cari Aktivitas';
                    searchInput.style.borderColor = '';
                });

                document.addEventListener('keydown', function(event) {
                    var searchInput = document.getElementById('searchInput');

                    // Check if the 'F' key is pressed and the placeholder is 'Kolom pencarian tidak boleh kosong!'
                    if (event.key.toLowerCase() === '/' && searchInput.placeholder === 'Kolom pencarian tidak boleh kosong!') {
                        searchInput.placeholder = 'Cari Member';
                        searchInput.style.borderColor = '';
                    }
                });
            </script>

            <table class="table text-nowrap table-centered table-hover" id="dataTable"
                width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <?php if ($_SESSION['email'] === 'arenafinder.app@gmail.com'): ?>
                            <th scope="col">
                                Email Pengelola
                            </th>
                        <?php endif; ?>
                        <?php if ($_SESSION['email'] === 'arenafinder.app@gmail.com'): ?>
                            <th scope="col">
                                Nama Tempat
                            </th>
                        <?php endif; ?>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Hari Main</th>
                        <th scope="col">Waktu Main</th>
                        <th scope="col">Durasi Main</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['reset'])) {
                        // Pengguna menekan tombol "Hapus Pencarian"
                        header("Location: keanggotaan.php"); // Mengarahkan ke halaman tanpa parameter pencarian
                        exit();
                    }

                    $jumlahDataPerHalaman = 3;

                    // Query untuk menghitung total member dengan email = arenafinder.app@gmail.com atau sesuai dengan session email
                    $queryCount = mysqli_query($conn, "SELECT COUNT(*) as total FROM venue_membership");
                    $countResult = mysqli_fetch_assoc($queryCount);
                    $jumlahData = $countResult['total'];

                    // Calculate the total number of pages
                    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

                    // Get the current page
                    $page = (isset($_GET["page"])) ? $_GET["page"] : 1;

                    // Calculate the starting data index for the current page
                    $awalData = ($page - 1) * $jumlahDataPerHalaman;

                    if (isset($_GET['search'])) {
                        $searchTerm = $conn->real_escape_string($_GET['search']);

                        if ($_SESSION['email'] === 'arenafinder.app@gmail.com') {
                            // Jika pengguna adalah SUPER ADMIN, ambil semua data
                            $sql = "SELECT vm.*, v.location
                                                                FROM venue_membership vm
                                                                JOIN venues v ON vm.id_venue = v.id_venue
                                                                WHERE vm.nama LIKE '%$searchTerm%'
                                                                ORDER BY vm.id_membership DESC
                                                                LIMIT $awalData, $jumlahDataPerHalaman";
                        } else {
                            // Jika bukan SUPER ADMIN, ambil data berdasarkan email pengguna yang login
                            $email = $_SESSION['email'];
                            $sql = "SELECT vm.*, v.location
                                                                FROM venue_membership vm
                                                                JOIN venues v ON vm.id_venue = v.id_venue
                                                                WHERE vm.nama LIKE '%$searchTerm%' AND v.email = '$email'
                                                                ORDER BY vm.id_membership DESC
                                                                LIMIT $awalData, $jumlahDataPerHalaman";
                        }
                    } else {
                        // Jika tidak ada pencarian, gunakan logika yang sama
                        if ($_SESSION['email'] === 'arenafinder.app@gmail.com') {
                            // Jika pengguna adalah SUPER ADMIN, ambil semua data
                            $sql = "SELECT vm.*, v.location, v.venue_name
                                                                FROM venue_membership vm
                                                                JOIN venues v ON vm.id_venue = v.id_venue
                                                                ORDER BY vm.id_membership DESC
                                                                LIMIT $awalData, $jumlahDataPerHalaman";
                        } else {
                            // Jika bukan SUPER ADMIN, ambil data berdasarkan email pengguna yang login
                            $email = $_SESSION['email'];
                            $sql = "SELECT vm.*, v.location, v.venue_name
                                                                FROM venue_membership vm
                                                                JOIN venues v ON vm.id_venue = v.id_venue
                                                                WHERE v.email = '$email'
                                                                ORDER BY vm.id_membership DESC
                                                                LIMIT $awalData, $jumlahDataPerHalaman";
                        }
                    }

                    $member = mysqli_query($conn, $sql);
                    $urut = 1 + $awalData;
                    while ($r2 = mysqli_fetch_array($member)) {
                        $id = $r2['id_membership'];
                        $nama = $r2['nama'];
                        $venueName = $r2['venue_name'];
                        $alamat = $r2['alamat'];
                        $no_telp = $r2['no_telp'];
                        $hari = $r2['hari_main'];
                        $waktu = $r2['waktu_main'];
                        $durasi = $r2['durasi_main'];
                        $harga = $r2['harga'];
                        $status = $r2['status'];
                        $email = $r2['email']; // Tambahkan baris ini untuk mendapatkan data email

                    ?>
                        <tr>
                            <th scope="row">
                                <?php echo $urut++ ?>
                            </th>
                            <?php if ($_SESSION['email'] === 'arenafinder.app@gmail.com'): ?>
                                <td scope="row"
                                    style="overflow: hidden; word-wrap: break-word; white-space: normal;">
                                    <?php echo $email ?>
                                </td>
                            <?php endif; ?>
                            <?php if ($_SESSION['email'] === 'arenafinder.app@gmail.com'): ?>
                                <td scope="row"
                                    style="overflow: hidden; word-wrap: break-word; white-space: normal;">
                                    <?php echo $venueName ?>
                                </td>
                            <?php endif; ?>
                            <td scope="row">
                                <?php echo $nama ?>
                            </td>
                            <td scope="row"
                                style="overflow: hidden; word-wrap: break-word; white-space: normal;">
                                <?php echo $alamat ?>
                            </td>
                            <td scope="row">
                                <?php echo $no_telp ?>
                            </td>
                            <td scope="row">
                                <?php echo $hari ?>
                            </td>
                            <td scope="row">
                                <?php echo $waktu ?>
                            </td>
                            <td scope="row">
                                <?php echo $durasi ?>
                                Jam
                            </td>
                            <td scope="row">
                                <?php echo $harga ?>
                            </td>
                            <td scope="row">
                                <label class="btn"
                                    style="cursor: default; opacity: 0.9; transition: opacity 0.2s; background-color: #02406d; color: white; position: relative;">
                                    <?php
                                    $words = explode(' ', $status);
                                    foreach ($words as $index => $word) {
                                        $color = ($word == 'Member') ? 'white' : (($word == 'Aktif') ? '#A1FF9F' : 'white');
                                        echo '<span style="color: ' . $color . ';">' . $word . '</span>';
                                        if ($index < count($words) - 1) {
                                            echo ' ';
                                        }
                                    }
                                    ?>
                                </label>

                            </td>
                            <td scope="row">
                                <?php
                                if (
                                    isset($_SESSION['email']) && $_SESSION['email'] ===
                                    'arenafinder.app@gmail.com'
                                ) {
                                } else {
                                    // User is not logged in or has a different email, show the Edit button
                                    echo '<a href="keanggotaan.php?op=edit&id=' . $id . '"><button type="button"
                                                            class="btn btn-warning">Edit</button></a>';
                                }
                                ?>
                                <a href="../Controller/CRUD_Keanggotaan.php?op=delete&id=<?php echo $id; ?>"
                                    onclick="return confirm('Yakin mau menghapus data ini?')"><button
                                        type="button" class="btn btn-danger">Delete</button></a>

                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>

            </table>
            <!-- Pagination code -->
            <ul class='pagination'>
                <!-- Previous page link -->
                <?php
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='keanggotaan.php?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
                }

                // Numbered pagination links
                for ($i = 1; $i <= $jumlahHalaman; $i++) {
                    echo "<li class='page-item " . (($page == $i) ? 'active' : '') . "'><a class='page-link' href='keanggotaan.php?page=$i'>$i</a></li>";
                }

                // Next page link
                if ($page < $jumlahHalaman) {
                    echo "<li class='page-item'><a class='page-link' href='keanggotaan.php?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>