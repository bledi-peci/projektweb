<?php
require_once 'db.php';

$db = new Database();
$pdo = $db->getPDO();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM news WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

header("Location: admin_dashboard.php");
exit();
?>
