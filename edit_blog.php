<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php';
    $db = new Database();
    $pdo = $db->getPDO();

    $blogId = $_POST['blog_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $query = "SELECT * FROM news WHERE id = :blog_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':blog_id', $blogId);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $query = "UPDATE news SET title = :title, content = :content WHERE id = :blog_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':blog_id', $blogId);
        $stmt->execute();

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
                    $query = "UPDATE news SET image = :image_url WHERE id = :blog_id";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':image_url', $imageUrl);
                    $stmt->bindParam(':blog_id', $blogId);
                    $stmt->execute();
                } else {
                    echo "Error in uploading image file.";
                    exit;
                }
            } else {
                echo "Invalid image file type.";
                exit;
            }
        }

        header("Location: admin_blogs.php");
        exit();
    } else {
        header("Location: admin_blogs.php");
        exit();
    }
}

if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    $db = new Database();
    $pdo = $db->getPDO();
    $query = "SELECT * FROM news WHERE id = :blog_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':blog_id', $blogId);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $blogPost = $stmt->fetch(PDO::FETCH_ASSOC);
        $blogTitle = $blogPost['title'];
        $blogContent = $blogPost['content'];
        $blogImageUrl = $blogPost['image'];
    } else {
        header("Location: admin_dashboard.php");
        exit();
    }
} else {
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog Post</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body>
    <h1>Edit Blog Post</h1>
    <form action="edit_blog.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="blog_id" value="<?php echo htmlspecialchars($blogId); ?>">

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($blogTitle); ?>"><br>

        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($blogContent); ?></textarea><br>

        <label for="image">Blog Image:</label><br>
        <input type="file" id="image" name="image"><br>

        <?php if (!empty($blogImageUrl)): ?>
            <img src="<?php echo htmlspecialchars($blogImageUrl); ?>" alt="Blog Image" width="200"><br>
        <?php endif; ?>

        <input type="submit" value="Update">
    </form>
</body>
</html>
