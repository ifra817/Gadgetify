<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$role = strtolower($_SESSION['role'] ?? 'guest');
$logged_in = isset($_SESSION['user_id']);
$current_page = $_SERVER['REQUEST_URI'];

$cart_count = 0;
if ($logged_in && $role === 'customer') {
    $cart_count = $_SESSION['cart_item_count'] ?? 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadgetify | Smart Gadgets Store</title>

    <link rel="stylesheet" href="/Gadgetify/assets/css/style.css">
</head>

<body>
<header class="main-header">
    <div class="container header-content">

        <!-- BRAND -->
        <a href="/Gadgetify/index.php" class="logo">GADGETIFY</a>

        <!-- NAVIGATION -->
        <nav class="main-nav">
            <ul>

                <!-- ALWAYS VISIBLE -->
                <li><a href="/Gadgetify/index.php"
                    class="<?= strpos($current_page, '/Gadgetify/index.php') !== false ? 'active' : '' ?>">Home</a></li>

                <li><a href="/Gadgetify/pages/about.php"
                    class="<?= strpos($current_page, '/Gadgetify/pages/about.php') !== false ? 'active' : '' ?>">About</a></li>

                <?php if ($role === 'admin'): ?>

                    <!-- ADMIN LINKS -->
                    <li><a href="/Gadgetify/modules/admin/dashboard.php"
                        class="<?= strpos($current_page, '/Gadgetify/modules/admin/dashboard.php') !== false ? 'active' : '' ?>">Admin Dashboard</a></li>

                    <li><a href="/Gadgetify/modules/admin/product_list.php"
                        class="<?= strpos($current_page, '/Gadgetify/modules/admin/product_list.php') !== false ? 'active' : '' ?>">Manage Products</a></li>

                    <li><a href="/Gadgetify/modules/auth/logout.php">Logout</a></li>

                <?php elseif ($role === 'customer'): ?>

                    <!-- CUSTOMER LINKS -->
                    <li><a href="/Gadgetify/pages/shop.php"
                        class="<?= strpos($current_page, '/Gadgetify/pages/shop.php') !== false ? 'active' : '' ?>">Shop</a></li>

                    <li><a href="/Gadgetify/pages/dashboard.php"
                        class="<?= strpos($current_page, '/Gadgetify/pages/dashboard.php') !== false ? 'active' : '' ?>">Dashboard</a></li>

                    <li><a href="/Gadgetify/modules/orders/order_history.php"
                        class="<?= strpos($current_page, '/Gadgetify/modules/orders/order_history.php') !== false ? 'active' : '' ?>">My Orders</a></li>

                    <li><a href="/Gadgetify/modules/auth/logout.php">Logout</a></li>

                <?php else: ?>

                    <!-- GUEST LINKS -->
                    <li><a href="/Gadgetify/pages/shop.php"
                        class="<?= strpos($current_page, '/Gadgetify/pages/shop.php') !== false ? 'active' : '' ?>">Shop</a></li>

                    <li><a href="/Gadgetify/modules/auth/login.php"
                        class="<?= strpos($current_page, '/Gadgetify/modules/auth/login.php') !== false ? 'active' : '' ?>">Login</a></li>

                    <li><a href="/Gadgetify/modules/auth/register.php"
                        class="<?= strpos($current_page, '/Gadgetify/modules/auth/register.php') !== false ? 'active' : '' ?>">Register</a></li>

                <?php endif; ?>

                <li><a href="/Gadgetify/pages/contact.php"
                    class="<?= strpos($current_page, '/Gadgetify/pages/contact.php') !== false ? 'active' : '' ?>">Contact</a></li>

            </ul>
        </nav>


        <!-- CART ICON -->
        <div class="header-icons">
            <?php if ($role === 'customer'): ?>
                <a href="/Gadgetify/modules/cart/cart.php" class="cart-icon">
                    🛒 (<?= $cart_count ?>)
                </a>
            <?php endif; ?>

            <button id="dark-mode-toggle" class="mode-toggle">🌑</button>
        </div>

    </div>
</header>

<main>
