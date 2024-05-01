<?php
include 'db.php';

if(isset($_GET['idk'])){
    $delete = mysqli_query($con, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
    echo '<script>window.location="data-kategori.php"</script>';
}

if(isset($_GET['idp'])){
  
    $delete_produk = mysqli_query($con, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."'");
    if($delete_produk){
        
        $produk = mysqli_query($con, "SELECT * FROM tb_product WHERE product_id = '".$_GET['idp']."'");
        $p = mysqli_fetch_object($produk);
        $product_image = $p->product_image;

        
        $file_path = './produk/' . $product_image;
        if(file_exists($file_path)){
            unlink($file_path);
        }

       
        echo '<script>window.location="data-produk.php"</script>';
    } else {
        
        echo '<script>alert("Gagal menghapus produk")</script>';
        echo '<script>window.location="data-produk.php"</script>';
    }
}
?>
