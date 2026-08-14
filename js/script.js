// Global helper: Show floating toast notifications
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.style.cssText = `
        position: fixed; bottom: 20px; right: 20px; 
        padding: 16px 28px; border-radius: 12px; 
        font-weight: 600; z-index: 9999;
        background: ${type === 'success' ? '#6c5ce7' : '#e74c3c'};
        color: white; box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        animation: slideUp 0.4s ease forwards;
        max-width: 90%;
    `;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 4000);
}

// Helper to show/hide password
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (!input || !icon) return;
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = '🙈';
    } else {
        input.type = 'password';
        icon.textContent = '👁️';
    }
}

// Check if user is logged in (call this on protected pages)
async function checkSession() {
    try {
        const response = await fetch('api/get_profile.php');
        const data = await response.json();
        if (!data.success) {
            window.location.href = 'login.php';
            return null;
        }
        return data.user;
    } catch (err) {
        window.location.href = 'login.php';
        return null;
    }
}

// Logout function
async function logout() {
    try {
        await fetch('api/logout.php', { method: 'POST' });
        window.location.href = 'index.php';
    } catch (err) {
        showToast('Logout failed', 'error');
    }
}

// Inject keyframe animation for toast dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);