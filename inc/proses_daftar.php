<!-- PROSES DAFTAR -->
<?php
include 'koneksi.php';
if (isset($_POST['daftar'])) {
	$nik = $_POST['nik'];
	$nama_lengkap = $_POST['nama_lengkap'];
	
	$level = "user";
	$nama_foto = null;
	$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('$nik','$nama_lengkap','$nama_foto','$level')");


	if ($sql) {
		?>
		<script type="text/javascript">
			alert("Anda Berhasil Daftar :-)");
			window.location="../login.php";
		</script>
		<?php
	}
}
?>
<!-- ++++++++++ -->