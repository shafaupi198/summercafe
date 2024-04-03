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
	$query = "SELECT menu.*, kategori.* FROM menu, kategori WHERE menu.id_kat=kategori.id_kat order by menu.id DESC";
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
            <div class="info"><div style="text-align: left;" class="head1">Daftar Menu</div><br>
                <table style="width: 100%;">
                    <tr>
                        <th style="float:left"><a href="adm_add.php">
                            <button class="btn-large">Tambah Menu</button></a>
                            </th>
                        <th><form method="post" style="float:right;">
                                <input type="text" class="search-box" name="cari" placeholder="Cari Menu...">&ensp;
                                <button class="btn-small" name="btn_cari">Cari</button>
                            </form></th>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Gambar Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if(isset($_POST['btn_cari'])){
                        if($_POST['cari']!=""){
                            $spec = "%".$_POST['cari']."%";
                            $query = "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE menu.id LIKE '%".$_POST['cari']."%'
                            OR kategori.nama_kat LIKE '%".$_POST['cari']."%' OR menu.gambar LIKE '%".$_POST['cari']."%' OR menu.nama_menu LIKE '%".$_POST['cari']."%'
                            OR menu.harga LIKE '%".$_POST['cari']."%' OR menu.stok LIKE '%".$_POST['cari']."%' order by menu.id";
                            $sql = mysqli_query($conn, $query);
                            $row = mysqli_num_rows($sql);
                        }
                    }
                    if($row>0){
                        while($data = mysqli_fetch_array($sql)){
                            echo "<tr>";
                            echo "<td>".$data['id']."</td>";
                            echo "<td>".$data['nama_kat']."</td>";
                            echo "<td><img src='upload/".$data['gambar']."' width='120' height='auto'></td>";
                            echo "<td style='width:200px;'>".$data['nama_menu']."</td>";
                            echo "<td>Rp. ".$data['harga']."</td>";
                            echo "<td>".$data['stok']."</td>";
                            //<a href = 'formupdate.php?nim=".$data['nim']."'>
                            echo "<td><a href ='adm_edit.php?id=".$data['id']."' name='submit'><button class='btn-small'>Edit</button></a>
                                        &ensp;&ensp;
                                        <a href ='delete.php?id=".$data['id']."' name='delete'><button class='btn-small'>Delete</button></a>
                            <td>";
                        }
                    }else{
                        echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                    }
                    
                    ?>
                </table>
            </div>
        </div>
    </div>

    </body>

    
</html>