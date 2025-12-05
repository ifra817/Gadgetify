<?php
require_once __DIR__ . '/../../includes/admin_check.php';
require_once __DIR__ . '/../../includes/db.php';

// Validate product ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: product_list.php?msg=invalid_id");
    exit;
}

$id = intval($_GET['id']);

// Fetch product
$sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    header("Location: product_list.php?msg=not_found");
    exit;
}

$product = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    // Keep old image if new not uploaded
    $image_name = $product['image_url'];

    // If new image uploaded
    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $new_image_name = "product_" . time() . "." . $ext;

        // Correct upload directory
        $upload_path = __DIR__ . "/../../assets/images/" . $new_image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {

            // Delete old image if exists
            $old_image_path = __DIR__ . "/../../assets/images/" . $product['image_url'];

            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            $image_name = $new_image_name;
        }
    }

    // Update query
    $update = "
        UPDATE products 
        SET name = '$name',
            price = '$price',
            description = '$description',
            image_url = '$image_name'
        WHERE id = $id
    ";

    if ($conn->query($update)) {
        header("Location: product_list.php?msg=updated");
        exit;
    } else {
        echo "<p style='color:red; text-align:center;'>Error updating product!</p>";
    }
}

require_once __DIR__ . '/../../includes/header.php';
?>

<style>
.form-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background: #111;
    color: white;
    border-radius: 10px;
}

.form-container input,
.form-container textarea {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border-radius: 5px;
    border: 1px solid #444;
    background: #222;
    color: white;
}

.form-container button {
    padding: 10px 20px;
    background: #28a745;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}

.current-img {
    width: 100px;
    margin: 10px 0;
    border-radius: 6px;
}
</style>

<div class="form-container">
    <h2>Edit Product</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required>

        <label>Price (PKR):</label>
        <input type="number" name="price" value="<?= $product['price']; ?>" required>

        <label>Description:</label>
        <textarea name="description" rows="4" required><?= htmlspecialchars($product['description']); ?></textarea>

        <label>Current Image:</label><br>
        <img class="current-img" src="../../assets/images/<?= $product['image_url']; ?>" alt="Product Image">

        <label>Upload New Image (optional):</label>
        <input type="file" name="image" accept="image/*">

        <button type="submit">Update Product</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
