<?php
session_start();

$cartItems = [];

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cartItems = $_SESSION['cart'];
}

$subtotal = 0;
foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Petani Milenial</title>
    <link rel="stylesheet" href="./filecss/checkout.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.css">
</head>

<body>
    <nav class="nav">
        <h1>Petani Milenial</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="contact.php">Contact</a></li>
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



    <div class="container">
        <div class="title">
            <h2>Checkout</h2>
        </div>
        <div class="d-flex">
            <form action="" method="">
                <label>
                    <span class="fname">Nama Awal <span class="required">*</span></span>
                    <input type="text" name="fname" placeholder="Masukkan Nama Awal">
                </label>
                <label>
                    <span class="lname">Nama Akhir <span class="required">*</span></span>
                    <input type="text" name="lname" placeholder="Masukkan Nama Akhir">
                </label>
                <label>
                    <span>Alamat <span class="required">*</span></span>
                    <input type="text" name="houseadd" placeholder="Alamat 1" required>
                </label>
                <label>
                    <span>&nbsp;</span>
                    <input type="text" name="apartment" placeholder="Alamat 2">
                </label>
                <label>
                    <span>Kode Pos <span class="required">*</span></span>
                    <input type="text" name="kota" placeholder="Masukkan Kode Pos">
                </label>
                <label>
                    <span>Telp <span class="required">*</span></span>
                    <input type="tel" name="telp" placeholder="Masukkan No Telp">
                </label>
                <label>
                    <span>Email Address <span class="required">*</span></span>
                    <input type="email" name="email" placeholder="Masukkan Alamat Email">
                </label>
            </form>
            <div class="Yorder">
                <table>
                    <tr>
                        <th colspan="2">Pesanan</th>
                    </tr>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item['name']; ?> x <?php echo $item['quantity']; ?>(Qty)</td>
                            <td>Rp. <?php echo $item['price'] * $item['quantity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rp. <?php echo $subtotal; ?></td>
                    </tr>
                </table><br>
                <div>
                    <input type="radio" name="dbt" value="dbt" checked> Bank Transfer
                </div>
                <div>
                    <input type="radio" name="dbt" value="cd"> Cash on Delivery
                </div>
                <div>
                    <input type="radio" name="dbt" value="cd"> Paypal <span>
                        <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
                    </span>
                </div>
                <button type="button" style="padding:10px;">Place Order</button>
            </div><!-- Yorder -->
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>