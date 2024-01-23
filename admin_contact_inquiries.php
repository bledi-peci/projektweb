<?php
include 'db.php';

try {
    $sql = "SELECT * FROM contact_inquiries";
    $stmt = $pdo->query($sql);

    echo "<h2>Contact Inquiries</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Submitted At</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td><td>" . $row["submitted_at"] . "</td></tr>";
    }

    echo "</table>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
