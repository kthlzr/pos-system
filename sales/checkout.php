<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();
    $total_price = $product['price'] * $quantity;

    if ($product['stock'] >= $quantity) {
        // Reduce stock
        $new_stock = $product['stock'] - $quantity;
        $conn->query("UPDATE products SET stock = $new_stock WHERE id = $product_id");

        // Add to sales
        $conn->query("INSERT INTO sales (product_id, quantity, total_price) VALUES ($product_id, $quantity, $total_price)");

        echo "Checkout successful!";
    } else {
        echo "Insufficient stock!";
    }
}
?>
<a href="cart.php" class="btn btn-secondary">Go Back</a>
