<!-- FILE HAPUS DATA -->
<?php
include '../../inc/koneksi.php';
$id_catatan = $_GET['id_catatan'];
$sql = mysqli_query($koneksi, "DELETE FROM catatan WHERE id_catatan = '$id_catatan'");

if ($sql) {
  ?>
  <script type="text/javascript">
    alert("DATA BERHASIL DIHAPUS");
     window.location = "../index.php?pg=catatan";
  </script>
  <?php 
}

 ?>

<!-- +++++++++++ -->