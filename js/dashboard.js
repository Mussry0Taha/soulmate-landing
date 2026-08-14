let currentUser = null;

async function loadProfile() {
    const user = await checkSession();
    if (!user) return;
    currentUser = user;

    // Populate profile fields
    document.getElementById('profileName').textContent = user.name;
    document.getElementById('profileEmail').textContent = user.email;
    document.getElementById('avatar').src = user.profile_pic || 'assets/default-avatar.png';
    
    // Fill form fields (edit mode)
    document.getElementById('editName').value = user.name || '';
    document.getElementById('editBio').value = user.bio || '';
    document.getElementById('editLocation').value = user.location || '';
    document.getElementById('editGender').value = user.gender || '';
    document.getElementById('editPreference').value = user.preference || '';
}

async function updateProfile() {
    const name = document.getElementById('editName').value.trim();
    const bio = document.getElementById('editBio').value.trim();
    const location = document.getElementById('editLocation').value.trim();
    const gender = document.getElementById('editGender').value;
    const preference = document.getElementById('editPreference').value;

    if (!name) {
        showToast('Name is required', 'error');
        return;
    }

    const payload = { name, bio, location, gender, preference };

    try {
        const response = await fetch('api/update_profile.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });
        const data = await response.json();

        if (data.success) {
            showToast('Profile updated successfully!', 'success');
            loadProfile(); // Reload with new data
        } else {
            showToast(data.message, 'error');
        }
    } catch (err) {
        showToast('Network error. Please try again.', 'error');
    }
}

// Load profile when page loads
document.addEventListener('DOMContentLoaded', loadProfile);