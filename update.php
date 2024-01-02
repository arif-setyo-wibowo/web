<?php
require "koneksi.php";
session_start();

// Periksa apakah ID diberikan melalui parameter GET
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Ambil data yang sudah ada untuk ID yang diberikan
if (!empty($id)) {
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $harga = $row['harga'];
        $keterangan = $row['keterangan'];
        $link_shopee = $row['link_shopee'];
        $existing_foto = $row['foto'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak diberikan.";
    exit();
}

// Handle pengiriman formulir untuk memperbarui produk
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];
    $link_shopee = $_POST['link_shopee'];

    // Proses unggah file
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

    // Gunakan nama file baru jika file baru diunggah, sebaliknya gunakan nama file yang sudah ada
    $foto_name = !empty($file_name) ? $file_name : $existing_foto;

    $update = "UPDATE produk SET nama='$nama', harga='$harga', keterangan='$keterangan', link_shopee='$link_shopee', foto='$foto_name' WHERE id='$id'";
    $result = mysqli_query($koneksi, $update);

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
    <title>Ubah Produk - Petani Milenial</title>
    <link rel="stylesheet" href="./filecss/addproduk.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/all.css">
</head>

<body>
    <nav class="nav">
        <!-- Isi konten navigasi Anda di sini -->
    </nav>

    <div class="judul">
        <h1>Ubah Produk</h1>
    </div>
    <table>
        <tr>
            <td>
                <div class="produk">
                    <form method="post" action="update.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                        <!-- Input tersembunyi untuk menyimpan ID produk -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <label for="nama">Nama Produk</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama Produk" value="<?php echo $nama; ?>" required><br>

                        <label for="harga">Harga</label>
                        <input type="text" id="harga" name="harga" placeholder="Harga" value="<?php echo $harga; ?>" required> <br>

                        <label for="keterangan">Deskripsi</label>
                        <textarea id="keterangan" name="keterangan" placeholder="Deskripsi" required><?php echo $keterangan; ?></textarea><br>

                        <label for="link_shopee">Link Shopee</label>
                        <input type="text" id="link_shopee" name="link_shopee" placeholder="Link Shopee" value="<?php echo $link_shopee; ?>" required><br>

                        <label for="foto">Foto</label>
                        <input type="file" id="foto" name="foto" accept="image/*"><br>

                        <!-- Input tersembunyi untuk menyimpan nama file foto yang sudah ada -->
                        <input type="hidden" name="existing_foto" value="<?php echo $existing_foto; ?>">

                        <button type="submit" name="submit">Update Produk</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>

    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        });
    </script>
</body>

</html>