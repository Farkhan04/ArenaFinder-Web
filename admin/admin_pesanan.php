<?php
session_start();
include('../koneksi.php');

// if (!isset($_SESSION['email'])) {
//     // Jika pengguna belum masuk, arahkan mereka kembali ke halaman login
//     header("Location: login.php");
//     exit();
// }

// Pengguna sudah masuk, Anda dapat mengakses data sesi
$email = $_SESSION['email'];
$userName = $_SESSION['username'];

// // Check if 'id_venue' session variable is set
// if (!isset($_SESSION['id_venue'])) {
//     header('Location: login.php');
//     exit;
// }

$id_venue = $_SESSION['id_venue']; // Now this should work

$sql = "SELECT v.id_booking AS id_membership, v.total_price as harga, v.created_at, 
        u.full_name as nama, u.no_hp, u.alamat, u.email,
        CONCAT(p.start_hour, ' - ',  p.end_hour) AS waktu_main, DAYNAME(p.date) AS hari_main 
        FROM venue_booking AS v
        JOIN users AS u 
        ON u.email = v.email
        JOIN venue_booking_detail AS vb 
        ON v.id_booking = vb.id_booking 
        JOIN venue_price AS p  
        ON p.id_price = vb.id_price 
        WHERE v.id_venue = $id_venue 
        AND v.payment_status = 'Pending' 
        GROUP BY v.id_booking 
        ORDER BY v.created_at DESC";

// Perform the query and check if it succeeded
$result = $conn->query($sql);
if ($result === false) {
    echo "Query failed: " . $conn->error;
    exit;
}

// Initialize $html variable
$html = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '
            <div class="card shadow mb-4" id="cardContainer' . $row['id_membership'] . '">
                <div class="card-header py-1 d-flex justify-content-between align-items-center" style="background-color: #02406d">
                    <h6 class="m-0 font-weight-bold" style="color: white;">Pemesanan Lapangan ' . $row['venue_sport'] . 
                        '<span style="color: #a1ff9f;"> - ' . $row['nama'] . '</span></h6>
                    <button id="toggleButton' . $row['id_membership'] . '" class="btn btn-lg dropdown-toggle py-1" 
                    style="color: white; border: 1px solid white; font-size: 15px;" type="button" 
                    data-toggle="collapse" data-target="#collapseCard' . $row['id_membership'] . '" 
                    aria-expanded="false" aria-controls="collapseCard' . $row['id_membership'] . '"></button>
                </div>
                <div class="card-body collapse" id="collapseCard' . $row['id_membership'] . '">
                    <h6>Nama : <strong>' . htmlspecialchars($row['nama']) . '</strong></h6>
                    <h6>Alamat : <strong>' . htmlspecialchars($row['alamat']) . '</strong></h6>
                    <h6>No. Telepon : <strong>' . htmlspecialchars($row['no_hp']) . '</strong></h6>
                    <h6>Hari Main : <strong>' . htmlspecialchars($row['hari_main']) . '</strong></h6>
                    <h6>Waktu Main : <strong>' . htmlspecialchars($row['waktu_main']) . '</strong></h6>
                    <h6>Waktu Pemesanan : <strong>' . htmlspecialchars($row['created_at']) . '</strong></h6>
                    <h6>Total Harga : <strong>' . htmlspecialchars($row['harga']) . '</strong></h6>
                    <div class="d-flex justify-content-end mt-auto">
                        <button type="button" class="btn btn-success mr-2 confirm-button" data-membership-id="' . $row["id_membership"] . '">Konfirmasi</button>
                        <button type="button" class="btn btn-danger cancel-button" data-membership-id="' . $row["id_membership"] . '">Batalkan</button>
                    </div>
                </div>
            </div>';
    }
} else {
    $html = '<p>No data available.</p>';
}

echo $html;

$conn->close();
?>

<!-- JavaScript Section -->
<script>
$(document).on("click", ".confirm-button", function() {
    var membershipId = $(this).data("membership-id");
    if (!confirmationReceived) {
        var confirmMessage = "Apakah Anda yakin akan mengkonfirmasi pesanan ini?";
        if (confirm(confirmMessage)) {
            confirmationReceived = true;
            $.ajax({
                type: "POST",
                url: "confirm_booking.php",
                data: { membershipId: membershipId, action: "confirm" },
                success: function(response) {
                    console.log(response);
                    $("#cardContainer" + membershipId).remove();
                    updateBadge(response.count);
                    window.location.href = "confirm_booking.php?membershipId=" + membershipId;
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    }
});

$(document).on("click", ".cancel-button", function() {
    var membershipId = $(this).data("membership-id");
    if (!confirmationReceived) {
        var confirmMessage = "Apakah Anda yakin akan membatalkan pesanan ini?";
        if (confirm(confirmMessage)) {
            confirmationReceived = true;
            $.ajax({
                type: "POST",
                url: "cancel_booking.php",
                data: { membershipId: membershipId, action: "cancel" },
                success: function(response) {
                    console.log(response);
                    $("#cardContainer" + membershipId).remove();
                    updateBadge(response.count);
                    window.location.href = "check_data.php?membershipId=" + membershipId;
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    }
});

function updateBadge(count) {
    $("#pesanan-link").text(count);
}
</script>
