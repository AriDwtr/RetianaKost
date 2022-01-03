<?php
include "koneksi.php";
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM penghuni WHERE id_penghuni='$id'");
echo "<script>window.location.href='index.php?page=penghuni';</script>";
exit;
?>
