<?php 


include('config/config.php');

session_start();
 
if(!empty($_SESSION['username'])) { 
header ('location:user/index');
} 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT firtsname, lastname, username, password FROM tbl_account WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){
                    // Bind result variables
                    $stmt->bind_result($firtsname, $lastname, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['firtsname'] = $firtsname;
                            $_SESSION['lastname'] = $lastname;
                            $_SESSION['username'] = $username;


                            header("location:  user/index");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Aplikasi Penjualan Pulsa">
        <meta name="keywords" content="Aplikasi Penjualan Pulsa">
        <meta name="author" content="Indra Styawantoro">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="">
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
    <form action="" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
            <label>Username:<sup>*</sup></label>
            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>" placeholder="Masukan Username" required>
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password:<sup>*</sup></label>
            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
        </div>
        <p>Don't have an account? <a href="register">Sign up now</a>.</p>
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