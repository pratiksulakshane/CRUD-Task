<?php
require "../config/db.php";
include "../includes/header.php";

$products = $pdo->query("SELECT * FROM products")->fetchAll();
$chart = $pdo->query("SELECT category, COUNT(*) total FROM products GROUP BY category")->fetchAll();
?>

<a href="add.php" class="btn btn-primary mb-3">Add Product</a>

<table class="table table-bordered">
<tr>
    <th>ID</th><th>Name</th><th>Price</th><th>Category</th><th>Actions</th>
</tr>
<?php foreach ($products as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td>₹<?= $p['price'] ?></td>
    <td><?= $p['category'] ?></td>
    <td>
        <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Delete product?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h4>Products Per Category</h4>
<canvas id="chart"></canvas>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($chart,'category')) ?>,
        datasets: [{
            label: 'Products',
            data: <?= json_encode(array_column($chart,'total')) ?>,
            backgroundColor: 'rgba(54,162,235,0.7)'
        }]
    }
});
</script>

<?php include "../includes/footer.php"; ?>
