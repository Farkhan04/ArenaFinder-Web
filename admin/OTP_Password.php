<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Include Bootstrap CSS and jQuery -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
    <link rel="icon" href="../img_asset/login.png">
    <title>Verifikasi Akun</title>
    <style>
        body {
            font-family: "Kanit", sans-serif;
        }

        #btn-login {
            background-color: #e7f5ff;
            color: #02406d;
        }

        #btn-login:hover {
            background-color: #02406d;
            color: #e7f5ff;
            border: 1px solid #e7f5ff;
        }

        #card-email {
            background-color: white;
        }
    </style>
</head>

<body class="bg-gradient" style="background-color: #e7f5ff">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-5 ">
                <div class="card o-hidden border-0 shadow-lg my-4" style="height: 700px;">
                    <div class="card-body p-10" id="card-email">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-10 mx-auto p-2">
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h2 text-gray-900 mb-2">Verifikasi Kode OTP</h1>
                                        <div class="verification-message">
                                            <!-- Pesan verifikasi akan muncul di sini -->
                                        </div>
                                        <img src="/img_asset/login.png" alt=""
                                            style="width: 200px; height: auto; margin-bottom: 20px" />
                                    </div>

                                    <form class="user" id="otpForm" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <input type="text" id="otp" class="form-control form-control-user"
                                                name="otp_code" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-user btn-block" id="btn-login"
                                                name="verify">Verifikasi</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#otpForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman form tradisional

            $.ajax({
                url: '../Controller/veriff_lupaPass.php', // URL file PHP yang akan dijalankan
                type: 'POST',
                data: $(this).serialize(), // Mengambil semua data dari form
                success: function(response) {
                    // Jika verifikasi berhasil, redirect ke halaman ganti password
                    if (response.success) {
                        window.location.href = '../admin/gantiPassword_form.php'; // Alamat halaman untuk ganti password
                    } else {
                        $('.verification-message').html(response.message); // Tampilkan pesan verifikasi
                    }
                },
                error: function() {
                    $('.verification-message').html("<div class='alert alert-danger'>Gagal memverifikasi. Silakan coba lagi.</div>");
                }
            });
        });
    });
</script>

</body>

</html>
