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
     <title>Dashboard | Tokoku</title>
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
          <h3>Data Kategori</h3>
          <div class="box">
               <table border="1" cellspacing="0" class="table">
                    <thead>
                         <tr>
                              <th width="60px">No</th>
                              <th>Kategori</th>
                              <th>Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $no = 1;
                         $kategori = mysqli_query($con,"SELECT * FROM tb_category ORDER BY category_id DESC");
                         while($row = mysqli_fetch_array($kategori)){
                              ?>
                              <tr>
                                   <td><?php echo $no++?></td>
                                   <td><?php echo $row['category_name']?></td>
                                   <td>
                                        <a href="edit-kategori.php?idk=<?php echo $row['category_id']?>">Edit</a> ||
                                        <a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                                   </td>
                              </tr>
                              <?php
                         }
                         ?>
                    </tbody>
               </table>
               <p><a href="tambah-kategori.php">Tambah Data</a></p> 
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
