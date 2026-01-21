// Cart functionality JavaScript
// Acest fisier gestioneaza functionalitatea cosului de cumparaturi
// Include operatiuni pentru adaugarea, stergerea si afisarea produselor din cos

// Actualizeaza badge-ul cu numarul de articole din cos in bara de navigare
// Functia face un request AJAX catre server pentru a obtine numarul total de articole
async function updateCartBadge() {
    try {
        const phpBasePath = getPHPBasePath();
        const response = await fetch(phpBasePath + 'cart-get.php');
        const data = await response.json();
        
        const badge = document.getElementById('cart-badge');
        if (badge) {
            if (data.item_count > 0) {
                badge.textContent = data.item_count;
                badge.style.display = 'block';
            } else {
                badge.style.display = 'none';
            }
        }
    } catch (error) {
        // In caz de eroare (de obicei daca user-ul nu e autentificat),
        // ascundem badge-ul fara sa afisam erori vizibile
        const badge = document.getElementById('cart-badge');
        if (badge) {
            badge.style.display = 'none';
        }
    }
}

// Determina calea catre fisierele PHP in functie de pagina curenta
// Folosim aceasta functie pentru ca paginile player au o structura de directoare diferita
function getPHPBasePath() {
    const isPlayerPage = window.location.pathname.includes('/players/');
    return isPlayerPage ? '../php/' : 'php/';
}

// Incarca si afiseaza articolele din cos prin AJAX
// Face request catre cart-get.php pentru a obtine datele cosului
async function loadCart() {
    try {
        const phpBasePath = getPHPBasePath();
        const response = await fetch(phpBasePath + 'cart-get.php');
        const data = await response.json();
        
        displayCart(data);
    } catch (error) {
        console.error('Error loading cart:', error);
        displayCart({ cart: [], total: 0, item_count: 0 });
    }
}

// Afiseaza articolele din cos in interfata utilizatorului
// Primeste datele cosului si genereaza HTML-ul dinamic pentru fiecare articol
function displayCart(data) {
    // Selectam elementele DOM pentru cos, total si mesajul de cos gol
    const cartContainer = document.getElementById('cart-items-container');
    const cartTotal = document.getElementById('cart-total');
    const emptyCartMsg = document.getElementById('empty-cart-message');

    // Daca container-ul nu exista, iesim din functie
    if (!cartContainer) return;

    // Daca avem articole in cos, le afisam
    if (data.cart && data.cart.length > 0) {
        // Ascundem mesajul de cos gol si golim container-ul
        if (emptyCartMsg) emptyCartMsg.style.display = 'none';
        cartContainer.innerHTML = '';

        // Parcurgem fiecare articol din cos si generam HTML-ul
        data.cart.forEach(item => {
            // Generam HTML-ul pentru fiecare articol din cos folosind template literals
            // Include imagine, nume, descriere, cantitate, pret si buton de stergere
            const cartItemHtml = `
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img src="${item.image_url || 'images/placeholder.jpg'}" class="img-fluid rounded-start" alt="${item.name}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">${item.description || ''}</p>
                                <p class="card-text"><small class="text-muted">Quantity: ${item.quantity}</small></p>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex flex-column justify-content-between align-items-end p-3">
                            <div>
                                <p class="fw-bold">$${item.item_total.toFixed(2)}</p>
                                <p class="text-muted small">$${item.price.toFixed(2)} each</p>
                            </div>
                            <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.cart_item_id})">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;
            cartContainer.innerHTML += cartItemHtml;
        });
        
        if (cartTotal) {
            cartTotal.textContent = `$${data.total.toFixed(2)}`;
        }
    } else {
        if (emptyCartMsg) emptyCartMsg.style.display = 'block';
        cartContainer.innerHTML = '';
        if (cartTotal) {
            cartTotal.textContent = '$0.00';
        }
    }
}

// Sterge un articol din cos dupa ID-ul articolului din cos
// Include confirmare de la utilizator si actualizeaza interfata dupa stergere
async function removeFromCart(cartItemId) {
    // Confirmam actiunea cu utilizatorul inainte de stergere
    if (!confirm('Are you sure you want to remove this item from your cart?')) {
        return;
    }
    
    try {
        const phpBasePath = getPHPBasePath();
        const response = await fetch(phpBasePath + 'cart-remove.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            credentials: 'include',
            body: JSON.stringify({ cartItemId: cartItemId })
        });
        
        const data = await response.json();
        
        if (data.success || response.ok) {
            // Reload cart
            await loadCart();
            await updateCartBadge();
        } else {
            alert('Error removing item: ' + (data.error || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error removing item:', error);
        alert('Error removing item. Please try again.');
    }
}

// Sistem de trimitere comanda cu confirmare temporizata
// Utilizatorul trebuie sa confirme de 2 ori: prima data pentru a intra in modul confirmare,
// a doua oara in timp de 5 secunde pentru a trimite comanda efectiv
let submitOrderTimer = null; // Timer pentru revenirea la starea initiala
let isConfirming = false; // Flag pentru starea de confirmare

async function submitOrder() {
    // Selectam elementele DOM pentru buton si bara de timp
    const btn = document.getElementById('submit-order-btn');
    const btnContent = document.getElementById('submit-btn-content');
    const timerBar = document.getElementById('timer-bar');

    // Daca nu suntem in modul confirmare, intram in el
    if (!isConfirming) {
        // Setam starea de confirmare si schimbam aspectul butonului
        isConfirming = true;
        btnContent.innerHTML = '<i class="fas fa-question-circle me-1"></i>Are you sure?';
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-warning');

        // Afisam si animam bara de timp pentru feedback vizual
        timerBar.style.display = 'block';
        timerBar.style.width = '100%';
        // Fortam reflow pentru a porni animatia CSS
        void timerBar.offsetWidth;
        timerBar.style.width = '0%';

        // Setam timer de 5 secunde pentru revenirea la starea initiala
        submitOrderTimer = setTimeout(() => {
            isConfirming = false;
            btnContent.innerHTML = '<i class="fas fa-check me-1"></i>Submit Order';
            btn.classList.remove('btn-warning');
            btn.classList.add('btn-primary');
            timerBar.style.display = 'none';
            timerBar.style.width = '100%'; // Reset for next time
        }, 5000);
    } else {
        // User confirmed - submit order
        clearTimeout(submitOrderTimer);
        isConfirming = false;
        btnContent.innerHTML = '<i class="fas fa-check-circle me-1"></i>Order placed successfully!';
        btn.classList.remove('btn-warning');
        btn.classList.add('btn-success');
        btn.disabled = true;
        timerBar.style.display = 'none';
        
        try {
            const phpBasePath = getPHPBasePath();
            const response = await fetch(phpBasePath + 'cart-submit-order.php', {
                method: 'POST',
                credentials: 'include'
            });
            
            const data = await response.json();
            
            if (data.success || response.ok) {
                // Keep success message, reload cart
                setTimeout(async () => {
                    await loadCart();
                    await updateCartBadge();
                    // Reset button after a moment
                    btn.disabled = false;
                    btnContent.innerHTML = '<i class="fas fa-check me-1"></i>Submit Order';
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-primary');
                }, 2000);
            } else {
                btnContent.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i>Error: ' + (data.error || 'Unknown error');
                btn.classList.remove('btn-success');
                btn.classList.add('btn-danger');
                btn.disabled = false;
                
                // Revert after 3 seconds
                setTimeout(() => {
                    btnContent.innerHTML = '<i class="fas fa-check me-1"></i>Submit Order';
                    btn.classList.remove('btn-danger');
                    btn.classList.add('btn-primary');
                }, 3000);
            }
        } catch (error) {
            console.error('Error submitting order:', error);
            btnContent.innerHTML = '<i class="fas fa-exclamation-circle me-1"></i>Error submitting order';
            btn.classList.remove('btn-success');
            btn.classList.add('btn-danger');
            btn.disabled = false;
            
            // Revert after 3 seconds
            setTimeout(() => {
                btnContent.innerHTML = '<i class="fas fa-check me-1"></i>Submit Order';
                btn.classList.remove('btn-danger');
                btn.classList.add('btn-primary');
            }, 3000);
        }
    }
}

// Initialize cart on page load (for cart.php)
document.addEventListener('DOMContentLoaded', async function() {
    if (window.location.pathname.includes('cart.php')) {
        await loadCart();
    }
    // Update badge on all pages
    await updateCartBadge();
});

// Make updateCartBadge available globally
window.updateCartBadge = updateCartBadge;
