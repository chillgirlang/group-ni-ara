<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="LoginStyles.css">
</head>
<body>
    <!-- this is the logo -->
    <img src="logo.png" alt="logo" class="logo">

    <div class="login-container">
        <i class="fa-solid fa-circle-user" style="font-size: 90px; margin-bottom: 40px; color: rgb(11, 82, 11);"></i>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fa-solid fa-eye" id="toggle-icon" style="margin-top: 30px;"></i>
                </span>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("toggle-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
<?php
session_start();

// Database connection
$host = 'localhost';
$port = '3306'; // Change if necessary
$dbname = 'login_system';
$username = 'root'; // Change if necessary
$password = ''; // Change if necessary

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $inputUsername]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $inputPassword) { // Replace with password_hash() in production
        $_SESSION['username'] = $user['username'];
        $message = "Login successful! Welcome, " . $_SESSION['username'] . "!";
        echo "<script>alert('$message'); window.location.href='Dashboard_Backend.php';</script>";
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
</body>
</html>