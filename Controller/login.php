<?php
session_start();
include('../koneksi.php');

if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
 


    // Validation: Check if email and password are not empty
    if (empty($email) && empty($password)) {
?>
        <script>
            alert("Mohon isi email dan sandi.");
            window.location.replace('../admin/login.php');
        </script>
    <?php
        exit();
    } elseif (empty($email)) {
    ?>
        <script>
            alert("Mohon isi email.");
            window.location.replace('../admin/login.php');
        </script>
    <?php
        exit();
    } elseif (empty($password)) {
    ?>
        <script>
            alert("Mohon isi sandi.");
            window.location.replace('../admin/login.php');
        </script>
    <?php
        exit();
    }

    // Fetch user data and venue data based on the email
    $sql = mysqli_query(
        $conn,
        "SELECT u.*, 
      IFNULL(v.id_venue, 0) AS id_venue, 
      v.venue_name AS nama_venue, 
      v.sport AS sport
      FROM users AS u 
      LEFT JOIN venues AS v 
      ON u.email = v.email 
      WHERE u.email = '$email' 
      LIMIT 1"
    );

    $count = mysqli_num_rows($sql);

    if ($count > 0) {
        $fetch = mysqli_fetch_assoc($sql);
        $hashpassword = $fetch["password"];

        // Get user level and other details
        $userLevel = $fetch["level"];
        $userName = $fetch["username"];
        $sportFromDB = $fetch["sport"];

        if ($fetch["is_verified"] == 0) {
            $_SESSION['message'] = "Tolong Verifikasi Akun Email sebelum Login.";
            header("Location: ../admin/login.php");
            exit();
        } elseif (password_verify($password, $hashpassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $userLevel;
            $_SESSION['nama_venue'] = $fetch['nama_venue'];
            $_SESSION['username'] = $userName;
            $_SESSION['sport'] = $sportFromDB;
            header("Location: ../admin/index.php");
            exit();
        } else {
        ?>
            <script>
                alert("<?php echo "Password Salah, Mohon Coba Lagi." ?>");
                window.location.replace('../admin/login.php');
            </script>
        <?php
            exit();
        }
    } else {
        ?>
        <script>
            alert("<?php echo "Email belum terdaftar. Silakan daftar terlebih dahulu." ?>");
            window.location.replace('../admin/daftar.php');
        </script>
<?php
        exit();
    }
}
?>
