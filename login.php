<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'db.php';
require_once 'user.php';

$db = new Database();
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authenticatedUser = $user->authenticateUser($username, $password);

    if ($authenticatedUser) {
        $_SESSION['user_id'] = $authenticatedUser['id'];
        $_SESSION['username'] = $authenticatedUser['username'];
        $_SESSION['role'] = $authenticatedUser['role'];

        if ($_SESSION['role'] == 'admin') {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: home.php");
            exit();
        }
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
