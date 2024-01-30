<?php
session_start();
include 'header.php';
include 'db.php';

$db = new Database();
$pdo = $db->getPDO();

try {
    $sql = "SELECT n.id, n.title, n.content, n.image, n.created_at, u.username 
            FROM news n 
            JOIN users u ON n.created_by = u.id";
    $stmt = $pdo->query($sql);
?>

<div class="products-container">
    <h2 class="products-header">Our Blogs</h2>
    <div class="products-single">
    <h2 class="sherbimet-header">Our Blogs</h2>
    <div class="products-single">
        <?php 
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product-single'>";
                echo "<img src='" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["title"]) . "' />";
                echo "<div class='product-info'>";
                echo "<a href='blog_detail.php?id=" . $row["id"] . "' class='product-title'>" . htmlspecialchars($row["title"]) . "</a>";
                echo "<p class='product-description'>" . substr(htmlspecialchars($row["content"]), 0, 200) . "...</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 blog posts";
        }
        ?>
    </div>
</div>

<?php
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
include 'footer.php';
?>
