<?php
require_once('config/UrlClassVisitor.php');
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
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
        <!-- Sweetalert CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
        <!-- Style CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>

    </head>
    <body>
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

       <!-- Ini adalah Bagian Header Modal -->
        <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" style="font-size: 14px"><i class="fas fa-bell"></i> Informasi </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
            <div class="modal-body">
             Selamat datang diwebsite <strong>LinkBoy</strong><br>
             <strong>LinkBoy</strong>  adalah sebuah layanan yang biasa digunakan oleh orang orang  
                untuk memperpendek URL agar memudahkan orang-orang untuk mengingat URL 
                atau link yang panjang dari domain yang bersangkutan.<br>
            saat ini website  <strong>LinkBoy</strong> masih menjalanin beta tester untuk pertama kalinya
            <br><br>Bantu Kami untuk mencari bugs, jika anda menemukan bugs pada website kami harap laporkan ke halaman ini : <br>
            <a href="https://www.facebook.com/andre123.co.id/" target="_blank">Lapor Sekarang</a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <div class="container">
                <!-- logo dan judul aplikasi -->
                <a class="navbar-brand" href="beranda">
                    <span class="title">LinkBoy</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- menu aplikasi -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link mr-1 menu" id="beranda" href="beranda">
                                <i class="fas fa-home title-icon"></i> Beranda 
                            </a>
                        </li>
         
                        <li class="nav-item">
                            <a class="nav-link mr-1 menu"  href="login">
                                <i class="fas fa-user title-icon"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-info"  href="register">
                                <i class="fas fa-plus title-icon"></i> Daftar
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
                    <i class="fas fa-info-circle title-icon"></i> Selamat Datang di <strong>LinkBoy</strong>.
                </div>
            </div>
        </div>

         <!--intro-->
    <div class="introo">
       <div class="container">
          <div class="row d-flex justify-content-center">
             <div class="col-15 col-lg-6 my-auto">
                <h1 class="intro-name">
                   LinkBoy
                </h1>
                <p>

                <strong>LinkBoy</strong>  adalah sebuah layanan yang biasa digunakan oleh orang orang  
                untuk memperpendek URL agar memudahkan orang-orang untuk mengingat URL 
                atau link yang panjang dari domain yang bersangkutan.

                </p>
                <a href="#coba" class="btn btn-lg btn-primary link">
                   COBA SEKARANG
                </a>
             </div>
             <div class="col-10 col-lg-6 my-6">
                <img src="assets/img/details-1.png" alt="gambar" width="300px" class="float-right">
             </div>
          </div>
       </div>
    </div>
    <!--End intro-->

    <!-- Keterangan -->
    <div class="coba mt-5" id="coba">
    <div class="container">
          <div class="row d-flex justify-content-center">
          <h2 class="coba-name">
                   Coba Sekarang dan rasakan kemudahannya
                </h1>
                <p class="coba-des">

                <strong>Catetan: </strong>  Fiture ini khusus pengguna yang ingin menyimpan linknya tanpa harus login, 
                tetapi fiture ini akan mendelete data otomatis

                </p>
          </div>
      </div>
    
      <?php
        echo $URLShortener -> mainForm();
        ?>

        </main>

        <!-- footer -->
        <div class="container footer">
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
        <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <!-- Fontawesome Plugin JS -->
        <script type="text/javascript" src="assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
        <!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
        <!--Script js-->
        <script type="text/javascript" src="assets/js/script.js"></script>


    </body>
</html>
