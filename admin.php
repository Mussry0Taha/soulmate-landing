<?php
session_start();
// Hardcoded admin protection for now
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;

// Simple admin login check (you can expand this later)
if (!$isAdmin) {
    // You can add a simple admin login form here
    // For now, let's redirect to login
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulMate · Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
    <style>
        .admin-wrapper {
            padding: 2rem 0;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
            border: 1px solid rgba(108,92,231,0.08);
        }
        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #6c5ce7;
        }
        .stat-card .label {
            color: #888;
            font-weight: 600;
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
                <li><a href="admin.php" class="active">Admin</a></li>
                <li><a href="#" onclick="logout()">Logout</a></li>
            </ul>
        </nav>

        <div class="admin-wrapper">
            <h2>🛡️ Admin Dashboard</h2>
            <p style="color:#888; margin-bottom:2rem;">Manage users and monitor the platform.</p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="number" id="totalUsers">0</div>
                    <div class="label">Total Users</div>
                </div>
                <div class="stat-card">
                    <div class="number">0</div>
                    <div class="label">Total Matches</div>
                </div>
                <div class="stat-card">
                    <div class="number">0</div>
                    <div class="label">Messages Sent</div>
                </div>
            </div>

            <div class="coming-soon">
                <h2>🚀 Coming Soon!</h2>
                <p>The admin panel is being built. User management will appear here.</p>
            </div>
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