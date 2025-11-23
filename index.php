<?php 
// Include the header (which starts the session and includes the navbar)
include 'includes/header.php'; 

// Include the database connection (Needed for dynamic data in Phase 2)
// include 'includes/db.php'; 
?>

<section class="hero-section">
    <div class="container">
        <h1>Upgrade Your Tech Lifestyle</h1>
        <p>Discover the latest smartwatches, headphones, and gaming gear.</p>
        <a href="shop.php" class="btn btn-primary">SHOP NOW</a>
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

<?php 
// 1. Include the header
include 'includes/header.php'; 
// 2. INCLUDE THE DB CONNECTION HERE!
include 'includes/db.php'; 
?>
<section class="featured-products container">
    <h2>Featured Gadgets</h2>
    <div class="product-grid">

        <?php
        // 3. Define the SQL query: Select first 4 products
        $sql = "SELECT id, name, price, image FROM products ORDER BY id DESC LIMIT 4";
        $result = $conn->query($sql);

        // 4. Check if results were returned
        if ($result->num_rows > 0) {
            // 5. LOOP through each row of the result set
            while($row = $result->fetch_assoc()) {
                // 6. Output the HTML for each product card
                echo '<div class="product-card">';
                echo '    <img src="assets/images/' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
                echo '    <div class="product-info">';
                echo '        <h3>' . htmlspecialchars($row["name"]) . '</h3>';
                echo '        <p class="price">$' . number_format($row["price"], 2) . '</p>';
                // Link to the specific product page. We'll build product.php later.
                echo '        <a href="product.php?id=' . $row["id"] . '" class="btn btn-add-cart">View Details</a>'; 
                echo '    </div>';
                echo '</div>';
            }
        } else {
            // Message if no products are found in the database
            echo '<p>No featured products found.</p>';
        }

        // Close the database connection (Good practice, especially in single-script files)
        $conn->close();
        ?>

    </div>
</section>

<?php 
include 'includes/footer.php'; 
?>

<?php 
// Include the footer (which closes the main tags and includes the JS)
include 'includes/footer.php'; 
?>