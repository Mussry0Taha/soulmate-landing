<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulMate · Messages</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
    <style>
        .coming-soon {
            text-align: center;
            padding: 4rem 2rem;
            color: #888;
        }
        .coming-soon h2 {
            font-size: 2rem;
            color: var(--text);
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <a href="index.php" class="logo">Soul<span>Mate</span> 💕</a>
            <ul class="nav-links">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="matches.php">Matches</a></li>
                <li><a href="chat.php" class="active">Messages</a></li>
                <li><a href="#" onclick="logout()">Logout</a></li>
            </ul>
        </nav>

        <h2 style="margin-top:2rem;">💬 Messages</h2>
        <p style="color:#888;">Chat with your matches.</p>

        <div class="coming-soon">
            <h2>🚀 Coming Soon!</h2>
            <p>The chat system is being built. Stay tuned!</p>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            checkSession();
        });
    </script>
</body>
</html>