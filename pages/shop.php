<?php 
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';
?>

<section class="shop-content container">
    <h2>All Gadgets</h2>
    
    <div class="shop-layout">
        <aside class="sidebar-filter">
            <h3>Filters</h3>
            <p>Filtering and search bar will be added here in a later step.</p>
        </aside>

        <div class="product-grid">
            <?php
            // Working SQL query without created_at
            $sql = "SELECT id, name, price, image_url FROM products ORDER BY id DESC";

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '    <img src="/Gadgetify/assets/images/' . htmlspecialchars($row["image_url"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
                    echo '    <div class="product-info">';
                    echo '        <h3>' . htmlspecialchars($row["name"]) . '</h3>';
                    echo '        <p class="price">$' . number_format($row["price"], 2) . '</p>';
                    echo '        <a href="product_page.php?id=' . $row["id"] . '" class="btn btn-add-cart">View Details</a>'; 
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>There are no products in the store right now.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>
 
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
