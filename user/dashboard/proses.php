<?php 
include '../../inc/koneksi.php';
if (isset($_POST['update'])) {

 	$nik = $_POST['nik'];
	$nama_lengkap = $_POST['nama_lengkap'];
	$level = $_POST['level'];
	$fotolama = $_POST['fotolama'];
	$nama_foto = $_FILES['foto']['name'];
	$source = $_FILES['foto']['tmp_name'];
	$folder =  '../../foto/';
  
  if ($nama_foto) {
    unlink('../../foto/'.$fotolama);

  move_uploaded_file($source, $folder.$nama_foto);
  $sql = mysqli_query($koneksi,"UPDATE user SET nama_lengkap='$nama_lengkap',
                                                    foto='$nama_foto',level='$level'
                                                    WHERE nik= '$nik'");
  }else{
    $sql = mysqli_query($koneksi,"UPDATE user SET nama_lengkap='$nama_lengkap',
                                                    level='$level'
                                                    WHERE nik= '$nik'");
  }

  

if ($sql) {
  ?>
    <script type="text/javascript">
      alert("Data Di UPDATE");
      window.location ="../index.php?pg=dashboard";
    </script>
    <?php
  }
}

 ?>