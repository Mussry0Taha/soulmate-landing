<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulMate · Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <h1>💕 SoulMate</h1>
            <p>Welcome back! Sign in to continue.</p>
        </div>

        <form onsubmit="event.preventDefault(); handleLogin();" id="loginForm">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" placeholder="you@example.com" required>
            </div>

            <div class="form-group password-group">
                <label>Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" placeholder="Enter your password" required>
                    <span class="toggle-eye" onclick="togglePassword('password', 'loginPassIcon')" id="loginPassIcon">👁️</span>
                </div>
            </div>

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem; font-size:0.9rem;">
                <label><input type="checkbox" id="remember"> Remember Me</label>
                <a href="#" style="color:#6c5ce7; text-decoration:none;">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-primary btn-full">Sign In 🚀</button>
            <p style="text-align:center; margin-top:1.2rem;">
                New here? <a href="register.php">Create an account</a>
            </p>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
<script src="js/auth.js"></script>
</body>
</html>