<?php
include '../config/db.php';

$id = $_GET['id'];

// First, delete related sales records
$delete_sales = "DELETE FROM sales WHERE product_id = $id";
$conn->query($delete_sales);

// Then, delete the product itself
$delete_product = "DELETE FROM products WHERE id = $id";
if ($conn->query($delete_product)) {
    header('Location: list.php');
} else {
    echo "Error: " . $conn->error;
}
?>
