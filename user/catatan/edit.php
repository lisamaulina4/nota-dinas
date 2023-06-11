<!-- FILE EDIT DATA -->


<?php

$id_catatan = $_GET['id_catatan'];
$query = mysqli_query($koneksi,"SELECT * FROM catatan WHERE id_catatan = '$id_catatan' ");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Form Pengisian</title>
</head>
<body>
<h1> Form Pengisian</h1>

<form method="POST">
	<input type="hidden" name="id_catatan" value="<?php echo $data['id_catatan'];?>">
	<p>Tanggal Sampai</p>
	<input type="date" name="tanggal_sampai" value="<?php echo $data['tanggal_sampai'];?>">
	<p>Maksud Perjalanan Dinas</p>
	<input type="text" name="maksud_perjalanan_dinas"value="<?php echo $data['maksud_perjalanan_dinas'];?>">
	<p>Lokasi Berangkat</p>
	<input type="text" name="lokasi"value="<?php echo $data['lokasi'];?>">
	<p>Lokasi Tujuan</p>
	<input type="text" name="lokasi_tujuan"value="<?php echo $data['lokasi_tujuan'];?>">

	<button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>

 <?php 
if (isset($_POST['simpan'])) {
  $id_catatan = $_POST['id_catatan'];
  $tanggal_sampai = $_POST['tanggal_sampai'];
  $maksud_perjalanan_dinas = $_POST['maksud_perjalanan_dinas'];
  $lokasi = $_POST['lokasi'];
  $lokasi_tujuan = $_POST['lokasi_tujuan'];
  
  
  $sql= mysqli_query($koneksi,"UPDATE catatan SET tanggal_sampai='$tanggal_sampai',maksud_perjalanan_dinas='$maksud_perjalanan_dinas',lokasi ='$lokasi',lokasi_tujuan='$lokasi_tujuan' WHERE id_catatan='$id_catatan'");
  

if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Edit");
      window.location ="index.php?pg=catatan";
    </script>
    <?php
  }
}
?>
<!-- +++++++++++ -->