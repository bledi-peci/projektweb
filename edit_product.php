<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$productId = null;
$productName = "";
$productDescription = "";
$imageUrl = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'db.php';
    $db = new Database();
    $pdo = $db->getPDO();

    $productId = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

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
                $query = "UPDATE products SET name = :name, description = :description, image_url = :image_url WHERE id = :product_id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image_url', $imageUrl);
                $stmt->bindParam(':product_id', $productId);
                $stmt->execute();
            } else {
                echo "Error in uploading file.";
                exit;
            }
        } else {
            echo "Invalid file type.";
            exit;
        }
    } else {
        $query = "UPDATE products SET name = :name, description = :description WHERE id = :product_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
    }

    header("Location: admin_products.php");
    exit();
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $db = new Database();
    $pdo = $db->getPDO();
    $query = "SELECT * FROM products WHERE id = :product_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $productName = $product['name'];
        $productDescription = $product['description'];
        $imageUrl = $product['image_url'];
    } else {
        header("Location: admin_products.php");
    }
} else {
    header("Location: admin_products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="./assets/css/general.css" />
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($productName); ?>"><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($productDescription); ?></textarea><br>

        <label for="image">Product Image:</label><br>
        <input type="file" id="image" name="image"><br>

        <?php if (!empty($imageUrl)): ?>
            <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Product Image" width="200"><br>
        <?php endif; ?>

        <input type="submit" value="Update">
    </form>
</body>
</html>
