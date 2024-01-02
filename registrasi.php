<?php
require "koneksi.php";
session_start();

function connectDB()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "presentasikarya";
    $conn = new mysqli($server, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB();

    if (isset($_POST['login'])) {
        $nama = $_POST['nama'];
        $password = $_POST['password'];

        if (!empty($nama) && !empty($password)) {
            $sql = "SELECT * FROM daftar WHERE nama = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $nama);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['nama'] = "bowo";
                    $_SESSION['email'] = $row['email'];
                    redirect("index.php");
                } else {
                    echo  "Password Salah !";
                }
            } else {
                echo "Nama Tidak Ditemukan !";
            }
        }
    } elseif (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO daftar (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nama, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "Pendaftaran berhasil. Silakan login.";
            redirect("registrasi.php");
        } else {
            echo "Error saat melakukan pendaftaran: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi dan Login</title>
    <link rel="stylesheet" href="./filecss/login.css">
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

    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Form Login</header>
            <form action="" method="post">
                <input type="text" placeholder="Masukan nama" name="nama">
                <input type="password" placeholder="Masukan Password" name="password">
                <input type="submit" value="Login" class="button" name="login">
            </form>
            <div class="signup">
                <span>Belum punya akun? <a href="#" id="daftarLink">Daftar</a></span>
            </div>
        </div>
        <div class="registration form" id="registrationForm">
            <header>Form Registrasi</header>
            <form action="" method="post">
                <input type="text" placeholder="Nama" name="nama">
                <input type="text" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Daftar" class="button" name="daftar">
            </form>
            <div class="signup">
                <span>Sudah punya akun? <a href="#" id="loginLink">Login</a></span>
            </div>
        </div>
    </div>

    <script>
        var daftarLink = document.getElementById("daftarLink");
        var loginLink = document.getElementById("loginLink");
        var registrationForm = document.getElementById("registrationForm");
        var loginForm = document.querySelector('.login.form');

        daftarLink.addEventListener("click", function() {
            loginForm.style.display = "none";
            registrationForm.style.display = "block";
        });

        loginLink.addEventListener("click", function() {
            loginForm.style.display = "block";
            registrationForm.style.display = "none";
        });
    </script>

    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>

</html>