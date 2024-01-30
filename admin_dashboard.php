<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body class="admin-dashboard">
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="admin_products.php">Manage Products</a></li>
            <li><a href="admin_blogs.php">Manage Blogs</a></li>
            <li><a href="admin_contact_inquiries.php">Contact Inquiries</a></li>
        </ul>
    </nav>
    <br><a href="home.php" class="add-new-btn">Back to Home</a>
</body>
</html>
