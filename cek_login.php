<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn,"SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $cek = mysqli_fetch_array($data);

    //if($cek['username'] == $username AND $cek['password'] == $password){
        if($cek['username'] == $username AND $cek['password'] == $password){
        //$cek = mysqli_fetch_assoc($hasil);
        $_SESSION['id'] = $cek['id'];
        $_SESSION['foto'] = $cek['foto'];
        $_SESSION['nama'] = $cek['nama'];
        $_SESSION['username'] = $cek['username'];
        $_SESSION['password'] = $cek['password'];
        header("location:adm_utama.php");
    }else{
        echo "<script>alert('Username atau Password Admin tidak benar !!!');</script>";
        echo "<script>location='login.php';</script>";
    }
?>