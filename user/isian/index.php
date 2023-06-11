<!DOCTYPE html>
<html>
<head>
	<title> Form Pengisian</title>
</head>
<body>
<h2> Form Pengisian</h2>

<form method="POST">
	<p>Tanggal Sampai</p>
	<input type="date" name="tanggal_sampai">
	<p>Maksud Perjalanan Dinas</p>
	<input type="text" name="maksud_perjalanan_dinas">
	<p>Lokasi Berangkat</p>
	<input type="text" name="lokasi">
	<p>Lokasi Tujuan</p>
	<input type="text" name="lokasi_tujuan">
    <input type="hidden" name="status" value="Belum Sampai">

	<button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>

									  <?php
									  if (isset($_POST['simpan'])) {
									  $nik = $_SESSION['nik'];
									  $tanggal_sampai= $_POST['tanggal_sampai'];
									  $maksud_perjalanan_dinas = $_POST['maksud_perjalanan_dinas'];
									  $lokasi = $_POST['lokasi'];
									  $lokasi_tujuan = $_POST['lokasi_tujuan'];
									  $status = $_POST['status'];

									  $sql = mysqli_query($koneksi,"INSERT INTO catatan VALUES ('','$nik','$tanggal_sampai','$maksud_perjalanan_dinas','$lokasi','$lokasi_tujuan','$status')");
									  if ($sql) {
									    ?>
									    <script type="text/javascript">
									      alert("Data Berhasil Di Tambahkan!");
									      window.location = "index.php?pg=catatan";
									    </script>
									    <?php
									  }

									}

									?>