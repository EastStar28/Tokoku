<?php
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
     echo'<script>window.location="login.php"</script>';
}

$query = mysqli_query($con, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");

$d = mysqli_fetch_object($query);
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
     <h3>profil</h3>
     <div class="box">
          <form action="" method="POST">
               <input type="text" name="nama" placeholder="nama lengkap" class="input-control" value="<?php echo $d->admin_name; ?>" required>
               <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username; ?>" required> <!-- Perbaikan disini -->
               <input type="text" name="hp" placeholder="No hp" class="input-control" value="<?php echo $d->admin_telp; ?>" required> <!-- Perbaikan disini -->
               <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email; ?>" required> <!-- Perbaikan disini -->
               <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address; ?>" required> <!-- Perbaikan disini -->
               <input type="submit" name="submit" value ="ubah profil" class="btn">
          </form>

          <?php
          if(isset($_POST['submit'])){

               $nama     = ucwords($_POST['nama']);
               $user     = $_POST['user'];
               $hp       = $_POST['hp'];
               $email    = $_POST['email'];
               $alamat   = ucwords($_POST['alamat']) ;
               
               $update = mysqli_query($con,"UPDATE tb_admin SET
                                  admin_name = '".$nama."',
                                  username = '".$user."',
                                  admin_telp = '".$hp."',
                                  admin_email = '".$email."',
                                  admin_address= '".$alamat."'
                                  WHERE admin_id = '".$d->admin_id."'");

                         if($update){
                              echo'<script>alert("ubah data berhasil")</script>';
                              echo'<script>window.location="profil.php"</script>';
                         }else{
                              echo 'gagal'.mysqli_error($con);

                         
                         }
          }
          ?>
     </div>

     <h3>ubah pasword</h3>
     <div class="box">
          <form action="" method="POST">
               <input type="password" name="pass1" placeholder="password baru" class="input-control"  required>
               <input type="password" name="pass2" placeholder="konfirmasi password" class="input-control"  required> <!-- Perbaikan disini -->
               <input type="submit" name="ubah_password" value ="ubah pasword" class="btn">
          </form>

          <?php
          if(isset($_POST['ubah_password'])){

               $pass1    = $_POST['pass1'];
               $pass2    = $_POST['pass2'];

               if($pass2 != $pass1){
                    echo '<script>alert("Konfirmasi password tidak sesuai")</script>';
                } else {
                    $u_pass = mysqli_query($con, "UPDATE tb_admin SET password = '".MD5($pass1)."' WHERE admin_id = '".$d->admin_id."'");

                    if($u_pass){
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo 'Gagal: ' . mysqli_error($con);
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
