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
    <title>SoulMate · Matches</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
    <style>
        .matches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .match-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            border: 1px solid rgba(108,92,231,0.08);
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        }
        .match-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 0.5rem;
        }
        .match-card h4 {
            margin-bottom: 0.2rem;
        }
        .match-card .match-percent {
            color: #6c5ce7;
            font-weight: 700;
        }
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
                <li><a href="matches.php" class="active">Matches</a></li>
                <li><a href="chat.php">Messages</a></li>
                <li><a href="#" onclick="logout()">Logout</a></li>
            </ul>
        </nav>

        <h2 style="margin-top:2rem;">❤️ Your Matches</h2>
        <p style="color:#888;">People who are compatible with you.</p>

        <div class="coming-soon">
            <h2>🚀 Coming Soon!</h2>
            <p>The matching algorithm is being prepared. Check back later!</p>
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