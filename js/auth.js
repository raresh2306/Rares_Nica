// Authentication JavaScript

const API_BASE_URL = 'http://localhost:3000';

// Check if user is already logged in on page load
document.addEventListener('DOMContentLoaded', async () => {
    await checkAuthStatus();
    setupEventListeners();
});

// Check authentication status
async function checkAuthStatus() {
    try {
        const response = await fetch(`${API_BASE_URL}/api/auth/check`, {
            method: 'GET',
            credentials: 'include'
        });

        const data = await response.json();

        if (data.authenticated) {
            showUserInfo(data.user);
        } else {
            showAuthForms();
        }
    } catch (error) {
        console.error('Error checking auth status:', error);
        showAuthForms();
    }
}

// Setup event listeners
function setupEventListeners() {
    // Tab switching
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');

    if (loginTab && signupTab) {
        loginTab.addEventListener('click', () => {
            switchTab('login');
        });

        signupTab.addEventListener('click', () => {
            switchTab('signup');
        });
    }

    // Form submissions
    const loginFormElement = document.getElementById('loginForm');
    const signupFormElement = document.getElementById('signupForm');
    const logoutBtn = document.getElementById('logoutBtn');

    if (loginFormElement) {
        loginFormElement.addEventListener('submit', handleLogin);
    }

    if (signupFormElement) {
        signupFormElement.addEventListener('submit', handleSignup);
    }

    if (logoutBtn) {
        logoutBtn.addEventListener('click', handleLogout);
    }

    // Real-time email validation for signup
    const signupEmailInput = document.getElementById('signupEmail');
    if (signupEmailInput) {
        let emailCheckTimeout;
        signupEmailInput.addEventListener('blur', () => {
            const email = signupEmailInput.value.trim();
            if (email && email.includes('@')) {
                checkEmailAvailability(email);
            }
        });
        
        // Debounce email check on input
        signupEmailInput.addEventListener('input', () => {
            clearTimeout(emailCheckTimeout);
            emailCheckTimeout = setTimeout(() => {
                const email = signupEmailInput.value.trim();
                if (email && email.includes('@')) {
                    checkEmailAvailability(email);
                }
            }, 500);
        });
    }
}

// Check if email is available (real-time validation)
let emailCheckInProgress = false;
async function checkEmailAvailability(email) {
    if (emailCheckInProgress) return;
    
    const alertDiv = document.getElementById('signupAlert');
    const signupEmailInput = document.getElementById('signupEmail');
    
    if (!email || !email.includes('@')) {
        return;
    }

    emailCheckInProgress = true;
    
    try {
        const response = await fetch(`${API_BASE_URL}/api/auth/check-email/${encodeURIComponent(email)}`, {
            method: 'GET',
            credentials: 'include'
        });

        const data = await response.json();

        if (response.ok) {
            if (!data.available) {
                // Email is already taken
                if (signupEmailInput) {
                    signupEmailInput.classList.add('is-invalid');
                    showAlert(alertDiv, 'danger', data.message || 'This email is already registered. Please use a different email.');
                }
            } else {
                // Email is available
                if (signupEmailInput) {
                    signupEmailInput.classList.remove('is-invalid');
                    signupEmailInput.classList.add('is-valid');
                }
            }
        }
    } catch (error) {
        console.error('Email check error:', error);
        // Silently fail for real-time checks
    } finally {
        emailCheckInProgress = false;
    }
}

// Switch between login and signup tabs
function switchTab(tab) {
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const loginAlert = document.getElementById('loginAlert');
    const signupAlert = document.getElementById('signupAlert');

    // Clear alerts
    if (loginAlert) loginAlert.innerHTML = '';
    if (signupAlert) signupAlert.innerHTML = '';

    // Clear validation states when switching tabs
    const signupEmailInput = document.getElementById('signupEmail');
    if (signupEmailInput) {
        signupEmailInput.classList.remove('is-valid', 'is-invalid');
    }

    if (tab === 'login') {
        loginTab.classList.add('active');
        signupTab.classList.remove('active');
        loginForm.classList.add('active');
        signupForm.classList.remove('active');
    } else {
        signupTab.classList.add('active');
        loginTab.classList.remove('active');
        signupForm.classList.add('active');
        loginForm.classList.remove('active');
    }
}

// Handle login form submission
async function handleLogin(e) {
    e.preventDefault();

    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const alertDiv = document.getElementById('loginAlert');

    // Clear previous alerts
    alertDiv.innerHTML = '';

    try {
        const response = await fetch(`${API_BASE_URL}/api/auth/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok) {
            showAlert(alertDiv, 'success', data.message || 'Login successful!');
            
            // Clear form
            document.getElementById('loginForm').reset();
            
            // Show user info after short delay
            setTimeout(async () => {
                await checkAuthStatus();
            }, 1000);
        } else {
            showAlert(alertDiv, 'danger', data.error || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Login error:', error);
        showAlert(alertDiv, 'danger', 'Network error. Please try again later.');
    }
}

// Handle signup form submission
async function handleSignup(e) {
    e.preventDefault();

    const name = document.getElementById('signupName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const alertDiv = document.getElementById('signupAlert');

    // Clear previous alerts
    alertDiv.innerHTML = '';

    // Validate password length
    if (password.length < 6) {
        showAlert(alertDiv, 'danger', 'Password must be at least 6 characters long.');
        return;
    }

    try {
        const response = await fetch(`${API_BASE_URL}/api/auth/signup`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',
            body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();

        if (response.ok) {
            showAlert(alertDiv, 'success', data.message || 'Account created successfully!');
            
            // Clear form and validation states
            const signupForm = document.getElementById('signupForm');
            const signupEmailInput = document.getElementById('signupEmail');
            if (signupForm) signupForm.reset();
            if (signupEmailInput) signupEmailInput.classList.remove('is-valid', 'is-invalid');
            
            // Show user info after short delay
            setTimeout(async () => {
                await checkAuthStatus();
            }, 1000);
        } else {
            // Show error and mark email as invalid if it's a duplicate error
            const signupEmailInput = document.getElementById('signupEmail');
            if (data.error && data.error.toLowerCase().includes('already exists') && signupEmailInput) {
                signupEmailInput.classList.add('is-invalid');
                signupEmailInput.classList.remove('is-valid');
            }
            showAlert(alertDiv, 'danger', data.error || 'Signup failed. Please try again.');
        }
    } catch (error) {
        console.error('Signup error:', error);
        showAlert(alertDiv, 'danger', 'Network error. Please try again later.');
    }
}

// Handle logout
async function handleLogout() {
    try {
        const response = await fetch(`${API_BASE_URL}/api/auth/logout`, {
            method: 'POST',
            credentials: 'include'
        });

        const data = await response.json();

        if (response.ok) {
            showAuthForms();
        } else {
            console.error('Logout error:', data.error);
            alert('Error logging out. Please try again.');
        }
    } catch (error) {
        console.error('Logout error:', error);
        alert('Network error. Please try again later.');
    }
}

// Show alert message
function showAlert(container, type, message) {
    container.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
}

// Show user info section
function showUserInfo(user) {
    const authForms = document.getElementById('authForms');
    const userInfoSection = document.getElementById('userInfoSection');
    const userInfoText = document.getElementById('userInfoText');

    if (authForms) authForms.style.display = 'none';
    if (userInfoSection) {
        userInfoSection.style.display = 'block';
        if (userInfoText) {
            userInfoText.textContent = user.name || user.email;
        }
    }
}

// Show authentication forms
function showAuthForms() {
    const authForms = document.getElementById('authForms');
    const userInfoSection = document.getElementById('userInfoSection');

    if (authForms) authForms.style.display = 'block';
    if (userInfoSection) userInfoSection.style.display = 'none';
}

