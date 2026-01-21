<?php
/**
 * Endpoint pentru adăugarea produselor în coșul de cumpărături
 * Primește productId și quantity, verifică autentificarea și validează produsul
 * Actualizează cantitatea dacă produsul există deja sau adaugă produs nou
 */
require_once 'config.php';

// Setăm header-ul pentru a indica că returnăm JSON
header('Content-Type: application/json');

// VERIFICARE METODĂ HTTP
// Acceptăm doar request-uri POST pentru adăugarea în coș
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// VERIFICARE AUTENTIFICARE
// Utilizatorul trebuie să fie logat pentru a adăuga produse în coș
if (!isset($_SESSION['userId'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'User not authenticated', 'requires_login' => true]);
    exit;
}

// Preluăm ID-ul utilizatorului din sesiune
$userId = $_SESSION['userId'];

// PRELUARE DATE DIN REQUEST
// Decodăm datele JSON din corpul request-ului
$input = json_decode(file_get_contents('php://input'), true);
$productId = $input['productId'] ?? null;
$quantity = $input['quantity'] ?? 1; // Default quantity este 1

// VALIDARE DATE INPUT
// Verificăm dacă productId este valid și quantity este pozitiv
if (!$productId || !is_numeric($productId) || $quantity < 1) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid product ID or quantity']);
    exit;
}

// Obținem conexiunea la baza de date
$conn = getDBConnection();

try {
    // VERIFICARE EXISTENȚĂ PRODUS
    // Verificăm dacă produsul există în baza de date înainte de a-l adăuga în coș
    $stmt = $conn->prepare("SELECT id FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId); // 'i' înseamnă integer
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404); // Not Found
        echo json_encode(['error' => 'Product not found']);
        exit;
    }

    // VERIFICARE DACĂ PRODUSUL ESTE DEJA ÎN COȘ
    // Căutăm produsul în coșul utilizatorului curent
    $stmt = $conn->prepare("SELECT quantity FROM cart_items WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // PRODUSUL EXISTĂ ÎN COȘ - ACTUALIZARE CANTITATE
        // Calculăm noua cantitate (cantitatea existentă + cea adăugată)
        $newQuantity = $row['quantity'] + $quantity;
        
        // Actualizăm cantitatea în baza de date
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("iii", $newQuantity, $userId, $productId);
        $stmt->execute();
        
        echo json_encode([
            'success' => true, 
            'message' => 'Product quantity updated in cart', 
            'new_quantity' => $newQuantity
        ]);
    } else {
        // PRODUS NOU ÎN COȘ - INSERARE
        // Adăugăm produsul nou în coșul utilizatorului
        $stmt = $conn->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $userId, $productId, $quantity);
        $stmt->execute();
        
        echo json_encode([
            'success' => true, 
            'message' => 'Product added to cart', 
            'quantity' => $quantity
        ]);
    }

} catch (Exception $e) {
    // TRATARE EROARE BAZĂ DE DATE
    // Returnăm un mesaj de eroare detaliat pentru debugging
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    // ÎNCHIDERE CONEXIUNE
    // Ne asigurăm că conexiunea la baza de date este întotdeauna închisă
    $conn->close();
}
?>
