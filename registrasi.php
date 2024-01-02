<?php
require "koneksi.php";
function connectDB() {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "presentasikarya";
    $conn = new mysqli($server, $username, $password, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}

// Proses registrasi dan login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = connectDB();

    if (isset($_POST['login'])) {
        // Proses login
        $nama = $_POST['nama'];
        $password = $_POST['password'];



        if (isset($_POST["nama"]) && isset($_POST["password"])) {
            $sql = "SELECT * FROM daftar WHERE nama = '$nama'";
            $result = mysqli_query($conn, $sql);
            $hasil = $result->fetch_assoc();
          
            if (mysqli_num_rows($result) == 1) {
              if (password_verify($password, $hasil['password'])) {
                echo  "Login berhasil";
                header("Location: index.php");
              } else {
                echo  "Password Salah !";
              }
            } else {
              echo "Nama Tidak Ditemukan !";
            }
          }
    } elseif (isset($_POST['daftar'])) {
        // Proses pendaftaran
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
        $stmt = $conn->prepare("INSERT INTO daftar (nama, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $password);

    
        if ($stmt->execute()) {
            echo "Pendaftaran berhasil";
            header("Location: index.php");
        } else {
            echo "Error: " . $stmt->error;
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
            <li><a href="./registrasi.php"><button>Login</button></a></li>
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
