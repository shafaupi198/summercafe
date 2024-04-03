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
        //This function is used for uploading image on the directory which you create on project root directory
        move_uploaded_file($_FILES['gambar']['tmp_name'], "upload/" . $_FILES['gambar']['name']);
        $img = $_FILES['gambar']['name'];
    }
    //This is insertion query of mysql
    $i = "insert into menu(id,id_kat,gambar,nama_menu,harga,stok) 
            value('$fid','$fkat','$img','$fnama','$fharga','$fstok')";
    header("location:adm_menu.php");
 
  //On extend version of mysql, mysqli takes two parameters where First is connection variable and second is query variable
  mysqli_query($conn, $i);
}
?>