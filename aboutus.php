<?php
session_start();
include 'db.php';
include 'header.php';

$db = new Database();

$pdo = $db->getPDO();

if (!$pdo) {
    die("Database connection not established.");
}

$sql = "SELECT * FROM about_us_data";
$stmt = $pdo->query($sql);
$aboutUsData = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="aboutus-container"><br>
    <h1 class="aboutus-header">About Us</h1>
    <div class="aboutus-content">
        <img src="<?php echo htmlspecialchars($aboutUsData['image_url']); ?>" alt="About Us Image" class="aboutus-image">
        <div class="aboutus-text">
        <h2><?php echo htmlspecialchars($aboutUsData['title']); ?></h2>
        <p>
        <?php echo htmlspecialchars($aboutUsData['description']); ?>
        </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
