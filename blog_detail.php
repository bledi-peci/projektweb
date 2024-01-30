<?php
session_start();
include 'header.php';
include 'db.php';

$db = new Database();
$pdo = $db->getPDO();

$blogId = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT title, image, content FROM news WHERE id = :blogId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':blogId', $blogId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<div class='products-text-image'>";
        echo "<div class='text'>";
        echo "<h1 class='project-header'>" . htmlspecialchars($blog["title"]) . "</h1>";
        echo "<p class='project-paragraph'>" . htmlspecialchars($blog["content"]) . "</p>";
        echo "</div>";
        echo "<img class='image-project' src='" . htmlspecialchars($blog["image"]) . "' alt='" . htmlspecialchars($blog["title"]) . "' />";
        echo "</div>";
    } else {
        echo "<p>Blog post not found.</p>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

include 'footer.php';
?>
