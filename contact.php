<?php
require "koneksi.php";
session_start();


// Memproses formulir pengiriman pesan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Menyimpan data ke dalam tabel contact
    $sql = "INSERT INTO contact (nama, email, komentar) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesan berhasil terkirim";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./filecss/contact.css">
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
            <div class="content">
                <h2>Contact Us</h2>
                <p>Berikan Komentar anda atau hubungi contact kami.</p>
            </div>
            <div class="container">
                <div class="contactinfo">
                    <div class="box">
                        <span class="fa-solid fa-location-dot"></span>
                        <span class="text">Jl. Agung Karya Vi Blok A Kav No. 7, Tanjung Priok, Jakarta Utara, Jakarta, Indonesia, Jakarta</span>
                    </div>
                    <div class="box">
                        <span class="fa-solid fa-phone"></span>
                        <span class="text">+81 197-61-1112</span>
                    </div>
                    <div class="box">
                        <span class="fa-solid fa-envelope"></span>
                        <span class="text">contact@dgw.co.id</span>
                    </div>
                </div>
                <div class="contactForm">
                    <form action="" method="post">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="nama" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea name="pesan" required="required"></textarea>
                            <span>Type your Message...</span>
                        </div>
                        <div class="inputBox">
                            <input type="submit" name="kirim" value="Send">
                        </div>
                    </form>

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
        </script>
    </body>
</php>