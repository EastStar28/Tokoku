<?php
session_start();
include 'db.php'; 
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
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<!---header-->
<header>
     <div class="container">
          <h1><a href="dashboard.php" style="text-decoration: none; color: black;">tokoku</a></h1>
          <ul>
               <li><a href="dashboard.php" style="text-decoration: none; color: black;">Dashboard</a></li>
               <li><a href="profil.php" style="text-decoration: none; color: black;">profil</a></li>
               <li><a href="data-kategori.php" style="text-decoration: none; color: black;">Data Kategori </a></li>
               <li><a href="data-produk.php" style="text-decoration: none; color: black;">Data Produk</a></li>
               <li><a href="keluar.php" style="text-decoration: none; color: black;">keluar</a></li>
          </ul>
     </div>
</header>
<!----conten--->
<div class="section">
     <div class="container">
          <h3> Data produk</h3>
          <div class="box">
               <table border="1" cellspacing="0" class="table">
                    <thead>
                         <tr>
                              <th width="60px">No</th>
                              <th>Kategori</th>
                              <th>Nama Produk</th>
                              <th>Harga</th>
                              <th>Deskripsi</th>
                              <th>Gambar</th>
                              <th>Status</th>
                              <th>Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $no = 1;
                         $produk = mysqli_query($con,"SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                         if(mysqli_num_rows($produk)>0){
                              while($row = mysqli_fetch_array($produk)){
                         ?>
                         <tr>
                              <td><?php echo $no++?></td>
                              <td><?php echo $row['category_name']?></td>
                              <td><?php echo $row['product_name']?></td>
                              <td>rp<?php echo number_format($row['product_price']) ?></td>
                              <td><?php echo $row['product_description']?></td>
                              <td><img src="produk/<?php echo $row['product_image']; ?>" width= "100px"></td>
                              <td><?php echo ($row['product_status'] == 0) ? 'tidak tersedia' : 'tersedia'; ?></td>
                              <td>
                                   <a href="edit-produk.php?id=<?php echo $row['product_id']?>" class="btn btn-sm btn-info">Edit</a> ||
                                   <a href="proses-hapus.php?idp=<?php echo $row['product_id']?>" class="btn btn-sm btn-danger" onclick="return confirm('yakin')">Hapus</a>
                              </td>
                         </tr>
                         <?php } ?>
                         <?php } else { ?>
                         <tr>
                              <td colspan="8">Tidak ada data</td>
                         </tr>
                         <?php } ?>
                    </tbody>
               </table>
               
               
               <div class="text-center">
                    <a href="tambah-produk.php" class="btn btn-primary">Tambah Data</a>
               </div>
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
