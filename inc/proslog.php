<!-- Proses Login -->
<?php
session_start();
include 'koneksi.php';
$nik = $_POST['nik']; 
$nama_lengkap = $_POST['nama_lengkap']; 
$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE nik='$nik' AND nama_lengkap='$nama_lengkap' ");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek>0) {
		if($data['level']=="user") {
		$_SESSION['nik']= $nik;
		$_SESSION['status']= "USER";
		$_SESSION['nik']=$data[0];
		header("location:../user/index.php");

}

}else{
	?>
	<script type="text/javascript">
		alert("Akun Anda Ada Yang Salah");
		window.location="../login.php";
	</script>

<?php
}

?>
<!-- ++++++++ -->