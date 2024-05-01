<?php
session_start();
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
<body >
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
     <h3>Dashboard</h3>
     <div class="box">
          <h4>selamat datang <?php echo $_SESSION['a_global']->admin_name ?> di tokoku</h4>
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
