<?php
session_start();

$cartItems = [];

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cartItems = $_SESSION['cart'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Produk - Petani Milenial</title>
    <link rel="stylesheet" href="./filecss/cart.css">
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

    <div class="judul">
        <h1>Manage Products</h1>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($cartItems) > 0) : ?>
                <?php $no = 1;
                foreach ($cartItems as $item) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td>
                            <a href='updateQuantity.php?id=<?php echo $item['id']; ?>&action=decrease'><button style='padding:5px;'>-</button></a>
                            <span><?php echo $item['quantity']; ?></span>
                            <a href='updateQuantity.php?id=<?php echo $item['id']; ?>&action=increase'><button style='padding:5px;'>+</button></a>
                        </td>
                        <td>
                            <a href='removeFromCart.php?id=<?php echo $item['id']; ?>'><button style="color:white; background-color:red; padding:5px; border-radius:5px;">Hapus</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Keranjang Kosong</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <?php if (count($cartItems) > 0) : ?>
                    <a href="checkout.php">
                        <button style="color:white; background-color:green; padding:5px; border-radius:5px;">Pembayaran</button>
                    </a>
                <?php endif ?>
            </td>
        </tfoot>
    </table>

    <script src="script.js"></script>
</body>

</html>