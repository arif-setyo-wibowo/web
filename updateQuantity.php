<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['action'])) {
    $product_id = $_GET['id'];
    $action = $_GET['action'];

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $index => &$product) {
            if ($product['id'] === $product_id) {
                if ($action === 'increase') {
                    $product['quantity']++;
                    header("Location: cart.php");
                    exit;
                } elseif ($action === 'decrease') {
                    if ($product['quantity'] > 1) {
                        $product['quantity']--;
                        header("Location: cart.php");
                        exit;
                    } else {
                        unset($_SESSION['cart'][$index]);
                        header("Location: cart.php");
                        exit;
                    }
                }
            }
        }
        echo "error: Produk tidak ditemukan dalam keranjang belanja";
    } else {
        echo "error: Keranjang belanja kosong";
    }
} else {
    echo "error: Permintaan tidak valid";
}
