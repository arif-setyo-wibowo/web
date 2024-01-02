<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['product_price'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $item = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        );

        $found = false;
        foreach ($_SESSION['cart'] as &$product) {
            if ($product['id'] === $product_id) {
                $product['quantity']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = $item;
        }

        echo "success";
    } else {
        echo "error: Data produk tidak lengkap";
    }
} else {
    echo "error: Metode tidak diizinkan";
}
