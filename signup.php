<?php
session_start();
include 'header.php';
require_once 'db.php';
require_once 'user.php';

$db = new Database();
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}
?>


<div class="sign-up-div">
<script src="signup.js" defer></script>
    <form id="signupForm" action="signup.php" method="post">
        <h2>Sign Up</h2>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirmPassword">Konfirmo Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>
        <div>
            <label for="emrimbiemri">Emri dhe Mbiemri:</label>
            <input type="text" id="emrimbiemri" name="emrimbiemri" required>
        </div>
        <div>
            <label for="emailadress">Email Address:</label>
            <input type="email" id="emailadress" name="emailadress" required>
        </div>
        <div>
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" required>
        </div>
        <div>
            <label for="gender">Gjinia:</label>
            <select id="gender" name="gender" required>
                <option value="">Zgjedh gjinine</option>
                <option value="female">Femer</option>
                <option value="male">Mashkull</option>
            </select>
        </div>
        <button class="login-button" type="submit" id="submitbtn">Regjistrohu</button>
    </form>
</div>

<?php include 'footer.php' ?>
