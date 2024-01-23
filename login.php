<?php
session_start();

include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $password) {
      
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        

        echo "Login successful. Welcome, " . htmlspecialchars($user['username']);
        header("Location: home.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<?php include 'header.php' ?>
    <script src="validoFormen.js" defer></script>
    <div id="forma">
    <div class="login-page">
        <p class="login-title">Login Form</p>
        <form action="login.php" method="post">
            <label for='username'>Username:</label>
            <input type="text" id="username" name="username" size="15" />
            <label for='password'>Password:</label>
            <input type="password" id="password" name="password" size="15" />
            <button class="login-button" type="submit" id="submitbtn">Submit</button>
        </form>
    </div>
</div>
<?php include 'footer.php' ?>