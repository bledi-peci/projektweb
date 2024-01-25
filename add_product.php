<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php';
    $db = new Database();
    $pdo = $db->getPDO();

    $name = $_POST['name'];
    $description = $_POST['description'];
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

    $query = "INSERT INTO products (name, description, image_url, created_by) VALUES (:name, :description, :image_url, :created_by)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image_url', $imageUrl);
    $stmt->bindParam(':created_by', $userId);
    $stmt->execute();

    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body>
    <h1>Add New Product</h1>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>

    <label for="image">Product Image:</label><br>
    <input type="file" id="image" name="image" required><br>

    <input type="submit" value="Submit">
    </form>

</body>
</html>
