<?php
    require "koneksi.php";

    $query = "SELECT * FROM produk";
    $result = mysqli_query($koneksi, $query);

    // Mengambil hasil query dan menyimpannya dalam array
    $produkArray = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $produkArray[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk DGW - Petani Milenial</title>
    <link rel="stylesheet" href="./filecss/produk.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.css">
</head>
<body>
    <nav class="nav">
        <h1>Petani Milenial</h1>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./produk.php">Produk</a></li>
            <li><a href="./contact.php">Contact</a></li>  
            <li><a href="./cart.php">Keranjang</a></li>  
            <li><a href="./registrasi.php"><button>Login</button></a></li>
        </ul>
       <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
       </div>
    </nav>

    <div class="judul">
        <h1>Produk DGW <br>Petani Milenial</h1>
    </div>
        
    <div class="produk">
        <?php foreach ($produkArray as $produk) : ?>
            <div class="produk1">
            <img src="./foto/<?= $produk['foto']; ?>" alt="">
                <h3><?php echo $produk['nama']; ?></h3>
                <h4>Rp. <?php echo $produk['harga']; ?></h4>
                <div class="isi" style="margin-top:20px;">
                    <a href="https://wa.me/6282145715716" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="cart.php" target="_blank"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="detail.php" target="_blank"><i class="fa-solid fa-info"></i></a>
                    <a href="<?php echo $produk['link_shopee']; ?>"><i class="fa-solid fa-store"></i></a> 
                </div>  
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>
</html>
