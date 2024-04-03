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
	$query = "SELECT * FROM kategori";
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
            <div class="info"><div style="text-align: left; margin-bottom:-50px;" class="head1">Tambah Menu</div>
            </div>

            <form method="POST" action="add.php" enctype="multipart/form-data" >
                    <div>
                    <label>id Menu</label><br>
                    <input class="form" type="text" name="id" autofocus="" placeholder="Masukkan ID Menu" required="" /><br><br>
                    </div>
                    <div>
                    <label>Nama Menu</label><br>
                    <input class="form" type="text" name="nama_menu" placeholder="Masukkan Nama Menu" /><br><br>
                    </div>
                    <div>
                    <label>Kategori</label><br>
                    <select class="form" name="kategori">
                        <option>Pilih Kategori Menu</option>
                        <?php
                        if($row>0){
                            while($data = mysqli_fetch_array($sql)){
                                echo '<option>'.$data['id_kat'].'-'.$data['nama_kat'].'</option>';
                            }
                        }
                        ?>
                    </select>
                    <br><br>
                    </div>
                    <div>
                    <label>Harga</label><br>
                    <input class="form" type="text" name="harga" placeholder="Masukkan Harga Menu" required="" /><br><br>
                    </div>
                    <div>
                    <label>Stok</label><br>
                    <input class="form" type="text" name="stok" placeholder="Masukkan Stok Menu" required="" /><br><br>
                    </div>
                    <div>
                    <label>Gambar Produk</label><br>
                    <input style="margin-left: 50px; margin-top:10px;" type="file" name="gambar" required="" /><br><br>
                    </div>
                    <div>
                    <a style="margin-left:50px; margin buttom:100px;" href="adm_add.php">
                    <button style="margin-bottom:100px;" class="btn-large" type="submit" name="submit">Simpan Menu</button></a>
                    </div>
            </form>
        </div>
    </div>

    </body>

    
</html>