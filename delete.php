<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan query penghapusan berdasarkan ID
    $query = "DELETE FROM produk WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect kembali ke halaman produk setelah penghapusan
        header("Location: produk.php");
        exit();
    } else {
        echo "Gagal menghapus produk.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
