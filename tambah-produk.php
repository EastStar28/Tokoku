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
     <h3>produk</h3>
     <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
               <select class="input-control" name="kategori" required>
                    <option value="">--pilih--</option>

                    <?php
                    $kategori = mysqli_query($con, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while($r = mysqli_fetch_array($kategori)){ ?>
                         <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name'];?></option>

                    <?php } ?>
               </select>
               
               <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
               <input type="text" name="harga" class="input-control" placeholder="harga" required>
               <textarea class=" input-control" name="deskripsi" placeholder="deskripsi"></textarea>
               <select class= "inout-control" name="status">
                    <option value="">-----pilih----</option>
                    <option value="1">-----ada----</option>
                    <option value="0">-----tidak ada----</option>
               </select>
               <input type="file" name="gambar" class="input-control"  required>
               

               <input type="submit" name="submit" value ="ubah" class="btn">
          </form>
          
          <?php
         if(isset($_POST['submit'])){
          //print_r($_FILES['gambar']);
      
          $kategori  = $_POST['kategori'];
          $nama      = $_POST['nama'];
          $harga     = $_POST['harga'];
          $deskripsi = $_POST['deskripsi']; 
          $status    = $_POST['status'];    
      
         
          if(isset($_FILES['gambar'])) {
               $filename = $_FILES['gambar']['name'];
               $tmp_name = $_FILES['gambar']['tmp_name'];
           
               $type1 = explode('.',  $filename);
               $type2 = $type1[1];

               $newname = 'produk'.time().'.'.$type2;
           
               $tipe_diizinkan = array('jpg' , 'jpeg' , 'png' , 'gif');
           
               if(!in_array($type2,$tipe_diizinkan)){
                    echo '<script> alert("file tidak sesuai") </script>';

               } else {

                   move_uploaded_file($tmp_name, './produk/'. $newname);

                   $insert = mysqli_query($con, "INSERT INTO tb_product VALUES(
                              null,
                              '". $kategori."',
                               '". $nama."',
                               '". $harga."',
                               '". $deskripsi."',
                               '". $newname."',
                               '". $status."',
                              null
                                   )");

                         if($insert){
                              echo 'berhasil mengupload gambar';
                         }else{
                              echo 'gagal' .mysqli_error($con);
                         }
               }
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
