<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css" />
</head>
<body>


<div class="box">
    <div class="judul"><b>Login </b>Form</div>
    <br>
    <form method="post" action="cek_login.php"> 
        <input class="form" type="text" name="username" placeholder="Masukkan Nama Pengguna"><br><br>
        <input class="form" type="password" name="password" placeholder="Masukkan Nama Pengguna"><br><br>
        <button type="submit" name="btn_login">Login</button><br><br>
    </form>
    <a style="color:#ffffff; text-decoration:none;" href="index.php"><< Kembali ke Halaman Utama</a>
</div>

<?php 
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "Login gagal! username dan password salah!";
	}else if($_GET['pesan'] == "logout"){
		echo "Anda telah berhasil logout";
	}else if($_GET['pesan'] == "belum_login"){
		echo "Anda harus login untuk mengakses halaman admin";
	}
}
?>

</body>
</html>