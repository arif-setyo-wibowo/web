<?php
    require "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $link_shopee = $_POST['link_shopee'];

        // Proses file upload
        $foto = $_FILES['foto'];
        $upload_dir = "foto/";

        // Dapatkan ekstensi file
        $file_extension = pathinfo($foto['name'], PATHINFO_EXTENSION);

        // Bangun nama file yang unik dengan menggabungkan nama produk dan ekstensi file
        $file_name = $nama . "_" . time() . "." . $file_extension;

        // Tentukan path file tujuan
        $upload_file = $upload_dir . $file_name; 

        // Pindahkan file dari temp folder ke folder yang ditentukan
        move_uploaded_file($foto['tmp_name'], $upload_file);


        $query = "INSERT INTO produk (nama, harga, keterangan, link_shopee, foto) VALUES ('$nama', '$harga', '$keterangan', '$link_shopee', '$file_name')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: produk.php");
            exit();
        } else {
            echo "Gagal menyimpan data ke database.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Petani Milenial</title>
    <link rel="stylesheet" href="./filecss/addproduk.css">
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

    <div class="judul">
        <h1>Manage Products</h1>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Link Shopee</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Ambil data produk dari database
                $query = "SELECT * FROM produk";
                $result_set = mysqli_query($koneksi, $query);

                // Loop untuk menampilkan setiap produk
                while ($data = mysqli_fetch_assoc($result_set)) {
                    echo "<tr>";
                    echo "<td>{$data['id']}</td>";
                    echo "<td>{$data['nama']}</td>";
                    echo "<td>{$data['harga']}</td>";
                    echo "<td>{$data['keterangan']}</td>";
                    echo "<td>{$data['link_shopee']}</td>";
                    echo "<td><img src='foto/{$data['foto']}' alt='{$data['nama']}' style='width: 50px; height: 50px;'></td>";
                    echo "<td>";
                    echo "<a href='detail.php?id={$data['id']}'>Detail</a>";
                    echo "<a href='update.php?id={$data['id']}'>Edit</a>";
                    echo "<a href='delete.php?id={$data['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus produk ini?')\">Hapus</a>";

                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <script src="script.js"></script>
</body>
</html>
