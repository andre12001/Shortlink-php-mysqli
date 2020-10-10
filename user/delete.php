<?php
  // defenisikan koneksi
  require('../config/config.php');
  // cek apakah ada parameter ID dikirim
  if (isset($_GET['id'])) {
    // jika ada, ambil nilai id
    $id     = $_GET['id'];
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from tbl_shorlink WHERE id='".$id."'";
    // hapus data pada database
    $query  = mysqli_query($mysqli,$sql);
    // cek apakah proses hapus data berhasil
    if(mysqli_affected_rows($mysqli)) {
      // jika berhasil, redirect kehalaman index.php
      header("Location:../index?pesan=success");
   } else {
      // jika tidak redirect juga kehalaman index.php
      header("Location:../index?pesan=failed");
    }
  }
 ?>