<?php
// pages/dashboard.php
require_once __DIR__ . '/../includes/auth_check.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

// If an admin somehow navigates here, redirect them to admin dashboard
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: /Gadgetify/modules/admin/dashboard.php");
    exit;
}
?>

<section class="hero-section">
    <div class="container">
        <h1>Upgrade Your Tech Lifestyle</h1>
        <p>Discover the latest smartwatches, headphones, and gaming gear.</p>
        <a href="/Gadgetify/pages/shop.php" class="btn btn-primary">SHOP NOW</a>
    </div>
</section>

<section class="categories-section container">
    <h2>Explore Categories</h2>
    <div class="category-grid">
        <div class="category-card">🎧 Headphones</div>
        <div class="category-card">⌚ Smartwatches</div>
        <div class="category-card">📱 Phone Cases</div>
        <div class="category-card">🎮 Gaming Gear</div>
    </div>
</section>

<section class="featured-products container">
    <h2>Featured Gadgets</h2>
    <div class="product-grid">

        <?php
        // NOTE: use the correct column name from your DB: image_url
        $sql = "SELECT id, name, price, image_url FROM products ORDER BY id DESC LIMIT 4";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $img = !empty($row['image_url']) ? $row['image_url'] : 'placeholder.png';
                // Use absolute path so images load from any page
                $img_src = '/Gadgetify/assets/images/' . htmlspecialchars($img);
                echo '<div class="product-card">';
                echo '    <img src="' . $img_src . '" alt="' . htmlspecialchars($row["name"]) . '">';
                echo '    <div class="product-info">';
                echo '        <h3>' . htmlspecialchars($row["name"]) . '</h3>';
                echo '        <p class="price">$' . number_format($row["price"], 2) . '</p>';
                echo '        <a href="/Gadgetify/pages/product.php?id=' . intval($row["id"]) . '" class="btn btn-add-cart">View Details</a>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No featured products found.</p>';
        }

        // close connection if you want (optional)
        $conn->close();
        ?>

    </div>
</section>

<?php
require_once __DIR__ . '/../includes/footer.php';
?>
