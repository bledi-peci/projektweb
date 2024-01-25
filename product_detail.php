<?php
session_start();
include 'header.php';
include 'db.php';

$db = new Database();
$pdo = $db->getPDO();

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT name, image_url, description FROM products WHERE id = :productId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<img src='" . htmlspecialchars($row["image_url"]) . "' class='landing-image-single' alt='" . htmlspecialchars($row["name"]) . "' />";
        echo "<div class='products-text-image'>";
        echo "<div class='text'>";
        echo "<h1 class='project-header'>" . htmlspecialchars($row["name"]) . "</h1>";
        echo "<p class='project-paragraph'>" . htmlspecialchars($row["description"]) . "</p>";
        echo "</div>";
        echo "<img class='image-project' src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["name"]) . "' />";
        echo "</div>";
    } else {
        echo "Product not found";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php include 'footer.php'; ?>
