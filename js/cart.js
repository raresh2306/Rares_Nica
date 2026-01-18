// Cart functionality JavaScript

// Update cart badge in navbar
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
        // Silently fail if not authenticated
        const badge = document.getElementById('cart-badge');
        if (badge) {
            badge.style.display = 'none';
        }
    }
}

// Get PHP base path based on page location
function getPHPBasePath() {
    const isPlayerPage = window.location.pathname.includes('/players/');
    return isPlayerPage ? '../php/' : 'php/';
}

// Load and display cart items
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

// Display cart items
function displayCart(data) {
    const cartContainer = document.getElementById('cart-items-container');
    const cartTotal = document.getElementById('cart-total');
    const emptyCartMsg = document.getElementById('empty-cart-message');
    
    if (!cartContainer) return;
    
    if (data.cart && data.cart.length > 0) {
        if (emptyCartMsg) emptyCartMsg.style.display = 'none';
        cartContainer.innerHTML = '';
        
        data.cart.forEach(item => {
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

// Remove item from cart
async function removeFromCart(cartItemId) {
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

// Submit order
async function submitOrder() {
    if (!confirm('Are you sure you want to submit this order?')) {
        return;
    }
    
    try {
        const phpBasePath = getPHPBasePath();
        const response = await fetch(phpBasePath + 'cart-submit-order.php', {
            method: 'POST',
            credentials: 'include'
        });
        
        const data = await response.json();
        
        if (data.success || response.ok) {
            alert('Order submitted successfully! Order ID: ' + data.order_id);
            // Reload cart (should be empty now)
            await loadCart();
            await updateCartBadge();
        } else {
            alert('Error submitting order: ' + (data.error || 'Unknown error'));
        }
    } catch (error) {
        console.error('Error submitting order:', error);
        alert('Error submitting order. Please try again.');
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
