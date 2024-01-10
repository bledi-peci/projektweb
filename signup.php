<?php
include 'db.php'; // Your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // Normally you would hash this
    $role = 'user'; // Assuming you have a role field in your form
    $email = $_POST['emailadress'];
    $fullName = $_POST['emrimbiemri'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $sql = "INSERT INTO users (username, password, full_name, email, gender, birthday) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $fullName, $email, $gender, $birthday]);

    echo "User registered successfully";
    header("Location: login.php");
}
?>

<?php include 'header.php'?>
<div class="sign-up-div">
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

    <!-- <script src="signup.js"></script> -->
<?php include 'footer.php'?>