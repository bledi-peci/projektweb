<?php session_start() ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Camping Trip</title>
  <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body>
<div id="header" class="header">
  <img class="borgir" onclick="clickBorgir()" src="./assets/uploads/borgir.svg" alt="" />
  <a href="./home.php">
    <img class="header-logo" src="./assets/uploads/Header-logo.svg" alt="" class="logo" /></a>
  <div class="header-links">
    <a href="./products.php" class="header-link">Products</a>
    <a href="./blogs.php" class="header-link">Blogs</a>
    <a href="./aboutus.php" class="header-link">About Us</a>
    <a href="./contact.php" class="header-link">Contact Us</a>
    <?php
            if (isset($_SESSION['username'])) {
                echo '<span class="header-link">' . htmlspecialchars($_SESSION['username']) . '</span>';
                if ($_SESSION['role'] == 'admin') {
                  echo '<a class="header-link" href="admin_dashboard.php">Admin</a>';
              }
                echo '<a class="header-link" href="logout.php">Logout</a>';
                
            } else {
                echo '<a class="header-link" href="./login.php">Login</a>';
                echo '<a class="header-link" href="./signup.php">Sign Up</a>';
            }
  ?>
  </div>
</div>