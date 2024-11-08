<?php
include("../koneksi.php");
?>
<div class="mx-lg-3">
<table class="table table-responsive text-nowrap table-centered table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <?php if ($_SESSION['email'] === 'arenafinder.app@gmail.com'): ?>
                <th scope="col">Email Pengelola</th>
                <th scope="col">Nama Tempat</th>
            <?php endif; ?>
            <th scope="col">Nama Aktivitas</th>
            <th scope="col">Deskripsi Aktivitas</th>
            <th scope="col">Jenis Olahraga</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Tanggal Main</th>
            <th scope="col">Keanggotaan</th>
            <th scope="col">Jam Main</th>
            <th scope="col">Harga</th>
            <th scope="col">Foto</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['reset'])) {
            header("Location: aktivitas.php");
            exit();
        }

        $jumlahDataPerHalaman = 3;
        $queryCount = mysqli_query($conn, "SELECT COUNT(*) as total FROM venue_aktivitas");
        $countResult = mysqli_fetch_assoc($queryCount);
        $jumlahData = $countResult['total'];
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $awalData = ($page - 1) * $jumlahDataPerHalaman;
        $emailSession = $_SESSION['email'];

        $sql = "SELECT va.*, v.location, v.email, v.venue_name FROM venue_aktivitas va
                JOIN venues v ON va.id_venue = v.id_venue";

        if ($emailSession === 'arenafinder.app@gmail.com') {
            if (isset($_GET['search'])) {
                $searchTerm = $conn->real_escape_string($_GET['search']);
                $sql .= " WHERE va.nama_aktivitas LIKE '%$searchTerm%'";
            }
        } else {
            $sql .= " WHERE v.email = '$emailSession'";
            if (isset($_GET['search'])) {
                $searchTerm = $conn->real_escape_string($_GET['search']);
                $sql .= " AND va.nama_aktivitas LIKE '%$searchTerm%'";
            }
        }

        $sql .= " ORDER BY va.id_aktivitas DESC LIMIT $awalData, $jumlahDataPerHalaman";
        $aktivitas = mysqli_query($conn, $sql);
        $urut = 1 + $awalData;

        while ($r2 = mysqli_fetch_array($aktivitas)) {
            $id = $r2['id_aktivitas'];
            $email = htmlspecialchars($r2['email']);
            $venueName = htmlspecialchars($r2['venue_name']);
            $desc = htmlspecialchars($r2['desc_aktivitas']);
            $nama = htmlspecialchars($r2['nama_aktivitas']);
            $jenis = htmlspecialchars($r2['sport']);
            $lokasi = htmlspecialchars($r2['location']);
            $tanggal = htmlspecialchars($r2['date']);
            $anggota = htmlspecialchars($r2['membership']);
            $jam = htmlspecialchars($r2['jam_main']);
            $harga = htmlspecialchars($r2['price']);
            $foto = htmlspecialchars($r2['photo']);
        ?>
            <tr>
                <th scope="row"><?php echo $urut++; ?></th>
                <?php if ($emailSession === 'arenafinder.app@gmail.com'): ?>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $venueName; ?></td>
                <?php endif; ?>
                <td style="white-space: normal;"><?php echo $nama; ?></td>
                <td style="white-space: normal;"><?php echo $desc; ?></td>
                <td><?php echo $jenis; ?></td>
                <td style="white-space: normal;"><?php echo $lokasi; ?></td>
                <td><?php echo $tanggal; ?></td>
                <td><?php echo $anggota; ?></td>
                <td><?php echo $jam; ?> Jam</td>
                <td><?php echo $harga; ?></td>
                <td>
                    <img src="../public/img/venue/<?php echo $foto; ?>" alt="Image" style="width: 100px; height: 100px;">
                </td>
                <td>
                    <?php if ($emailSession !== 'arenafinder.app@gmail.com'): ?>
                        <a href="../Controller/CRUD_Aktivitas.php?id=<?php echo $id; ?>">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                    <?php endif; ?>
                    <a href="../Controller/CRUD_Aktivitas.php?op=delete&id=<?php echo $id; ?>" onclick="return confirm('Yakin mau menghapus data ini?')">
                    <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<!-- Pagination code -->
<ul class='pagination'>
    <?php
    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='aktivitas.php?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
    }

    for ($i = 1; $i <= $jumlahHalaman; $i++) {
        echo "<li class='page-item " . (($page == $i) ? 'active' : '') . "'><a class='page-link' href='aktivitas.php?page=$i'>$i</a></li>";
    }

    if ($page < $jumlahHalaman) {
        echo "<li class='page-item'><a class='page-link' href='aktivitas.php?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
    }
    ?>
</ul>