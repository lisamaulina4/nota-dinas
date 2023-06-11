<?php

$nik = $_GET['nik'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE nik = '$nik' ");
$data = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FORM UPDATE PROFIL</title>
</head>
<body>
	<h1>FORM EDIT PROFIL</h1>
	<form method="POST" action="dashboard/proses.php" enctype="multipart/form-data">
		
		<input type="hidden" name="nik" value="<?php echo $data['nik'];?>" >
		<p>Nama Lengkap :</p>
		<input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>">
		<p>Foto :</p>
		<img src="../foto/<?php echo $data['foto'];?>" width="40"><br>
		<input type="file" name="foto">

		<input type="hidden" name="fotolama" value="<?php echo $data['foto'];?>">
		<input type="hidden" name="level" value="user">
		<button type="submit" name="update">SAVE</button>
	</form>
</body>
</html>