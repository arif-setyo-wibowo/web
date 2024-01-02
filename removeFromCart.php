<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $index => $product) {
            if ($product['id'] === $product_id) {
                unset($_SESSION['cart'][$index]);
                header("Location: cart.php");
                exit;
            }
        }
    }
    echo "error: Produk tidak ditemukan dalam keranjang belanja";
} else {
    echo "error: Permintaan tidak valid";
}
