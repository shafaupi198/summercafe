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
	$query = mysqli_query($conn, "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE id='".$_GET["id"]."'");
    if ($data = mysqli_fetch_array($query)){
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
            <div class="info"><div style="text-align: left; margin-bottom:-50px;" class="head1">Update Menu</div>
            </div>

            <form method="POST" action="edit.php?id=<?php echo $data['id']; ?>" enctype="multipart/form-data" >
                    <div>
                    <label>id Menu</label><br>
                    <input class="form" type="text" name="id" value="<?php echo $data['id']; ?>" autofocus="" required="" /><br><br>
                    </div>
                    <div>
                    <label>Kategori</label><br>
                    <select class="form" name="kategori">
                        <?php
                            if ($data['id_kat'] == "K001") echo "<option value='K001' selected>K001 - Makanan</option>";
                            else echo "<option value='K001'>K001 - Makanan</option>";
                            if ($data['id_kat'] == "K002") echo "<option value='K002' selected>K002 - Minuman</option>";
                            else echo "<option value='K002'>K002 - Minuman</option>";
                            if ($data['id_kat'] == "K003") echo "<option value='K003' selected>K003 - Ice Cream</option>";
                            else echo "<option value='K003'>K003 - Ice Cream</option>";
                       ?>
                    </select>
                    </div>
                    <div>
                    <label>Nama Menu</label><br>
                    <input class="form" type="text" name="nama_menu" value="<?php echo $data['nama_menu']; ?>" /><br><br>
                    </div>
                    <div>
                    <label>Harga</label><br>
                    <input class="form" type="text" name="harga" value="<?php echo $data['harga']; ?>" required="" /><br><br>
                    </div>
                    <div>
                    <label>Stok</label><br>
                    <input class="form" type="text" name="stok" value="<?php echo $data['stok']; ?>" required="" /><br><br>
                    </div>
                    <div>
                    <label>Gambar Produk</label><br>
                    <img src="upload/<?php echo $data['gambar']; ?>" style="margin-top:10px; margin-left:50px; width: 230px;float: left;margin-bottom: 5px;">
                    <br>
                    <input style="margin-left: 50px; margin-top:10px;" type="file" name="gambar" value="<?php echo $data['gambar']?>" required="" />
                    <br><br>
                    </div>
                    <div>
                    <a style="margin-left:50px; margin buttom:100px;">
                    <button style="margin-bottom:100px;" class="btn-large" type="submit" name="submit">Edit Menu</button></a>
                    </div>
            </form>
        </div>
    </div>

    </body>
    <?php
        } else echo "Data tidak ditemukan";
?>
    
</html>