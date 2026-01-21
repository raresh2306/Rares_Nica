/**
 * Script JavaScript pentru gestionarea autentificării cu backend PHP
 * Conține funcționalități pentru login, signup, logout și validare email
 * Interacționează cu endpoint-urile PHP din directorul /php
 */

// CONFIGURARE API
// URL-ul de bază pentru endpoint-urile PHP de autentificare
const API_BASE_URL = 'php'; // PHP endpoints are in the php/ directory

// INITIALIZARE LA ÎNCĂRCAREA PAGINII
// Verificăm starea de autentificare și configurăm event listeners când pagina se încarcă
document.addEventListener('DOMContentLoaded', async () => {
    await checkAuthStatus();  // Verificăm dacă utilizatorul este deja logat
    setupEventListeners();     // Configurăm butoanele și formularele
});

/**
 * Verifică starea de autentificare a utilizatorului
 * Face un request către auth-check.php pentru a vedea dacă există sesiune activă
 * Actualizează UI-ul în funcție de starea de autentificare
 */
async function checkAuthStatus() {
    try {
        // Facem un request GET către endpoint-ul de verificare autentificare
        const response = await fetch(`${API_BASE_URL}/auth-check.php`, {
            method: 'GET',
            credentials: 'include' // Important pentru a trimite cookie-urile de sesiune
        });

        const data = await response.json();

        if (data.authenticated) {
            // Utilizatorul este logat - arătăm informațiile utilizatorului
            showUserInfo(data.user);
        } else {
            // Utilizatorul nu este logat - arătăm formularele de login/signup
            showAuthForms();
        }
    } catch (error) {
        console.error('Error checking auth status:', error);
        // În caz de eroare, arătăm formularele de autentificare
        showAuthForms();
    }
}

/**
 * Configurează toți event listeners pentru interacțiunile utilizatorului
 * - Switch între tab-uri (login/signup)
 * - Submit formulare
 * - Logout
 * - Validare email în timp real
 */
function setupEventListeners() {
    // TAB SWITCHING - Schimbare între login și signup
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');

    if (loginTab && signupTab) {
        // Event listener pentru click pe tab-ul de login
        loginTab.addEventListener('click', () => {
            switchTab('login');
        });

        // Event listener pentru click pe tab-ul de signup
        signupTab.addEventListener('click', () => {
            switchTab('signup');
        });
    }

    // FORM SUBMISSIONS - Trimitere formulare
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

    // REAL-TIME EMAIL VALIDATION - Validare email în timp real pentru signup
    const signupEmailInput = document.getElementById('signupEmail');
    if (signupEmailInput) {
        let emailCheckTimeout;
        
        // Validare la pierderea focus-ului (blur event)
        signupEmailInput.addEventListener('blur', () => {
            const email = signupEmailInput.value.trim();
            if (email && email.includes('@')) {
                checkEmailAvailability(email);
            }
        });
        
        // Validare la typing cu debounce pentru a nu face prea multe request-uri
        signupEmailInput.addEventListener('input', () => {
            clearTimeout(emailCheckTimeout);
            emailCheckTimeout = setTimeout(() => {
                const email = signupEmailInput.value.trim();
                if (email && email.includes('@')) {
                    checkEmailAvailability(email);
                }
            }, 500); // Așteptăm 500ms după ce utilizatorul termină de scris
        });
    }
}

/**
 * Verifică disponibilitatea email-ului în timp real (validare pentru signup)
 * Folosește debounce pentru a evita request-uri multiple
 * Actualizează UI-ul cu feedback vizual (valid/invalid)
 */
let emailCheckInProgress = false; // Flag pentru a preveni request-uri simultane
async function checkEmailAvailability(email) {
    // Verificăm dacă deja există un check în progres
    if (emailCheckInProgress) return;
    
    const alertDiv = document.getElementById('signupAlert');
    const signupEmailInput = document.getElementById('signupEmail');
    
    // Validare basic - email-ul trebuie să conțină '@'
    if (!email || !email.includes('@')) {
        return;
    }

    emailCheckInProgress = true; // Setăm flag-ul pentru a preveni duplicate
    
    try {
        // Facem request către backend pentru a verifica disponibilitatea email-ului
        const response = await fetch(`${API_BASE_URL}/check-email.php?email=${encodeURIComponent(email)}`, {
            method: 'GET',
            credentials: 'include' // Trimitem cookie-urile de sesiune
        });

        const data = await response.json();

        if (response.ok) {
            if (!data.available) {
                // EMAIL DEJA ÎNREGISTRAT - Arătăm eroare
                if (signupEmailInput) {
                    signupEmailInput.classList.add('is-invalid'); // Stil Bootstrap pentru eroare
                    showAlert(alertDiv, 'danger', data.message || 'This email is already registered. Please use a different email.');
                }
            } else {
                // EMAIL DISPONIBIL - Arătăm confirmare vizuală
                if (signupEmailInput) {
                    signupEmailInput.classList.remove('is-invalid');
                    signupEmailInput.classList.add('is-valid'); // Stil Bootstrap pentru succes
                }
            }
        }
    } catch (error) {
        console.error('Email check error:', error);
        // Ignorăm erorile la validarea în timp real pentru a nu bloca utilizatorul
    } finally {
        emailCheckInProgress = false; // Resetăm flag-ul
    }
}

/**
 * Schimbă între tab-ul de login și signup
 * @param {string} tab - 'login' sau 'signup'
 */
function switchTab(tab) {
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const loginAlert = document.getElementById('loginAlert');
    const signupAlert = document.getElementById('signupAlert');

    // Curățăm alertele când schimbăm tab-uri
    if (loginAlert) loginAlert.innerHTML = '';
    if (signupAlert) signupAlert.innerHTML = '';

    // Resetăm stările de validare când schimbăm tab-uri
    const signupEmailInput = document.getElementById('signupEmail');
    if (signupEmailInput) {
        signupEmailInput.classList.remove('is-valid', 'is-invalid');
    }

    if (tab === 'login') {
        // Activăm tab-ul de login
        loginTab.classList.add('active');
        signupTab.classList.remove('active');
        loginForm.classList.add('active');
        signupForm.classList.remove('active');
    } else {
        // Activăm tab-ul de signup
        signupTab.classList.add('active');
        loginTab.classList.remove('active');
        signupForm.classList.add('active');
        loginForm.classList.remove('active');
    }
}

/**
 * Gestionează trimiterea formularului de login
 * @param {Event} e - Event-ul de submit
 */
async function handleLogin(e) {
    e.preventDefault(); // Prevenim comportamentul default de submit

    // Preluăm datele din formular
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const alertDiv = document.getElementById('loginAlert');

    // Curățăm alertele anterioare
    alertDiv.innerHTML = '';

    try {
        // Trimitem request-ul de login către backend
        const response = await fetch(`${API_BASE_URL}/auth-login.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include', // Important pentru a primi cookie-urile de sesiune
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok) {
            // LOGIN SUCCES - Arătăm mesaj de succes
            showAlert(alertDiv, 'success', data.message || 'Login successful!');
            
            // Resetăm formularul
            document.getElementById('loginForm').reset();
            
            // Verificăm din nou starea de autentificare după un scurt delay
            setTimeout(async () => {
                await checkAuthStatus();
            }, 1000);
        } else {
            // LOGIN EȘUAT - Arătăm eroarea
            showAlert(alertDiv, 'danger', data.error || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Login error:', error);
        showAlert(alertDiv, 'danger', 'Network error. Please try again later.');
    }
}

/**
 * Gestionează trimiterea formularului de signup (înregistrare cont nou)
 * @param {Event} e - Event-ul de submit
 */
async function handleSignup(e) {
    e.preventDefault(); // Prevenim comportamentul default de submit

    // Preluăm datele din formularul de signup
    const name = document.getElementById('signupName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const alertDiv = document.getElementById('signupAlert');

    // Curățăm alertele anterioare
    alertDiv.innerHTML = '';

    // VALIDARE PAROLĂ - Verificăm lungimea minimă
    if (password.length < 6) {
        showAlert(alertDiv, 'danger', 'Password must be at least 6 characters long.');
        return;
    }

    try {
        // Trimitem request-ul de signup către backend
        const response = await fetch(`${API_BASE_URL}/auth-signup.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include', // Important pentru a primi cookie-urile de sesiune
            body: JSON.stringify({ name, email, password })
        });

        const data = await response.json();

        if (response.ok) {
            // SIGNUP SUCCES - Arătăm mesaj de succes
            showAlert(alertDiv, 'success', data.message || 'Account created successfully!');
            
            // Resetăm formularul și stările de validare
            const signupForm = document.getElementById('signupForm');
            const signupEmailInput = document.getElementById('signupEmail');
            if (signupForm) signupForm.reset();
            if (signupEmailInput) signupEmailInput.classList.remove('is-valid', 'is-invalid');
            
            // Verificăm din nou starea de autentificare după un scurt delay
            setTimeout(async () => {
                await checkAuthStatus();
            }, 1000);
        } else {
            // SIGNUP EȘUAT - Arătăm eroarea și marcăm email-ul ca invalid dacă e duplicat
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

/**
 * Gestionează logout-ul utilizatorului
 * Trimite request către backend și actualizează UI-ul
 */
async function handleLogout() {
    try {
        // Trimitem request-ul de logout către backend
        const response = await fetch(`${API_BASE_URL}/auth-logout.php`, {
            method: 'POST',
            credentials: 'include' // Important pentru a trimite cookie-urile de sesiune
        });

        const data = await response.json();

        if (response.ok) {
            // LOGOUT SUCCES - Arătăm formularele de autentificare
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

/**
 * Afișează un mesaj de alertă în containerul specificat
 * @param {HTMLElement} container - Elementul unde se va afișa alerta
 * @param {string} type - Tipul alertei ('success', 'danger', 'warning', 'info')
 * @param {string} message - Mesajul de afișat
 */
function showAlert(container, type, message) {
    container.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
}

/**
 * Afișează secțiunea cu informațiile utilizatorului logat
 * Ascunde formularele de autentificare și arătăm datele utilizatorului
 * @param {Object} user - Obiect cu datele utilizatorului
 */
function showUserInfo(user) {
    const authForms = document.getElementById('authForms');
    const userInfoSection = document.getElementById('userInfoSection');
    const userInfoText = document.getElementById('userInfoText');

    // Ascundem formularele de login/signup
    if (authForms) authForms.style.display = 'none';
    
    // Afișăm secțiunea cu informațiile utilizatorului
    if (userInfoSection) {
        userInfoSection.style.display = 'block';
        if (userInfoText) {
            // Afișăm numele utilizatorului sau email-ul dacă nu are nume
            userInfoText.textContent = user.name || user.email;
        }
    }
}

/**
 * Afișează formularele de autentificare (login/signup)
 * Ascunde secțiunea cu informațiile utilizatorului
 */
function showAuthForms() {
    const authForms = document.getElementById('authForms');
    const userInfoSection = document.getElementById('userInfoSection');

    // Afișăm formularele de autentificare
    if (authForms) authForms.style.display = 'block';
    
    // Ascundem secțiunea cu informațiile utilizatorului
    if (userInfoSection) userInfoSection.style.display = 'none';
}
