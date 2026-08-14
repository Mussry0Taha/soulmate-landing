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
    <title>SoulMate · Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <h1>💕 SoulMate</h1>
            <p>Start your journey to love</p>
        </div>

        <form onsubmit="event.preventDefault(); handleRegister();" id="registerForm">
            <!-- Name -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" id="name" placeholder="e.g., Ahmed Khan" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" placeholder="you@example.com" required>
            </div>

            <!-- Password -->
            <div class="form-group password-group">
                <label>Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" placeholder="Min 6 characters" required>
                    <span class="toggle-eye" onclick="togglePassword('password', 'passIcon')" id="passIcon">👁️</span>
                </div>
                <div class="password-strength" id="passwordStrength"></div>
            </div>

            <!-- Confirm Password -->
            <div class="form-group password-group">
                <label>Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" id="confirm_password" placeholder="Re-enter password" required>
                </div>
                <small id="matchMsg" style="font-size:0.8rem; margin-top:4px; display:block;"></small>
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" id="dob" required>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label>Gender</label>
                <select id="gender" required>
                    <option value="">Select...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="non-binary">Non-binary</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Preference -->
            <div class="form-group">
                <label>Looking for</label>
                <select id="preference" required>
                    <option value="">Select...</option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="everyone">Everyone</option>
                </select>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label>Location (City)</label>
                <input type="text" id="location" placeholder="e.g., New York">
            </div>

            <!-- Bio -->
            <div class="form-group">
                <label>About You (Bio)</label>
                <textarea id="bio" rows="3" placeholder="Tell people about yourself..."></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn-primary btn-full">Create Account ❤️</button>
            <p style="text-align:center; margin-top:1.2rem;">
                Already have an account? <a href="login.php">Sign in</a>
            </p>
        </form>
    </div>
</div>

<script src="js/script.js"></script>
<script src="js/auth.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pass = document.getElementById('password');
    const confirm = document.getElementById('confirm_password');
    const strengthEl = document.getElementById('passwordStrength');
    const matchMsg = document.getElementById('matchMsg');

    pass.addEventListener('input', function() {
        const val = this.value;
        let strength = 'Weak';
        let color = '#e74c3c';
        if (val.length >= 8 && /[A-Z]/.test(val) && /[0-9]/.test(val)) {
            strength = 'Strong';
            color = '#27ae60';
        } else if (val.length >= 6 && /[A-Z]/.test(val)) {
            strength = 'Medium';
            color = '#f39c12';
        }
        strengthEl.textContent = 'Strength: ' + strength;
        strengthEl.style.color = color;
    });

    confirm.addEventListener('input', function() {
        if (this.value === pass.value && pass.value.length > 0) {
            matchMsg.textContent = '✅ Passwords match!';
            matchMsg.style.color = '#27ae60';
        } else if (this.value.length > 0) {
            matchMsg.textContent = '❌ Passwords do not match';
            matchMsg.style.color = '#e74c3c';
        } else {
            matchMsg.textContent = '';
        }
    });
});
</script>
</body>
</html>