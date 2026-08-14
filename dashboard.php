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
    <title>SoulMate · Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <a href="index.php" class="logo">Soul<span>Mate</span> 💕</a>
            <ul class="nav-links">
                <li><a href="dashboard.php" class="active">Dashboard</a></li>
                <li><a href="matches.php">Matches</a></li>
                <li><a href="chat.php">Messages</a></li>
                <li><a href="#" onclick="logout()">Logout</a></li>
            </ul>
        </nav>

        <!-- Dashboard Content -->
        <div class="dashboard-wrapper">
            <!-- Sidebar -->
            <aside class="sidebar">
                <img src="assets/default-avatar.png" alt="Avatar" class="sidebar-avatar" id="avatar">
                <h3 id="profileName">Loading...</h3>
                <p id="profileEmail">Loading...</p>
                <ul class="sidebar-nav">
                    <li><a href="dashboard.php" class="active">👤 My Profile</a></li>
                    <li><a href="matches.php">❤️ Matches</a></li>
                    <li><a href="chat.php">💬 Messages</a></li>
                    <li><a href="#" onclick="logout()">🚪 Logout</a></li>
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <div class="profile-header">
                    <img src="assets/default-avatar.png" alt="Avatar" id="avatarLarge">
                    <div>
                        <h2 id="profileNameLarge">Loading...</h2>
                        <p id="profileEmailLarge">Loading...</p>
                    </div>
                </div>

                <form class="dashboard-form" onsubmit="event.preventDefault(); updateProfile();">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" id="editName" required>
                    </div>

                    <div class="form-group">
                        <label>About You (Bio)</label>
                        <textarea id="editBio" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Location (City)</label>
                        <input type="text" id="editLocation">
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select id="editGender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="non-binary">Non-binary</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Looking for</label>
                        <select id="editPreference">
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="everyone">Everyone</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-primary">Save Changes 💾</button>
                </form>
            </main>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>