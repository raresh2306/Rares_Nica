/**
 * Script JavaScript pentru gestionarea stării de autentificare în bara de navigare
 * Actualizează dinamic butonul de login/logout în funcție de starea utilizatorului
 * Funcționează pe toate paginile site-ului inclusiv paginile de jucători
 */

// INITIALIZARE LA ÎNCĂRCAREA PAGINII
// Verificăm starea de autentificare și actualizăm navbar-ul când pagina se încarcă
document.addEventListener('DOMContentLoaded', async function() {
    await updateNavbarAuth();
});

/**
 * Determină calea corectă către fișierele PHP în funcție de locația paginii curente
 * Paginile de jucători sunt în subdirectoare și necesită cale relativă (../php/)
 * @return {string} - Calea către directorul php
 */
function getPHPBasePath() {
    const isPlayerPage = window.location.pathname.includes('/players/');
    return isPlayerPage ? '../php/' : 'php/';
}

/**
 * Actualizează starea de autentificare în bara de navigare
 * Verifică dacă utilizatorul este logat și modifică butonul din navbar corespunzător
 */
async function updateNavbarAuth() {
    try {
        // Obținem calea corectă către fișierele PHP
        const phpBasePath = getPHPBasePath();
        
        // Verificăm starea de autentificare prin request către auth-check.php
        const response = await fetch(phpBasePath + 'auth-check.php', {
            method: 'GET',
            credentials: 'include' // Important pentru a trimite cookie-urile de sesiune
        });
        
        const data = await response.json();
        
        // Căutăm butonul de login în navbar folosind selectori specifici
        const navItems = document.querySelectorAll('.nav-item.d-flex.align-items-center');
        
        navItems.forEach(navItem => {
            const loginBtn = navItem.querySelector('a[href*="login.php"]');
            
            // Dacă nu găsim butonul de login, continuăm la următorul element
            if (!loginBtn) return;
            
            if (data.authenticated) {
                // UTILIZATORUL ESTE LOGAT - Transformăm butonul în logout
                loginBtn.href = '#'; // Prevenim navigarea
                
                // Adăugăm event listener pentru logout
                loginBtn.onclick = async function(e) {
                    e.preventDefault(); // Prevenim comportamentul default
                    
                    try {
                        // Trimitem request de logout către backend
                        const logoutResponse = await fetch(phpBasePath + 'auth-logout.php', {
                            method: 'POST',
                            credentials: 'include'
                        });
                        
                        if (logoutResponse.ok) {
                            // Logout succes - reîncărcăm pagina pentru a actualiza navbar-ul
                            window.location.reload();
                        } else {
                            alert('Error logging out. Please try again.');
                        }
                    } catch (error) {
                        console.error('Logout error:', error);
                        alert('Error logging out. Please try again.');
                    }
                };
                
                // Actualizăm textul și iconița butonului pentru logout
                loginBtn.innerHTML = '<i class="fas fa-sign-out-alt me-1"></i>Logout';
            } else {
                // UTILIZATORUL NU ESTE LOGAT - Afișăm butonul de login
                // Eliminăm event handler-ul de logout dacă există
                loginBtn.onclick = null;
                
                // Verificăm dacă link-ul este corect setat către login.php
                const currentPath = loginBtn.getAttribute('href');
                if (!currentPath || currentPath === '#' || !currentPath.includes('login.php')) {
                    // Setăm calea corectă în funcție de locația paginii
                    const isPlayerPage = window.location.pathname.includes('/players/');
                    loginBtn.href = isPlayerPage ? '../login.php' : 'login.php';
                }
                
                // Actualizăm textul și iconița butonului pentru login
                loginBtn.innerHTML = '<i class="fas fa-user me-1"></i>Login';
            }
        });
    } catch (error) {
        console.error('Error checking auth status:', error);
        // În caz de eroare, lăsăm butonul în starea default (login)
    }
}
