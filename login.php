<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login | tokoku</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
     <style>
          body {
               background-color: #f3f4f6;
               font-family: 'Open Sans', sans-serif;
          }
          .box-login {
               background-color: #fff;
               border-radius: 8px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
               padding: 20px;
               width: 300px;
               margin: 100px auto;
               display: flex;
               flex-direction: column;
               align-items: center;
          }
          .box-login h2 {
               margin-bottom: 20px;
               text-align: center;
          }
          .input-control {
               width: 100%;
               padding: 10px;
               margin-bottom: 10px;
               border: 1px solid #ccc;
               border-radius: 4px;
               box-sizing: border-box;
          }
          .btn-container {
               width: 100%;
               display: flex;
               justify-content: space-between;
          }
          .btn {
               padding: 10px;
               background-color: #4CAF50;
               color: white;
               border: none;
               border-radius: 4px;
               cursor: pointer;
               font-size: 16px;
          }
          .btn:hover {
               background-color: #45a049;
          }
          .note {
               margin-top: 20px;
               text-align: center;
               font-size: 14px;
               color: #888;
          }
     </style>
</head>
<body>
     <div class ="box-login">
          <h2>Login</h2>
          <form action="" method="POST">
               <input type="text" name="user" placeholder="Username" class="input-control"><br>
               <input type="password" name="pass" placeholder="Password" class="input-control"><br>
               <div class="btn-container">
                    <input type="submit" name="submit" value="Login" class="btn">
                    <a href="beranda-user.php" class="btn">Galeri Produk</a>
               </div>
          </form>
          <div class="note">Catatan: Khusus untuk admin, harus login terlebih dahulu.</div>
          <?php
session_start();

if(isset($_POST['submit'])){
    include 'db.php'; 
    $user = mysqli_real_escape_string($con , $_POST['user']);
    $pass = mysqli_real_escape_string($con , $_POST['pass']);

    
    $query = "SELECT * FROM tb_admin WHERE username = ? AND password = MD5(?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $d = $result->fetch_object();
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo '<script>alert("Username atau Password Salah")</script>';
    }
    
}

?>
     </div>
</body>
</html>
       