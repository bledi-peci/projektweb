<?php
include 'db.php';

$db = new Database();
$pdo = $db->getPDO();

if (!$pdo) {
    die("Database connection not established.");
}

try {
    $sql = "SELECT * FROM contact_inquiries";
    $stmt = $pdo->query($sql);
    echo "<head>";
    echo "<title>Admin Contact Inquiries</title>";
    echo '<link rel="stylesheet" href="./assets/css/general.css" />'; 
    echo "</head>";
    echo "<div class='admin-contact-inquiries'>";
    echo "<h2>Contact Inquiries</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["message"]) . "</td><td>" . htmlspecialchars($row["submitted_at"]) . "</td></tr>";
    }

    echo "</table>";
    echo "<br><a href='admin_dashboard.php' class='add-new-btn'>Back to dashboard</a>";
    echo "</div>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
