<?php
// Database configuration
// Use environment variables if available (for Docker), otherwise use defaults
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: 'rootpassword');
define('DB_NAME', getenv('DB_NAME') ?: 'football_db');

// Create database connection
function getDBConnection() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Set charset to utf8mb4
        $conn->set_charset("utf8mb4");
        
        return $conn;
    } catch (Exception $e) {
        die("Database connection error: " . $e->getMessage());
    }
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Backend URL for backup/sync (Node.js backend)
define('BACKEND_URL', getenv('BACKEND_URL') ?: 'http://localhost:3000');

// Helper function to send data to Node.js backend (for backup)
// This ensures data is saved to both PHP (primary) and Node.js backend (backup)
function syncToBackend($endpoint, $data) {
    $backendUrl = BACKEND_URL . $endpoint;
    
    try {
        $ch = curl_init($backendUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2); // 2 second timeout - don't block if backend is down
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For local development
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Accept 200-299 as success, and 400 for "already exists" (data is already backed up)
        // Only log actual errors (500+) or connection failures
        if ($httpCode >= 500) {
            error_log("Backend sync error for $endpoint: HTTP $httpCode");
        }
        // 400 errors (like "user already exists") are acceptable - data is already in backend
    } catch (Exception $e) {
        // Silently fail - backend sync is optional backup
        // Data is already saved in PHP/MySQL, so this is just redundancy
    }
}
?>
