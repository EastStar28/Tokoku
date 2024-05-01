<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
     echo'<script>window.location="login.php"</script>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>dashboard</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<!---header-->
<header>
     <div class="container">
     <h1><a href="dashboard.php">tokoku</a></h1>
     <ul>
          <li> <a href="dashboard.php">Dashboard</a></li>
          <li> <a href="profil.php">profil</a></li>
          <li> <a href="data-kategori.php">Data Kategori </a></li>
          <li> <a href="data-produk.php">Data Produk</a></li>
          <li> <a href="keluar.php">keluar</a></li>
     </ul>
     </div>
</header>
  <!----conten--->
  <div class="section">
  <div class="container">
     <h3>tambah kategori</h3>
     <div class="box">
          <form action="" method="POST">
               <input type="text" name="nama" placeholder="nama kategori" class="input-control" required>
               <input type="submit" name="submit" value ="ubah" class="btn">
          </form>
          <?php
          if(isset($_POST['submit'])){
               $nama = ucwords($_POST['nama']);

               $insert = mysqli_query($con, "INSERT INTO tb_category VALUE(

                                   null,
                                   '".$nama."'  )");

                    if($insert){
                         echo '<script>alert("tambah data berhasil")</script>';
                         echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                         echo'gagal' .mysqli_error($con);
                    }
                    

          }
          ?>

         
     </div>

     
  </div>
  </div>
  <footer>
     <div class="container">
          <small>CopyRight &copy; 2024 - tokoku</small>
     </div>
  </footer>
</body>
</html>
