async function handleRegister() {
    const name = document.getElementById('name')?.value.trim();
    const email = document.getElementById('email')?.value.trim();
    const password = document.getElementById('password')?.value;
    const confirm = document.getElementById('confirm_password')?.value;
    const dob = document.getElementById('dob')?.value;
    const gender = document.getElementById('gender')?.value;
    const preference = document.getElementById('preference')?.value;
    const bio = document.getElementById('bio')?.value.trim();
    const location = document.getElementById('location')?.value.trim();

    // Client-side validations
    if (!name || !email || !password || !dob || !gender || !preference) {
        showToast('Please fill in all required fields', 'error');
        return;
    }
    if (password !== confirm) {
        showToast('Passwords do not match', 'error');
        return;
    }
    if (password.length < 6) {
        showToast('Password must be at least 6 characters', 'error');
        return;
    }

    const payload = { name, email, password, dob, gender, preference, bio, location };

    try {
        const response = await fetch('api/register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });
        const data = await response.json();

        if (data.success) {
            showToast('Account created! Redirecting...', 'success');
            setTimeout(() => window.location.href = 'dashboard.php', 1500);
        } else {
            showToast(data.message, 'error');
        }
    } catch (err) {
        showToast('Network error. Please try again.', 'error');
    }
}

async function handleLogin() {
    const email = document.getElementById('email')?.value.trim();
    const password = document.getElementById('password')?.value;

    if (!email || !password) {
        showToast('Please enter email and password', 'error');
        return;
    }

    try {
        const response = await fetch('api/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });
        const data = await response.json();

        if (data.success) {
            showToast('Welcome back, ' + data.user.name + '!', 'success');
            setTimeout(() => window.location.href = 'dashboard.php', 1200);
        } else {
            showToast(data.message, 'error');
        }
    } catch (err) {
        showToast('Network error. Please try again.', 'error');
    }
}