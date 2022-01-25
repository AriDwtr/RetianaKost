<?php
include "koneksi.php";
$id=$_GET['id'];
$id_kosan=$_GET['id_kosan'];
mysqli_query($conn,"DELETE FROM kamar WHERE id_kamar='$id'");
echo "<script>window.location.href='index.php?page=lihatkamar&id=".$id_kosan."';</script>";
exit;
?>