<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='login.php';</script>";
        exit;
    }

        $id=$_SESSION["id"];
        $foto=$_SESSION["foto"];
        $nama=$_SESSION["nama"];
        $username=$_SESSION["username"];

	include "koneksi.php";
	$query = "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE stok<50";
    $sql = mysqli_query($conn, $query);
    $row = mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html>
    <title></title>
    <head>
        
    <style type="text/css">@import url(adm.css);
    .greenbutton:hover{
        background: rgb(255, 187, 0);
        color: black;
    }
    </style>
    </head>
    <body>
    <div class="kotak">
        <div class="sidebar">
            <h2>Summer cafe<br><br>
            <div><?php echo "<img src='upload/".$foto."'>" ?></div>
            <div><?php echo "<h3>".$nama."</h3>" ?></div></h2>
            
            <ul>
                <li><a href="adm_utama.php">Dashboard</a></li>
                <li><a href="adm_petugas.php">Petugas</a></li>
                <li><a href="adm_menu.php">Menu</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="header">
                <a href="logout.php"><button class="btn-logout">Logout</button></a>
            </div> 
            <div class="info">
            <div>
            <h2 style="color:#02755e; ">Selamat Datang di Halaman Petugas</h2><br>
            Selamat datang di summer cafe. Kami menyediakan banyak menu dan sajian sederhana yang dapat menggugah selera anda di musim panas ini. Semua sajian dibuat dengan resep yang terus kami perhatikan dan menyesuaikan dengan penilaian pelanggan. Bagi mahasiswa atau pelajar, tempat ini sangat cocok bukan hanya dari segi makanan dan minumannya, namun kenyamanan tempat sangat sesuai untuk tempat belajar.
            <br><br><br>

            <h2 style="color:#02755e; ">Daftar Menu</h2>
            <h3 style="font-weight:normal;">yang membutuhkan bahan-bahan segera</h3>
            
            <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Gambar Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                    <?php
                    if($row>0){
                        while($data = mysqli_fetch_array($sql)){
                            echo "<tr>";
                            echo "<td>".$data['id']."</td>";
                            echo "<td>".$data['nama_kat']."</td>";
                            echo "<td><img src='upload/".$data['gambar']."' width='120' height='auto'></td>";
                            echo "<td style='width:200px;'>".$data['nama_menu']."</td>";
                            echo "<td>Rp. ".$data['harga']."</td>";
                            echo "<td>".$data['stok']."</td>";
                        }
                    }else{
                        echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                    }
                    
                    ?>
                </table>


            </div>
        </div>
        </div>
    </div>

    </body>

    
</html>