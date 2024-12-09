<?php
include '../config/db.php';

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE products SET name = '$name', price = '$price', stock = '$stock' WHERE id = $id";
    if ($conn->query($sql)) {
        header('Location: list.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<?php include '../templates/header.php'; ?>
<h2>Edit Product</h2>
<form method="POST" action="">
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?= $product['price'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= $product['stock'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
<?php include '../templates/footer.php'; ?>
