<?php
require "koneksi.php";
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "SELECT * FROM produk WHERE id = $productId";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productName = $row["nama"];
        $productPrice = $row["harga"];
        $productDescription = $row["keterangan"];
        $foto = $row["foto"];
        $link_shopee = $row["link_shopee"];
    } else {
        echo "Produk tidak ditemukan";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./filecss/detail.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.css">

</head>

<body>
    <nav class="nav">
        <h1>Petani Milenial</h1>

        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./produk.php">Produk</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <?php if (empty($_SESSION['nama'])) : ?>
                <li><a href="./registrasi.php"><button>Login</button></a></li>
            <?php else : ?>
                <li><a href="./cart.php">Keranjang</a></li>
                <li><a href="./logout.php"><button>Logout</button></a></li>
            <?php endif; ?>
        </ul>

        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section class="contact">
        <a href="produk.php">
            <button style="color:white; background-color:green; padding:5px; border-radius:5px; float:left;">Kembali</button>
        </a>
        <div class="container">

            <div class="contactForm">
                <div class="inputBox">
                    <img src="./foto/<?= $foto ?>" style="width:150px;" alt="">
                    <h3><?php echo $productName; ?></h3>
                    <h4>Rp. <?php echo $productPrice; ?></h4>
                    <p><?php echo $productDescription; ?></p>
                    <a href="https://wa.me/6282145715716" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <?php if (empty($_SESSION['nama'])) : ?>
                        <a href="javascript:void(0);" onclick="alert('Harap Login Terlebih Dahulu')"><i class="fa-solid fa-cart-shopping"></i></a>
                    <?php else : ?>
                        <a href="javascript:void(0);" onclick="addToCart('<?= $produk['id']; ?>', '<?= $produk['nama']; ?>', '<?= $produk['harga']; ?>')"><i class="fa-solid fa-cart-shopping"></i></a>
                    <?php endif; ?>
                    <a href="<?= $link_shopee ?>"><i class="fa-solid fas fa-store"></i></a>
                </div>
            </div>
        </div>
    </section>

    </footer>
    <div class="copy">
        <small>DGW&copy; Dharma Guna Wibawa.</small>
    </div>
    </footer>

    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });

        function addToCart(product_id, product_name, product_price) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert("Produk telah ditambahkan ke keranjang!");
                }
            };
            xhttp.open("POST", "addToCart.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("product_id=" + product_id + "&product_name=" + product_name + "&product_price=" + product_price);
        }
    </script>
</body>
</php>