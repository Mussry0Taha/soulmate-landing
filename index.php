<?php
// □ Hero section with headline: "Find Your Soulmate".
// □ "Take the Quiz / Get Started" button.
// □ If user is already logged in (check PHP Session), change button to "Go to Dashboard".
// □ Footer with links to login.php and register.php.
declare(strict_types=1); session_start(); $loggedIn = !empty($_SESSION['user_id']);
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Soulmate | Find your person</title><link rel="stylesheet" href="css/style.css"></head><body>
<nav><a class="brand" href="index.php">soulmate<span>.</span></a><div><a href="login.php">Log in</a><a class="btn-primary small" href="register.php">Join free</a></div></nav>
<main class="hero"><div><p class="eyebrow">MEANINGFUL CONNECTIONS</p><h1>Find Your Soulmate</h1><p class="lead">Discover people who share your values, interests, and energy—one genuine conversation at a time.</p><a class="btn-primary" href="<?= $loggedIn ? 'dashboard.php' : 'register.php' ?>"><?= $loggedIn ? 'Go to Dashboard' : 'Take the Quiz / Get Started' ?></a></div><div class="hero-card"><div class="avatar large">♡</div><p>“The right connection starts with a hello.”</p></div></main>
<footer><span>© <?= date('Y') ?> Soulmate</span><div><a href="login.php">Log in</a><a href="register.php">Create account</a></div></footer><script src="js/script.js"></script></body></html>
