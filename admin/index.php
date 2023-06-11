<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status']!="ADMIN") {
	header("location:../login.php");
}
$nik = $_SESSION['nik'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE nik = '$nik' ");

$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>INI HALAMAN ADMIN</title>
</head>
<body>
<center><h3>SELAMAT DATANG ADMIN ATAS NAMA <?php echo $data['nama_lengkap'];?></h3></center><br>
	<a href="../inc/logout.php">Logout Disini</a>
</body>
</html>
