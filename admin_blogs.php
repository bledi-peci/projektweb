<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once 'db.php';
$db = new Database();
$pdo = $db->getPDO();

$query = "SELECT * FROM news";
$stmt = $pdo->prepare($query);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Blogs</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body class="admin-dashboard">
    <h1>Admin Blogs</h1>

    <a href="add_blog.php" class="add-new-btn">Add New Blog Post</a>

    <table class="admin-table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($blogs as $blog): ?>
            <tr>
                <td><?php echo htmlspecialchars($blog['title']); ?></td>
                <td><?php echo substr(htmlspecialchars($blog['content']), 0, 50) . '...'; ?></td>
                <td>
                    <a href="edit_blog.php?id=<?php echo $blog['id']; ?>">Edit</a>
                    <a href="delete_blog.php?id=<?php echo $blog['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><a href="admin_dashboard.php" class="add-new-btn">Back to dashboard</a>
</body>
</html>
