<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk | Tokoku</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        
        .product-card {
            border: none;
            background-color: #f8f9fa;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-5">Daftar Produk</h1>
    <div class="row">
        <?php
       
        $query = "SELECT tb_product.*, tb_category.category_name FROM tb_product 
                  LEFT JOIN tb_category ON tb_product.category_id = tb_category.category_id";
        $result = mysqli_query($con, $query);

      
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card product-card">
                        <img src="produk/<?php echo $row['product_image']; ?>" alt="Gambar Produk" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                            <p class="card-text">Kategori: <?php echo $row['category_name']; ?></p>
                            <p class="card-text">Harga: Rp <?php echo number_format($row['product_price']); ?></p>
                            <p class="card-text">Deskripsi: <?php echo $row['product_description']; ?></p>
                            <p class="card-text">Status: <?php echo ($row['product_status'] == 0 ? 'tidak tersedia' : 'tersedia'); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col"><p class="text-center">Tidak ada data produk.</p></div>';
        }
        ?>
    </div>
</div>


<div class="container text-center mt-3">
    <a href="login.php" class="btn btn-primary">Kembali ke Halaman Login</a>
</div>

</body>
</html>
