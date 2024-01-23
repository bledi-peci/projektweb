<?php include 'header.php' ?>
  <img src="assets/uploads/product-banner.png" alt="sherbimet-landing" class="landing-sherbimet"></img>
  <h2 class="sherbimet-header">Products</h2>
  <p class="sherbimet-content">

    Title: "Under the Canvas Canopy"

    In the heart of nature's embrace, where the rustle of leaves orchestrates a symphony and the moonlight dances
    through the branches, stands a solitary tent—a humble haven nestled amidst the wilderness.

    This tent, a beacon of simplicity, boasts a weathered exterior that tells tales of countless adventures. Its fabric,
    bearing the patina of raindrops and the whispers of the wind, weaves a story of resilience against the elements. The
    stakes firmly planted in the earth, forming an unspoken alliance with the ground beneath, symbolize a harmonious
    coexistence between shelter and nature.

    As the canvas stretches taut, it creates a sanctuary that transcends the material realm. Inside, the air is imbued
    with the earthy scent of pine, a fragrance that blends seamlessly with the distant crackle.
  </p>
  <div class="products-single">
    <?php
    include 'db.php';

    try {
        $sql = "SELECT p.id, p.name, p.description, p.image_url, p.created_at, u.username 
                FROM products p 
                JOIN users u ON p.created_by = u.id";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product-single'>";
                echo "<img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["name"]) . "' />";
                echo "<a href='product_detail.php?id=" . $row["id"] . "' class='product-title'>" . htmlspecialchars($row["name"]) . "</a>";
                echo "<p>Created by: " . htmlspecialchars($row["username"]) . " on " . htmlspecialchars($row["created_at"]) . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 products";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    ?>
</div>

<?php include 'footer.php'; ?>