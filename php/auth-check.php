<?php
/**
 * Endpoint pentru verificarea stării de autentificare a utilizatorului
 * Returnează informații despre utilizatorul curent logat sau starea de neautentificat
 * Folosit de frontend pentru a actualiza UI-ul în funcție de starea de login
 */
require_once 'config.php';

// Setăm header-ul pentru a indica că returnăm JSON
header('Content-Type: application/json');

// VERIFICARE METODĂ HTTP
// Acceptăm doar request-uri GET pentru verificarea stării de autentificare
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// VERIFICARE SESIUNE UTILIZATOR
// Verificăm dacă utilizatorul are o sesiune activă (este logat)
if (isset($_SESSION['userId'])) {
    // UTILIZATORUL ESTE LOGAT - Returnăm informațiile utilizatorului
    echo json_encode([
        'authenticated' => true,
        'user' => [
            'id' => $_SESSION['userId'],      // ID-ul utilizatorului din sesiune
            'email' => $_SESSION['email'],    // Email-ul utilizatorului din sesiune
            'name' => $_SESSION['name']       // Numele utilizatorului din sesiune
        ]
    ]);
} else {
    // UTILIZATORUL NU ESTE LOGAT - Returnăm starea de neautentificat
    echo json_encode(['authenticated' => false]);
}
?>
