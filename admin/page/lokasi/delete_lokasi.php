<?php
include "koneksi.php";
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM lokasi WHERE id_lokasi='$id'");
echo "<script>window.location.href='index.php?page=tambahlokasi';</script>";
exit;
?>
