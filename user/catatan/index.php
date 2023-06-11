<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Catatan Anda</title>
</head>
<body>
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
			<br><h4>Daftar Perjalanan Yang Belum Sampai</h4>

			<?php
			$nik = $_SESSION['nik'];
			$query =mysqli_query($koneksi,"SELECT * FROM catatan INNER JOIN user ON catatan.nik=user.nik WHERE user.nik='$nik' AND status='Belum Sampai' ");
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
				<!-- UNTUK TOMBOL -->
                <td>
                	<a href="catatan/hapus.php?id_catatan=<?php echo $data[0]; ?>" onclick="return confirm('Yakin Hapus?')">Delete</a>
                </td>
                <!-- +++++++++++++++ -->

			</tr>
			<?php
			$no++;
		}	
			?>
		</tbody>
	</table>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

<?php

if (isset($_POST['status'])) {
  $id_catatan = $_POST['id_catatan'];
  if ($_POST['status'] == "Sampai") {
  $sql = mysqli_query($koneksi,"UPDATE catatan SET status = 'Belum Sampai' WHERE id_catatan = '$id_catatan'");
  header("location:index.php?pg=dashboard");
  }
  else{
   $sql = mysqli_query($koneksi,"UPDATE catatan SET status = 'Sampai' WHERE id_catatan = '$id_catatan'");
   header("location:index.php?pg=dashboard");
  } 
  
}
?>