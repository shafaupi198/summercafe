<?php
include 'koneksi.php';
$sq="DELETE FROM menu WHERE id='".$_GET["id"]."'";
mysqli_query($conn,$sq);
header('location:adm_menu.php');
?>