// Update navbar login/logout button based on authentication status
document.addEventListener('DOMContentLoaded', async function() {
    await updateNavbarAuth();
});

// Determine correct path based on current page location
function getPHPBasePath() {
    const isPlayerPage = window.location.pathname.includes('/players/');
    return isPlayerPage ? '../php/' : 'php/';
}

async function updateNavbarAuth() {
    try {
        const phpBasePath = getPHPBasePath();
        const response = await fetch(phpBasePath + 'auth-check.php', {
            method: 'GET',
            credentials: 'include'
        });
        
        const data = await response.json();
        
        // Find the login button/link in navbar
        const navItems = document.querySelectorAll('.nav-item.d-flex.align-items-center');
        
        navItems.forEach(navItem => {
            const loginBtn = navItem.querySelector('a[href*="login.php"]');
            
            if (!loginBtn) return;
            
            if (data.authenticated) {
                // User is logged in - show logout button
                loginBtn.href = '#';
                loginBtn.onclick = async function(e) {
                    e.preventDefault();
                    
                    try {
                        const logoutResponse = await fetch(phpBasePath + 'auth-logout.php', {
                            method: 'POST',
                            credentials: 'include'
                        });
                        
                        if (logoutResponse.ok) {
                            // Reload page to refresh navbar
                            window.location.reload();
                        } else {
                            alert('Error logging out. Please try again.');
                        }
                    } catch (error) {
                        console.error('Logout error:', error);
                        alert('Error logging out. Please try again.');
                    }
                };
                
                // Update button text and icon
                loginBtn.innerHTML = '<i class="fas fa-sign-out-alt me-1"></i>Logout';
            } else {
                // User is not logged in - show login button
                // Make sure it's a regular link (remove onclick if exists)
                loginBtn.onclick = null;
                const currentPath = loginBtn.getAttribute('href');
                if (!currentPath || currentPath === '#' || !currentPath.includes('login.php')) {
                    // Determine correct path based on current location
                    const isPlayerPage = window.location.pathname.includes('/players/');
                    loginBtn.href = isPlayerPage ? '../login.php' : 'login.php';
                }
                
                // Update button text and icon
                loginBtn.innerHTML = '<i class="fas fa-user me-1"></i>Login';
            }
        });
    } catch (error) {
        console.error('Error checking auth status:', error);
    }
}
