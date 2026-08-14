<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulMate · Find Your Soulmate</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
    <style>
        .hero {
            text-align: center;
            padding: 4rem 0;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        .hero h1 .highlight {
            background: linear-gradient(135deg, #6c5ce7, #0984e3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero p {
            font-size: 1.2rem;
            color: #5a4a58;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        .hero .buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }
        .feature-card {
            text-align: center;
            padding: 2rem 1rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.04);
            border: 1px solid rgba(108,92,231,0.08);
        }
        .feature-card .icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .feature-card h3 {
            margin-bottom: 0.3rem;
        }
        .feature-card p {
            color: #888;
            font-size: 0.95rem;
        }
        footer {
            text-align: center;
            padding: 2rem 0;
            border-top: 2px solid rgba(108,92,231,0.08);
            margin-top: 2rem;
        }
        footer a {
            color: #6c5ce7;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <a href="index.php" class="logo">Soul<span>Mate</span> 💕</a>
            <ul class="nav-links">
                <?php if ($isLoggedIn): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="matches.php">Matches</a></li>
                    <li><a href="chat.php">Messages</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Hero -->
        <div class="hero">
            <h1>Find Your <span class="highlight">Soulmate</span></h1>
            <p>Discover meaningful connections based on personality, values, and what truly matters to you.</p>
            <div class="buttons">
                <?php if ($isLoggedIn): ?>
                    <a href="dashboard.php" class="btn-primary">Go to Dashboard 🚀</a>
                <?php else: ?>
                    <a href="register.php" class="btn-primary">Get Started 💕</a>
                    <a href="login.php" class="btn-secondary">Sign In</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Features -->
        <div class="features">
            <div class="feature-card">
                <div class="icon">🧠</div>
                <h3>Smart Matching</h3>
                <p>AI-powered compatibility based on your personality</p>
            </div>
            <div class="feature-card">
                <div class="icon">🔒</div>
                <h3>Safe & Private</h3>
                <p>Your data is secure. Real people, verified profiles</p>
            </div>
            <div class="feature-card">
                <div class="icon">💬</div>
                <h3>Meaningful Chats</h3>
                <p>Start real conversations that actually matter</p>
            </div>
            <div class="feature-card">
                <div class="icon">❤️</div>
                <h3>Find Your Match</h3>
                <p>Thousands have found love. You're next!</p>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2026 <a href="index.php">SoulMate</a>. Made with love ❤️</p>
        </footer>
    </div>

    <script src="js/script.js"></script>
    <?php if ($isLoggedIn): ?>
        <script>
            // Logout function (uses the global function from script.js)
            function logout() {
                fetch('api/logout.php', { method: 'POST' })
                    .then(() => window.location.href = 'index.php');
            }
        </script>
    <?php endif; ?>
</body>
</html>