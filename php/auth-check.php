<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (isset($_SESSION['userId'])) {
    echo json_encode([
        'authenticated' => true,
        'user' => [
            'id' => $_SESSION['userId'],
            'email' => $_SESSION['email'],
            'name' => $_SESSION['name']
        ]
    ]);
} else {
    echo json_encode(['authenticated' => false]);
}
?>
