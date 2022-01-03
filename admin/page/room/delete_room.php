<?php
include "koneksi.php";
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM kosan WHERE id_kosan='$id'");
echo "<script>window.location.href='index.php?page=kosan';</script>";
exit;
?>
