<?php include '../config/db.php'; ?>
<?php include '../templates/header.php'; ?>

<h2>Sales Cart</h2>
<form method="POST" action="checkout.php">
    <div class="mb-3">
        <label for="product" class="form-label">Product</label>
        <select class="form-control" id="product" name="product_id" required>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()):
            ?>
            <option value="<?= $row['id'] ?>"><?= $row['name'] ?> - $<?= $row['price'] ?> (Stock: <?= $row['stock'] ?>)</option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

<?php include '../templates/footer.php'; ?>
