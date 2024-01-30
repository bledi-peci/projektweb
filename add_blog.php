<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php';
    $db = new Database();
    $pdo = $db->getPDO();

    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['user_id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
            $newFilename = uniqid() . "." . $filetype;
            $uploadDir = __DIR__ . '/assets/uploads/';
            $uploadFile = $uploadDir . $newFilename;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $imageUrl = 'assets/uploads/' . $newFilename;
            } else {
                echo "Error in uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    }

    $query = "INSERT INTO news (title, content, image, created_by) VALUES (:title, :content, :image, :created_by)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $imageUrl);
    $stmt->bindParam(':created_by', $userId);
    $stmt->execute();

    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blog Post</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body>
    <h1>Add New Blog Post</h1>
    <form action="add_blog.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>

        <label for="image">Blog Image:</label><br>
        <input type="file" id="image" name="image" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
