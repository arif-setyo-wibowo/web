<!DOCTYPE php>
<php lang="en">
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

    <section class="contact">
        <a href="produk.php">
                <button style="color:white; background-color:green; padding:5px; border-radius:5px; float:left;">Kembali</button>
            </a>
        <div class="container">
            
            <div class="contactForm">
                
                <div class="inputBox">
                    <img src="./foto/danke.jpg" style="width:150px;" alt="">
                    <h3>nama produk</h3>
                    <h4>Rp. 7000</h4>
                    <p>deskripsi</p>
                    <a href="https://wa.me/6282145715716" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="cart.php" target="_blank"><i class="fa-solid fa-cart-shopping"></i></a> 
                    <a href="shoppe"> <i class="fa-solid fa-store"></i></a> 
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
    </script>
</body>
</php>