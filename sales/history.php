<?php include '../config/db.php'; ?>
<?php include '../templates/header.php'; ?>

<h2>Sales History</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Sale Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT sales.id, products.name AS product_name, sales.quantity, sales.total_price, sales.sale_date 
                                FROM sales 
                                JOIN products ON sales.product_id = products.id");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['product_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td>$<?= $row['total_price'] ?></td>
            <td><?= $row['sale_date'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include '../templates/footer.php'; ?>
