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
	$query = "SELECT * FROM petugas order by id";
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
            <div class="info"><div style="text-align: left;" class="head1">Daftar Petugas</div><br>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                    </tr>
                    <?php
                    if($row>0){
                        while($data = mysqli_fetch_array($sql)){
                            echo "<tr>";
                            echo "<td>".$data['id']."</td>";
                            echo "<td><img src='upload/".$data['foto']."' width='120' height='auto'></td>";
                            echo "<td>".$data['nama']."</td>";
                            echo "<td>".$data['username']."</td>";
                        }
                    }else{
                        echo "<tr><td colspan='5'>Belum ada data gambar</td></tr>";
                    }
                    
                    ?>
                </table>
            </div>
        </div>
    </div>

    </body>

    
</html>