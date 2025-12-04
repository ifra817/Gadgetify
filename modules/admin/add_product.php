<?php
require_once __DIR__ . '/../includes/admin_check.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Image upload
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/images/" . $image);

    $sql = "INSERT INTO products (name, price, description, image_url) 
            VALUES ('$name', '$price', '$description', '$image')";

    if ($conn->query($sql)) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<h2 class="container">Add Product</h2>

<p><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data" class="container product-form">

    <label>Product Name</label>
    <input type="text" name="name" required>

    <label>Price</label>
    <input type="number" step="0.01" name="price" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Product Image</label>
    <input type="file" name="image" required>

    <button type="submit" class="btn">Add Product</button>
</form>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
