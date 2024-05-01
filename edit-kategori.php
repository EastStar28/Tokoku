<?php
session_start();
include 'db.php';


if($_SESSION['status_login'] != true){
     echo'<script>window.location="login.php"</script>';
}


if(isset($_GET['idk'])) {
     
     $kategori = mysqli_query($con, "SELECT * FROM tb_category WHERE category_id = '".$_GET['idk']."'");
     if(mysqli_num_rows($kategori) == 0 ){
          echo'<script>window.location="data-kategori.php"</script>';
     }

     $k = mysqli_fetch_object($kategori);
} else {
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Data Kategori | Tokoku</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Header -->
<header>
     <div class="container">
          <h1><a href="dashboard.php">Tokoku</a></h1>
          <ul>
               <li><a href="dashboard.php">Dashboard</a></li>
               <li><a href="profil.php">Profil</a></li>
               <li><a href="data-kategori.php">Data Kategori</a></li>
               <li><a href="data-produk.php">Data Produk</a></li>
               <li><a href="keluar.php">Keluar</a></li>
          </ul>
     </div>
</header>
<!-- Content -->
<div class="section">
     <div class="container">
          <h3>Edit Data Kategori</h3>
          <div class="box">
               <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name?>" required>
                    <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
               </form>
               <?php
               
               if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']);

                    
                    $update = mysqli_query($con,"UPDATE tb_category SET category_name = '".$nama."' WHERE category_id = '".$k->category_id."' ");
                    if($update){
                         echo '<script>alert("Edit data berhasil")</script>';
                         echo '<script>window.location="data-kategori.php"</script>';
                    } else {
                         echo 'Gagal mengedit data: ' . mysqli_error($con);
                    }
               }
               ?>
          </div>
     </div>
</div>
<!-- Footer -->
<footer>
     <div class="container">
          <small>&copy; 2024 Tokoku</small>
     </div>
</footer>
</body>
</html>
