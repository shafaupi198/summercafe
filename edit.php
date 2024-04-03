<?php

include "koneksi.php";
if(isset($_POST['submit']))
  {

    $fid = $_POST['id'];
    $fkat = substr($_POST['kategori'],0,4);
    $fnama = $_POST['nama_menu'];
    $fharga = $_POST['harga'];
    $fstok = $_POST['stok'];

    if ($_FILES['gambar']['name'])
    {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "upload/" . $_FILES['gambar']['name']);
        $img = $_FILES['gambar']['name'];
    }
    else{
        $img = $_POST['img1'];
    }
    //This is insertion query of mysql
    $i = "UPDATE menu SET id='$fid',id_kat='$fkat', gambar='$img',nama_menu='$fnama',harga='$fharga', stok='$fstok' WHERE id='$_GET[id]'";
    mysqli_query($conn, $i);
    header("location:adm_menu.php");

}
?>