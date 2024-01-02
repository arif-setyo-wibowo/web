<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./filecss/style.css">
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

    <!-- <video src="https://youtu.be/bGmeyJ3IQNw?si=oa2nE791vYa7p67n"></video> -->
    <div class="isi">
        <div class="gambar">
            <img src="./foto/petani.jpg" alt="" width="600px">
        </div>

        <div class="kata">
            <h2 class="j2">Sukses Bersama Petani!</h2>
            <p class="pt">
                PT. Dharma Guna Wibawa didirikan pada tahun 2001 untuk menjawab berbagai tantangan pertanian di Indonesia. DGW Group berkomitmen untuk terus berkontribusi membantu memajukan pertanian di Indonesia serta memberikan dampak sosial positif bagi masyarakat Indonesia. Melalui produk-produk unggulan pertanian yang lengkap, seperti pestisida, pupuk, benih tanaman hingga sprayer dan mulsa.
            </p>
        </div>

        <div class="produk"></div>
        <div class="danke">
            <img src="./foto/danke.jpg" alt="">
            <p>
                Dangke merupakan sebuah insektisida yang bekerja secara kontak dan sistemik yang berbentuk tepung berwarna putih yang disuspensikan untuk mengendalikan bermacam macam hama pada tanaman seperti bawang merah, kedelai, cabai, kacang panjang, kakao, tomat, kacang hijau, kubis dan kelapa sawit.
            </p>
        </div>

        <div class="corona">
            <img src="./foto/corona.jpg" alt="" width="300px">
            <p>
                Corona berfungsi untuk mengendalikan penyakit pada tanaman bawang merah, mangga, jagung, cabai dan padi yang menumpas cendawan atau jamur yang biasa tumbuh di daun, akar, batang.
            </p>
            <div class="lihat">
                <a href="./produk.php">
                    <h3>Lihat Bebih Banyak -></h3>
                </a>
            </div>
        </div>
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