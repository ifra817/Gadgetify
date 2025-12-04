<?php
require_once __DIR__ . '/../includes/admin_check.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
?>

<h2 class="container">All Products</h2>

<a href="add_product.php" class="btn">+ Add New Product</a>

<table class="container admin-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
    </tr>

<?php
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>\${$row['price']}</td>";
    echo "<td><img src='../assets/images/{$row['image_url']}' width='60'></td>";
    echo "</tr>";
}
?>
</table>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
