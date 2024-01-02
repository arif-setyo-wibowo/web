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
            <li><a href="cart.php">Keranjang</a></li>   
            <li><a href="registrasi.php"><button>Login</button></a></li>
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
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Es</td>
                <td>15000</td>
                <td>img</td>
                <td>    
                    <a href="#" >
                        <button style="padding:5px;">-</button>
                    </a>
                    <span id="">5</span>
                    <a href="#" >
                        <button style="padding:5px;">+</button>
                    </a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="checkout.php">
                    <button style="color:white; background-color:green; padding:5px; border-radius:5px;">Pembayaran</button>
                </a>
            </td>
        </tfoot>
    </table>

    <script src="script.js"></script>
</body>
</html>
