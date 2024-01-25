<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once 'db.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registerUser($username, $password, $fullName, $email, $gender, $birthday) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';

        $sql = "INSERT INTO users (username, password, full_name, email, gender, birthday, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$username, $hashedPassword, $fullName, $email, $gender, $birthday, $role]);

        return $stmt->rowCount() > 0;
    }

    public function authenticateUser($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->getPDO()->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();
    
        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        } else {
            return false;
        }
    }
}

$db = new Database(); 
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullName = $_POST['emrimbiemri'];
        $email = $_POST['emailadress'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];

        if ($user->registerUser($username, $password, $fullName, $email, $gender, $birthday)) {
            echo "User registered successfully";
            header("Location: login.php");
        } else {
            echo "User registration failed";
        }
    } elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $authenticatedUser = $user->authenticateUser($username, $password);

        if ($authenticatedUser) {
            $_SESSION['user_id'] = $authenticatedUser['id'];
            $_SESSION['username'] = $authenticatedUser['username'];

            echo "Login successful. Welcome, " . htmlspecialchars($authenticatedUser['username']);
            header("Location: home.php");
        } else {
            echo "Invalid username or password";
        }
    }
}
?>
