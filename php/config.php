<?php
/**
 * Fișier de configurare pentru aplicația FC Barcelona
 * Conține setările bazei de date, inițializarea sesiunii și funcții de sincronizare
 */

// CONFIGURARE BAZĂ DE DATE
// Definirea constantelor pentru conexiunea la baza de date MySQL
// Folosim getenv() pentru a permite configurarea prin variabile de mediu (docker/cloud)
// Dacă nu există variabile de mediu, folosim valori default pentru dezvoltare locală
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');     // Host-ul bazei de date
define('DB_USER', getenv('DB_USER') ?: 'root');          // Utilizator baza de date
define('DB_PASS', getenv('DB_PASS') ?: 'rootpassword');  // Parola bazei de date
define('DB_NAME', getenv('DB_NAME') ?: 'football_db');    // Numele bazei de date

/**
 * Funcție pentru crearea conexiunii la baza de date
 * @return mysqli - Obiect conexiune MySQLi
 * @throws Exception - Dacă conexiunea eșuează
 */
function getDBConnection() {
    try {
        // Creăm o nouă conexiune MySQLi cu parametrii definiți mai sus
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        // Verificăm dacă conexiunea a reușit
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Setăm charset-ul la UTF8MB4 pentru suport complet Unicode (incl. emoji)
        $conn->set_charset("utf8mb4");
        
        return $conn;
    } catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }
}


// CONFIGURARE SESIUNE
// Verificăm dacă sesiunea nu este deja activă pentru a evita erori
// Session este necesară pentru a stoca informațiile despre utilizatorul autentificat
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// CONFIGURARE BACKEND NODE.JS
// URL-ul pentru backend-ul Node.js folosit pentru sincronizare și backup
// Folosim getenv() pentru flexibilitate în deployment (docker/cloud)
define('BACKEND_URL', getenv('BACKEND_URL') ?: 'http://localhost:3000');

/**
 * Funcție pentru sincronizarea datelor cu backend-ul Node.js
 * Această funcție trimite date către backend într-un mod non-blocant
 * Folosită ca backup sistem și pentru sincronizare între PHP și Node.js
 * 
 * @param string $endpoint - Endpoint-ul API de pe backend (ex: '/api/auth/login')
 * @param array $data - Datele de trimis către backend
 * @return void - Funcția este silentioasă, nu returnează rezultat
 */
function syncToBackend($endpoint, $data) {
    $backendUrl = BACKEND_URL . $endpoint;
    
    try {
        // Inițializăm cURL pentru request HTTP către backend
        $ch = curl_init($backendUrl);
        
        // Configurăm cURL pentru request POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Returnăm response-ul în loc să-l afișăm
        curl_setopt($ch, CURLOPT_POST, true);             // Folosim metoda POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Encodăm datele ca JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'             // Setăm header-ul Content-Type
        ]);
        
        // Setăm timeout-uri scurte pentru a nu bloca execuția PHP
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);             // Timeout total de 2 secunde
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);      // Timeout de conectare de 1 secundă
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  // Dezactivăm SSL verify pentru localhost
        
        // Executăm request-ul
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Logăm erorile de server (500+) dar ignorăm erorile de client (400+)
        // 400+ înseamnă că datele sunt deja în backend (ex: user deja existent)
        if ($httpCode >= 500) {
            error_log("Backend sync error for $endpoint: HTTP $httpCode");
        }
        // 400 errors (like "user already exists") are acceptable - data is already in backend
    } catch (Exception $e) {
        // Ignorăm orice excepție - sincronizarea cu backend nu trebuie să blocheze funcționalitatea
        // Aplicația PHP trebuie să funcționeze independent chiar dacă backend-ul e down
    }
}
?>
