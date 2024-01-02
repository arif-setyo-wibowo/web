<?php
 $conn = mysqli_connect("localhost", "root", "","presentasikarya");
   require "function.php";
    $conn = mysqli_connect("localhost", "root", "", "presentasikarya");
    function tambah($data){
        global $conn;
        $nama = htmlspecialchars ($_POST["nama_produk"]);
        $harga = htmlspecialchars ($_POST["harga"]);
        $deskripsi = htmlspecialchars ($_POST["harga"]);
        $query = mysqli_query($conn, "INSERT INTO `produk`VALUES (
            '',
            '$nama_produk',
            '$harga',
            '$keterangan',
        )");
        if (mysqli_affected_rows ($conn) > 0){
            header("location: produk.php");

        }
    }
?>