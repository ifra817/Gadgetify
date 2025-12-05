<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/header.php';

$email = $password = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "Both fields are required.";
    } else {

        // Correct query
        $stmt = $conn->prepare(
            "SELECT id, password_hash, name, role FROM users WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {

            $stmt->bind_result($id, $hash, $name, $role);
            $stmt->fetch();

            if (password_verify($password, $hash)) {

                // STORE SESSION PROPERLY
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                $_SESSION['role'] = strtolower($role);

                // REDIRECT
                if ($_SESSION['role'] === 'admin') {
                    header("Location: /Gadgetify/modules/admin/dashboard.php");
                } else {
                    header("Location: /Gadgetify/pages/dashboard.php");
                }
                exit;

            } else {
                $error = "Incorrect password.";
            }

        } else {
            $error = "No account found with this email.";
        }
    }
}
?>

<div class="container" style="max-width:500px; margin-top:40px;">
    <h2>Login</h2>

    <?php 
    if (!empty($error)) echo "<p style='color:red;'>$error</p>"; 
    if (isset($_GET['success'])) echo "<p style='color:green;'>Account created! You may login.</p>"; 
    ?>

    <form method="POST" action="">
        <label>Email</label>
        <input type="email" name="email" required class="form-input">

        <label>Password</label>
        <input type="password" name="password" required class="form-input">

        <button type="submit" class="btn-primary" style="width:100%; margin-top:15px;">Login</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
        Don’t have an account? <a href="register.php">Register</a>
    </p>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
