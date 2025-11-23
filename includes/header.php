<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAdgetify | smart gadget and accesories store</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
        <div class="container header-content">
            <a href="index.php" class="logo">GADGETIFY</a>
            <nav class="main-nav">
                <ul>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#">Deals</a></li>
                    <li><a href="#">Contact</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="user/profile.php">Profile</a></li>
                        <li><a href="user/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="user/login.php">Login / Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="cart/cart.php" class="cart-icon">🛒 (0)</a>
                <button id="dark-mode-toggle" class="mode-toggle">🌑</button>
            </div>
        </div>
    </header>

    <main>
