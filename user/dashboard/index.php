<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">	
	<title></title>
</head>
<body>
	<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
		<div class="card p-4"> 
			<div class=" image d-flex flex-column justify-content-center align-items-center"> 
				<button class="btn btn-link"> 
				<img src="../foto/<?php echo $data['foto'];?>" style="width: 180px; border-radius: 10px;"></button> 
				<span class="name mt-3"><?php echo $data['nama_lengkap'];?></span> 
				<span class="inputNIK"><?php echo $data['nik'];?></span> 
			<div class="d-flex flex-row justify-content-center align-items-center gap-4"> 
				<span><i class="fa fa-copy"></i></span> 
			</div> 
			<div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
			</div> 
			<div class=" d-flex mt-2"> 
				<button class="btn1 btn-light"><a href="?pg=editprofil&&nik=<?php echo $data[0];?>"> Edit Profil</a></button> 
			</div> 
			<div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
			 </div> 
			</div> 
		</div>
</div>
<hr>
<h4>Daftar Perjalanan Yang Sudah Sampai Atau Di lakukan</h4>

	<table class="table">
  <thead class="thead-dark">
			<tr>
			<th>No</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Tanggal Sampai</th>
			<th>Maksud Perjalanan Dinas</th>
			<th>Lokasi Berangkat</th>
			<th>Lokasi Tujuan</th>
			<th>Status</th>
			<th>Aksi</th>
			
		</tr>
		</thead>
		<tbody>
			<?php
			$nik = $_SESSION['nik'];
			   $query =mysqli_query($koneksi,"SELECT * FROM catatan INNER JOIN user ON catatan.nik=user.nik WHERE user.nik='$nik' AND status='Sampai' ");
			$no=1;
			while($data = mysqli_fetch_array($query)){
			?>	

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $data['nik']?></td>
				<td><?php echo $data['nama_lengkap']?></td>
				<td><?php echo $data['tanggal_sampai']?></td>
				<td><?php echo $data['maksud_perjalanan_dinas']?></td>
				<td><?php echo $data['lokasi']?></td>
				<td><?php echo $data['lokasi_tujuan']?></td>
                <!-- TOMBOL UBAH -->
            <td>
              <?php
              $status = $data['status'];
              if ($status == "Sampai") {
                ?>
                <form method="POST" >
                  <input type="hidden" name="id_catatan" value="<?php echo $data[0]; ?>">
                <input type="submit"  name="status" value="Sampai" onclick="return confirm('Yakin Rubah Status?')">
                </form>
                <?php
              }else{
                 ?>
                <form method="POST" >
                  <input type="hidden" name="id_catatan" value="<?php echo $data[0]; ?>">
                <input type="submit"  name="status" value="Belum Sampai" onclick="return confirm('Yakin Rubah Status?')">
                </form>
                <?php
              }
              ?>  
            </td>
<!-- +++++++++++++ -->
						<td>
                	<a href="catatan/hapus.php?id_catatan=<?php echo $data[0]; ?>" onclick="return confirm('Yakin Hapus?')">Delete</a> | <a href="?pg=editdata&&id_catatan=<?php echo $data[0];?>">Update</a></td>
                </td>
			</tr>
			<?php
			$no++;
		}	
			?>
		</tbody>
	</table>



<?php

if (isset($_POST['status'])) {
  $id_catatan = $_POST['id_catatan'];
  if ($_POST['status'] == "Sampai") {
  $sql = mysqli_query($koneksi,"UPDATE catatan SET status = 'Belum Sampai' WHERE id_catatan = '$id_catatan'");
  header("location:index.php?pg=catatan");
  }
  else{
   $sql = mysqli_query($koneksi,"UPDATE catatan SET status = 'Sampai' WHERE id_catatan = '$id_catatan'");
   header("location:index.php?pg=catatan");
  } 
  
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

