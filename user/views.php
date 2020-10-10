<?php 

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

include '../config/config.php';

session_start();

?>

    
<div class="row mt-5">
    <div class="col-md-12">

    <div class="table-responsive">
<table class="table">
		<tr>
			<th>NO</th>
			<th>Url Asli</th>
			<th>Url Random</th>
      <th>Action</th>
		</tr>
    <?php 

    $session_username = $_SESSION['username'];

    $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
    // Jumlah data per halaman
    $limit = 5;
    $limitStart = ($page - 1) * $limit;
    //hanya boleh mengeluarkan artikel yang active, jika tidak active post_status='active'maka tidak akan tampil dihalaman
    $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tbl_shorlink WHERE session_username='$session_username' ORDER BY id DESC LIMIT ".$limitStart.",".$limit);
    $no = $limitStart + 1;
    if(mysqli_num_rows($SqlQuery)){ 
    while($d = mysqli_fetch_array($SqlQuery)){  
?>    


            <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['long_url']; ?></td>
				<td><?php echo $d['short_url']; ?></td>
                <td>
                <a href="url/<?php echo  $d['id']; ?>"  class=" btn btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Hapus!')">Delete</a>
                </td>

			</tr>
<?php 
//Menutup Tanda } 
//echo untuk menampilkan data artikel yang dimana data didalam table kosong    
  }
  }else{
    echo '<h3 class="text-center">Data  Tidak Ada</h3>';
}
?>
        
        </table>    
        </div>
        </div>
    </div>
    </div>


<!--Pagination-->
<div class="Page navigation example">
    <ul class="pagination pagination-md justify-content-center">

    <?php
    // Jika page = 1, maka LinkPrev disable
    if($page == 1){ 
    ?>    
      <!-- link Previous Page disable --> 
      <!-- link Previous Page disable --> 
      <li class="page-item disabled">
      <a   class="page-link" href="#">Previous</a>
      </li>
    <?php
    }
    else{ 
      $LinkPrev = ($page > 1)? $page - 1 : 1;
    ?>
      <!-- link Previous Page --> 
      <li class="page-item">
      <a class="page-link" href="?page=<?php echo $LinkPrev; ?>">Previous</a>
      </li>
    <?php
      }
    ?>

    <?php
    $SqlQuery = mysqli_query($mysqli, "SELECT * FROM tbl_shorlink WHERE session_username='$session_username'");        
    
    //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysqli_num_rows($SqlQuery);
    
    // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit); 
    
    // Jumlah link number 
    $jumlahNumber = 1; 

    // Untuk awal link number
    $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
    
    // Untuk akhir link number
    $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
    for($i = $startNumber; $i <= $endNumber; $i++){
    $linkActive = ($page == $i)? 'class="page-item active"' : '';

    ?>
      <li <?=$linkActive?>>
					<a  class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			</li>
    <?php
      }
    ?>
    <!-- link Next Page -->
    <?php       
    if($page == $jumlahPage){ 
    ?>
      <li class="page-item disabled">
				  <a  class="page-link" href="#">Next</a>
			</li>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
    ?>
      <li class="page-item">
					<a  class="page-link" href="?page=<?php echo $linkNext; ?>">Next</a>
			</li>
    <?php
    }
    ?>
    </ul>
</div>
<!--Pagination-->
</div>
</div>



  <?php } ?>  


