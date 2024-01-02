

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
            <li><a href="./cart.php">Keranjang</a></li>   
            <li><a href="registrasi.php"><button>Login</button></a></li>
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
        <input type="text" name="fname">
        </label>
        <label>
        <span class="lname">Nama Akhir <span class="required">*</span></span>
        <input type="text" name="lname">
        </label>
        <label>
        <span>Alamat <span class="required">*</span></span>
        <input type="text" name="houseadd" placeholder="House number and street name" required>
        </label>
        <label>
        <span>&nbsp;</span>
        <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
        </label>
        <label>
        <span>Kode Pos <span class="required">*</span></span>
        <input type="text" name="city"> 
        </label>
        <label>
        <span>Telp <span class="required">*</span></span>
        <input type="tel" name="city"> 
        </label>
        <label>
        <span>Email Address <span class="required">*</span></span>
        <input type="email" name="city"> 
        </label>
    </form>
    <div class="Yorder">
        <table>
        <tr>
            <th colspan="2">Pesanan</th>
        </tr>
        <tr>
            <td>Product Name x 2(Qty)</td>
            <td>Rp. 15000</td>
        </tr>
        <tr>
            <td>Subtotal</td>
            <td>Rp. 15000</td>
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
