<?php
include '../inc/koneksi.php';
session_start();
if ($_SESSION['status']!="USER") {
	header("location:../login.php");
}
$nik = $_SESSION['nik'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE nik = '$nik' ");

$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">	
	<title>INI HALAMAN USER</title>
</head>
<body id="page-top">
	<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand text-light" href="?pg=dashboard"#page-top>Nota Dinas Sekretariat DPRD Kota Bogor</a> 
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link text-light" href="?pg=dashboard">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="?pg=catatan">Pencatatan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="?pg=isian">Form Isian Catatan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="../inc/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
			

 <center><h3>SELAMAT DATANG USER ATAS NAMA <?php echo $data['nama_lengkap'];?></h3></center>
		<p><?php
		switch (@$_GET['pg']) {
			case 'dashboard':
				include 'dashboard/index.php';
		  		break;
		  	    case 'catatan':
				include 'catatan/index.php';
		  		break;
		  	    case 'isian':
				include 'isian/index.php';
		  		break;
		  	    case 'editprofil':
				include 'dashboard/update_profil.php';
		  		break;
	            case 'editdata':
				include 'catatan/edit.php';
		  		break;
	
		    default:
			include 'dashboard/index.php';
			break;
}
?></p>
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>