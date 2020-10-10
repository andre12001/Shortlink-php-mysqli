<?php
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$Host = "localhost";
$User = "root";
$Pass = "";
$Db_name = "tester";
$mysqli  = new mysqli( $Host, $User, $Pass, $Db_name );
if ($mysqli->connect_error){
echo '<center>Gagal Koneksi</center>';
} else {

} 

include 'url.php';
?>

