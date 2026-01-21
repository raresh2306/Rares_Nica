<?php
/**
 * Endpoint pentru preluarea produselor din coșul de cumpărături
 * Returnează lista de produse, totalul și numărul de articole pentru utilizatorul logat
 * Folosit pentru afișarea coșului și actualizarea badge-ului din navbar
 */
require_once 'config.php';

// Setăm header-ul pentru a indica că returnăm JSON
header('Content-Type: application/json');

// VERIFICARE METODĂ HTTP
// Acceptăm doar request-uri GET pentru preluarea datelor din coș
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// VERIFICARE AUTENTIFICARE
// Utilizatorul trebuie să fie logat pentru a-și vedea coșul de cumpărături
if (!isset($_SESSION['userId'])) {
    // Dacă nu e logat, returnăm coș gol
    echo json_encode(['cart' => [], 'total' => 0, 'item_count' => 0]);
    exit;
}

// Preluăm ID-ul utilizatorului din sesiune
$userId = $_SESSION['userId'];

// Obținem conexiunea la baza de date
$conn = getDBConnection();

try {
    // INTEROGARE COMPLEXĂ pentru preluarea produselor din coș
    // Facem JOIN între tabelul cart_items și products pentru a obține toate detaliile
    $sql = "
        SELECT
            ci.id as cart_item_id,    -- ID-ul articolului din coș
            ci.quantity,              -- Cantitatea comandată
            p.id as product_id,       -- ID-ul produsului
            p.name,                   -- Numele produsului
            p.description,            -- Descrierea produsului
            p.price,                  -- Prețul per unitate
            p.image_url               -- URL-ul imaginii produsului
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id  -- JOIN pentru a obține detaliile produsului
        WHERE ci.user_id = ?                      -- Filtrăm după utilizatorul curent
        ORDER BY ci.created_at DESC               -- Ordonăm după data adăugării (cel mai recent primul)
    ";

    // Pregătim și executăm interogarea cu prepared statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId); // 'i' înseamnă integer pentru userId
    $stmt->execute();
    $result = $stmt->get_result();

    // Inițializăm variabilele pentru calcularea totalului
    $cartItems = [];
    $total = 0;
    $itemCount = 0;

    // Parcurgem fiecare articol din coș și calculăm totalurile
    while ($row = $result->fetch_assoc()) {
        // Calculăm totalul per articol (preț × cantitate)
        $itemTotal = floatval($row['price']) * intval($row['quantity']);
        $total += $itemTotal;                    // Adăugăm la totalul general
        $itemCount += intval($row['quantity']);  // Incrementăm numărul total de articole

        // Adăugăm articolul în array-ul de coș cu toate detaliile necesare
        $cartItems[] = [
            'cart_item_id' => intval($row['cart_item_id']),  // ID-ul unic al articolului din coș
            'product_id' => intval($row['product_id']),        // ID-ul produsului
            'name' => $row['name'],                           // Numele produsului
            'description' => $row['description'],             // Descrierea produsului
            'price' => floatval($row['price']),               // Prețul per unitate
            'quantity' => intval($row['quantity']),           // Cantitatea
            'image_url' => $row['image_url'],                 // URL imagine
            'item_total' => $itemTotal                       // Total per articol (preț × cantitate)
        ];
    }

    // RETURNĂM RĂSPUNSUL JSON cu datele complete ale coșului
    echo json_encode([
        'cart' => $cartItems,                    // Array cu toate articolele din coș
        'total' => round($total, 2),            // Totalul general rotunjit la 2 zecimale
        'item_count' => $itemCount               // Numărul total de articole
    ]);

} catch (Exception $e) {
    // TRATARE EROARE BAZĂ DE DATE
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    // ÎNCHIDERE CONEXIUNE
    // Ne asigurăm că conexiunea la baza de date este întotdeauna închisă
    $conn->close();
}
?>
