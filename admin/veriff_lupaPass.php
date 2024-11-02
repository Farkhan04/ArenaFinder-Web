<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="../img_asset/login.png">
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

        .small {
            color: #02406d;
        }

        .small:hover {
            color: #02406d;
            text-decoration: underline;
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
                                        <h1 class="h2 text-gray-900 mb-2 ">Lupa Sandi?</h1>
                                        <p class="mb-4">Silahkan Masukkan Email Anda!</p>
                                        <img src="/img_asset/login.png" alt=""
                                            style="width: 200px; height: auto; margin-bottom: 20px" />
                                    </div>


                                    <form action="../Controller/OTP_Password.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan Email" name="email" autofocus>
                                        </div>
                                        <input class="btn btn-user btn-block mt-3" type="submit" value="Masukkan" name="recover" id="btn-login">
                                    </form>



                                    <hr />
                                    <div class="text-center">
                                        <a class="small" href="login.php">Sudah Memiliki Akun? Masuk Sekarang!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="daftar.php">Buat Akun Anda!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JavaScript-->
        <script src="../bootstrap/js/bootstrap.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>