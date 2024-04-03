<?php
	include "koneksi.php";
?>
<!DOCTYPE html>
<html>
    <title></title>
    <head>
        
    <style type="text/css">@import url(stylemenu.css);
    .greenbutton:hover{
        background: rgb(255, 187, 0);
        color: black;
    }
    </style>
    </head>
    <body>

        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a class="active" href="menu.php">All Menus</a></li>
            <li><a href="index.php">Home</a></li>
            <li style="float: left; padding:0px;"><div class="logo"><a href="#home">Summer Cafe</a></div></li>
          </ul>
        <div class="header">
            <div class="scriptfont">Summer Cafe's Menu</div>
            <div class="bannertext">View and Order</div> 
            <br>
            <a href="index.php" style="padding:20px;" class="greenbutton">Back to Home Page</a>
        </div><br>
        
        <div class="menunya">
                <div class="judul">Summer Cafe's Menu</div><br><br>
                <button style="line-height: 2.0; border: 0;" onclick="jenis('Makanan')" class="buttonnya">Makanan</button>
                <button style="line-height: 2.0; border: 0;" onclick="jenis('Minuman')" class="buttonnya">Minuman</button>
                <button style="line-height: 2.0; border: 0;" onclick="jenis('Ice Cream')" class="buttonnya">Ice Cream</button>
                <br><br><br><br>
                
                <div id="Makanan" class="w3-container jenisnya">
                    <?php
                    $query = "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE kategori.nama_kat='Makanan' order by menu.harga";
                    $sql = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($sql);
                    if($row>0){
                        while($data = mysqli_fetch_array($sql)){
                            echo "<div class='menu-item'>";
                            echo "<div class='menuimg'>";
                            echo "<img src='upload/".$data['gambar']."'>";
                            echo "</div>";
                            echo "<div class='teks-menu'>";
                            echo "<h3><span>".$data['nama_menu']."</span>";
                            echo "<h3><strong>".$data['harga']."</strong>";
                            echo "</h3>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }else{
                        echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                    }
                    ?>
                </div>
                  
                <div id="Minuman" class="w3-container jenisnya" style="display:none">
                    <?php
                        $query = "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE kategori.nama_kat='Minuman' order by menu.harga";
                        $sql = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($sql);
                        if($row>0){
                            while($data = mysqli_fetch_array($sql)){
                                echo "<div class='menu-item'>";
                                echo "<div class='menuimg'>";
                                echo "<img src='upload/".$data['gambar']."'>";
                                echo "</div>";
                                echo "<div class='teks-menu'>";
                                echo "<h3><span>".$data['nama_menu']."</span>";
                                echo "<h3><strong>".$data['harga']."</strong>";
                                echo "</h3>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                        }
                    ?>
                </div>
                  
                <div id="Ice Cream" class="w3-container jenisnya" style="display:none">
                <?php
                    $query = "SELECT menu.*, kategori.* FROM menu JOIN kategori ON menu.id_kat=kategori.id_kat WHERE kategori.nama_kat='Ice Cream' order by menu.harga";
                    $sql = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($sql);
                    if($row>0){
                        while($data = mysqli_fetch_array($sql)){
                            echo "<div class='menu-item'>";
                            echo "<div class='menuimg'>";
                            echo "<img src='upload/".$data['gambar']."'>";
                            echo "</div>";
                            echo "<div class='teks-menu'>";
                            echo "<h3><span>".$data['nama_menu']."</span>";
                            echo "<h3><strong>".$data['harga']."</strong>";
                            echo "</h3>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }else{
                        echo "<tr><td colspan='5'>Belum ada Menu</td></tr>";
                    }
                    ?>
                </div>

        </div>


        <div style="margin:-18px; margin-bottom:-18px; margin-top:100px;" class="footer">
                copyright 2021 Shafa Salsabila (2002467) Pendidikan Ilmu Komputer 3A | Pemrograman Internet
        </div>



        
        <script>
            function jenis(namaJenis) {
              var i;
              var x = document.getElementsByClassName("jenisnya");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              document.getElementById(namaJenis).style.display = "block";  
            }
            </script>

    </body>

    
</html>