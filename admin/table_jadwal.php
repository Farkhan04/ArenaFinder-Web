<?php
// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../koneksi.php'; // Sertakan file koneksi database

// Logika PHP untuk mengambil data dari database
if (isset($_GET['reset'])) {
    header("Location: ../admin/admin_jadwallapangan.php");
    exit();
}

$jumlahDataPerHalaman = 10;

$queryCount = mysqli_query($conn, "SELECT COUNT(*) as total FROM venue_price");
$countResult = mysqli_fetch_assoc($queryCount);
$jumlahData = $countResult['total'];
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($page - 1) * $jumlahDataPerHalaman;

$email = $_SESSION['email'];
$isArenaFinderEmail = ($email === 'arenafinder.app@gmail.com');

if ($isArenaFinderEmail) {
    $sql = "SELECT vp.*, v.sport, v.email, v.venue_name FROM venue_price vp JOIN venues v ON vp.id_venue = v.id_venue";
    if (isset($_GET['search'])) {
        $searchTerm = $conn->real_escape_string($_GET['search']);
        $sql .= " WHERE v.sport LIKE '%$searchTerm%'";
    }
    $sql .= " ORDER BY vp.id_price DESC LIMIT $awalData, $jumlahDataPerHalaman";
} else {
    $sql = "SELECT vp.*, v.sport, v.email, v.venue_name FROM venue_price vp JOIN venues v ON vp.id_venue = v.id_venue WHERE v.email = '$email'";
    if (isset($_GET['search'])) {
        $searchTerm = $conn->real_escape_string($_GET['search']);
        $sql .= " AND v.sport LIKE '%$searchTerm%'";
    }
    $sql .= " ORDER BY vp.id_price DESC LIMIT $awalData, $jumlahDataPerHalaman";
}

$jadwal = mysqli_query($conn, $sql);
$urut = 1 + $awalData;

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
    <!-- Sertakan CSS dan JS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <table class="table text-nowrap table-centered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <?php if ($isArenaFinderEmail): ?>
                        <th scope="col">Email Pengelola</th>
                        <th scope="col">Nama Tempat</th>
                    <?php endif; ?>
                    <th scope="col">Keanggotaan</th>
                    <th scope="col">Jenis Olahraga</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu Mulai</th>
                    <th scope="col">Waktu Selesai</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="hoverable">
                <?php while ($r2 = mysqli_fetch_array($jadwal)): ?>
                    <tr>
                        <th scope="row"><?php echo $urut++; ?></th>
                        <?php if ($isArenaFinderEmail): ?>
                            <td><?php echo $r2['email']; ?></td>
                            <td><?php echo $r2['venue_name']; ?></td>
                        <?php endif; ?>
                        <td><?php echo ($r2['membership'] == 0) ? "Non Member" : "Member"; ?></td>
                        <td><?php echo $r2['sport']; ?></td>
                        <td><?php echo $r2['date']; ?></td>
                        <td><?php echo $r2['start_hour']; ?></td>
                        <td><?php echo $r2['end_hour']; ?></td>
                        <td><?php echo $r2['price']; ?></td>
                        <td>
                            <?php if (!$isArenaFinderEmail): ?>
                                <a href="admin_jadwallapangan.php?op=edit&id=<?php echo $r2['id_price']; ?>">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                            <?php endif; ?>
                            <a href="../Controller/CRUD_Jadwal.php?op=delete&id=<?php echo $r2['id_price']; ?>" onclick="return confirm('Yakin mau menghapus data ini?')">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- Pagination code -->
        <ul class='pagination'>
            <?php if ($page > 1): ?>
                <li class='page-item'><a class='page-link' href='admin_jadwallapangan.php?page=<?php echo ($page - 1); ?>'>&laquo; Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
                <li class='page-item <?php echo ($page == $i) ? 'active' : ''; ?>'><a class='page-link' href='admin_jadwallapangan.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $jumlahHalaman): ?>
                <li class='page-item'><a class='page-link' href='admin_jadwallapangan.php?page=<?php echo ($page + 1); ?>'>Next &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Sertakan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>