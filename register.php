
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi Penjualan Pulsa">
        <meta name="keywords" content="Aplikasi Penjualan Pulsa">
        <meta name="author" content="Indra Styawantoro">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css">
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
        <!-- datepicker CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.5.0-web/css/all.min.css">
        <!-- Sweetalert CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
        <!-- Chosen CSS -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/chosen-bootstrap-4/css/chosen.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <!-- jQuery -->
        <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>

        <!-- title -->
        <title>LinkBoy</title>
    </head>
    <body>
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



<div class="container content-header">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card pt-4">
               <div class="card-body">

<?php

include('config/config.php');

session_start();
 
if(!empty($_SESSION['username'])) { 
header ('location:user/index');
} 

if (isset($_POST['registrasi'])) {  
$error = array();
    if (empty($_POST['firtsname'])) {  
        $error[] = 'Nama lengkap tidak boleh kosong'; 
    } else {
        $firtsname =htmlspecialchars($_POST['firtsname'], ENT_QUOTES);
    
    }


    if (empty($_POST['lastname'])) {  
        $error[] = 'Nama lengkap tidak boleh kosong'; 
    } else {
        $lastname =htmlspecialchars($_POST['lastname'], ENT_QUOTES);
    
    }



if (empty($_POST['username'])) {  
        $error[] = 'Username tidak boleh kosong'; 
    } else {
       $username =htmlspecialchars($_POST['username'], ENT_QUOTES);
    }

    if (empty($_POST['password'])) {
        $error[] = 'Kata sandi tidak boleh kosong'; }

 if(strlen($_POST['password']) < 5 || strlen($_POST['password']) > 15){
 $error['password'] = "Masukkan Pasword minimal 5 karakter maksimal 15 karakter";
 } else {
   $cost = 13;
   $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_DEFAULT, ["cost" => $cost]));}


$email = mysqli_real_escape_string($mysqli, $_POST['email']);;
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error[] = 'Alamat Email yang anda masukkan salah';
} else {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);;
}



$member_tgl_daftar=date("j-M-Y");
$member_jam_tgl_login =date("h:i:s-j-M-Y"); 
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ipaddres=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ipaddres=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ipaddres=$_SERVER['REMOTE_ADDR'];
    }
  
if (empty($error)){


// query untuk mencari email yg sdh ada di database
$query ="SELECT * FROM tbl_account WHERE username ='$username'";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
if(!$result->num_rows > 0){
  
$insert="INSERT INTO tbl_account(firtsname, lastname, username, email, password, ipaddres)
values('$firtsname', '$lastname', '$username', '$email', '$password', '$ipaddres')" 
or die($mysqli->error.__LINE__);
if($mysqli->query($insert) === false) { 

echo'<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf anda tidak bisa mendaftar karena sistem kami ada kesalahan..!</div>';
  } 
  else   {
echo'<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pendaftaran Menjadi Anggota Berhasil..!</div>';
echo '<meta http-equiv="refresh" content="1;url=login" />';

 }
 }



else   {
echo'<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf Sebelumnya akun ini sudah terdaftar...!</div>';
 }
}

  


else {echo'<div class="alert alert-danger alert-dismissable"><ul>';
foreach ($error as $key => $values) {            
echo'<li>'.$values.'</li>';}
echo'</ul></div>';
}
unset($_POST['registrasi']);
mysqli_close($mysqli); }


?>
        
                <span class="text-danger"></span>


        <form class="row-border" name="form1"  action="" method="post">
                  <div class="form-group">
                    <label for="firtsname">Nama Depan</label>
                    <input type="text" class="form-control" id="firtsname" name="firtsname" aria-describedby="firtsname" placeholder="Masukan Nama Depan"  required>
                  </div>

                   <div class="form-group">
                    <label for="lastname">Nama Belakang</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="Masukan Nama Belakang" required>
                  </div>

                   <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Masukan Username" required>
                  </div>

                   <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Masukan Email" required>
                  </div>


                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby="email" placeholder="Masukan Password" required>
                  </div>

                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Dengan ini anda telah menyetujui persyaratan & privacy kami</label>
                  </div>

            <button class="btn btn-primary" name="registrasi" type="submit">Registrasi</button>
                </form>



                </div>
            </div>
        </div>




        <!-- footer -->
        <div class="container mt-5">
            <footer class="pt-4 my-md-4 pt-md-3 border-top">
                <div class="row">
                    <div class="col-12 col-md center">
                        &copy; 2018 LinkBoy
                    </div>
                </div>
            </footer>
        </div>
        



        <!-- Include JavaScript -->
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js"></script>
        <!-- Fontawesome Plugin JS -->
        <script type="text/javascript" src="assets/plugins/fontawesome-free-5.5.0-web/js/all.min.js"></script>
        <!-- DataTables Plugin JS -->
        <script type="text/javascript" src="assets/plugins/DataTables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
        <!-- datepicker Plugin JS -->
        <script type="text/javascript" src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
        <!-- SweetAlert Plugin JS -->
        <script type="text/javascript" src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
        <!-- Chosen Plugin JS -->
        <script type="text/javascript" src="assets/plugins/chosen-bootstrap-4/js/chosen.jquery.js"></script>


</body>
</html>