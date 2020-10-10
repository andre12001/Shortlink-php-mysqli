<?php
include '../config/config.php';
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location:../");
    exit;
}


require_once('../config/UrlClassUser.php');
$URLShortener = new URLShortener;

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>LinkBoy</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
        <!-- datepicker CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/datepicker/css/datepicker.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css">
        <!-- Sweetalert CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/sweetalert/css/sweetalert.css">
        <!-- Chosen CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/chosen-bootstrap-4/css/chosen.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <!-- jQuery -->
        <script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>

    </head>
    <body>

    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <div class="container">
                <!-- logo dan judul aplikasi -->
                <a class="navbar-brand" href="index">
                    <span class="title">LinkBoy</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- menu aplikasi -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link mr-1 menu" id="beranda" href="index">
                                <i class="fas fa-home title-icon"></i> Beranda 
                            </a>
                        </li>
                      
                      
                        <li class="nav-item">
                            <a class="btn btn-info Logout" id="Logout" href="#">
                                <i class="fas fa-logout title-icon"></i> Logout 
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <main role="main" class="container mt-5">
        
        <!-- menampilkan isi halaman -->
        <div class="content-header row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle title-icon"></i> Selamat Datang  <strong><?= $_SESSION['firtsname']?> <?= $_SESSION['lastname']?>  </strong>.
                </div>
            </div>
        </div>

         <!--intro-->
    <div class="introo">
       <div class="container">
          <div class="row d-flex justify-content-center">
             <div class="col-15 col-lg-6 my-auto">

             <?php
                echo $URLShortener -> mainForm();
                ?>

             </div>
            
          </div>
       </div>
    </div>
    <!--End intro-->

 
    <div class="ViewsDate" id="ViewsDate"></div>
   

</main>

        <!-- footer -->
        <div class="container">
            <footer class="pt-4 my-md-4 pt-md-3 border-top">
                <div class="row">
                    <div class="col-12 col-md center">
                        &copy; 2020  LinkBoy
                    </div>
                </div>
            </footer>
        </div>


        <!-- Include JavaScript -->
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="../assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <!-- Fontawesome Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
        <!-- DataTables Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
        <!-- datepicker Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/sweetalert/js/sweetalert.min.js"></script>
        <!-- Chosen Plugin JS -->
        <script type="text/javascript" src="../assets/plugins/chosen-bootstrap-4/js/chosen.jquery.js"></script>
    
        <script>
        document.querySelector(".Logout").addEventListener('click', function(){
        swal({
        title: "warning",
        text: "Apakah Anda yakin untuk keluar ",
        type: "warning" 
        },
        function(){
            window.location.href = 'logout';
            });
        });
        </script>


    <!--Menampilkan Data User-->
     <script type="text/javascript">
        function ViewsDate() {
            $('.ViewsDate').load('views.php');
        }

        setInterval(function() {
            ViewsDate();
        }, 1000) // 1 detik
    </script>
    </body>
</html>
