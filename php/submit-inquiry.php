<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$name = isset($data['name']) ? trim($data['name']) : '';
$email = isset($data['email']) ? trim($data['email']) : '';
$phone = isset($data['phone']) ? trim($data['phone']) : '';
$interested = isset($data['interested']) ? trim($data['interested']) : '';
$agree = isset($data['agree']) ? ($data['agree'] === 'yes' ? 'yes' : 'no') : 'no';

// Validate required fields
if (empty($name) || empty($email) || empty($interested)) {
    http_response_code(400);
    echo json_encode(['error' => 'Name, email, and interest are required']);
    exit;
}

$conn = getDBConnection();

// Set timezone
$timezone = '+02:00';
$conn->query("SET time_zone = '$timezone'");

// Insert inquiry
$stmt = $conn->prepare('INSERT INTO inquiries (name, email, phone, interested, agreed_policy, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
$stmt->bind_param('sssss', $name, $email, $phone, $interested, $agree);

if ($stmt->execute()) {
    // Sync to Node.js backend as backup (non-blocking)
    syncToBackend('/submit', [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'interested' => $interested,
        'agree' => $agree
    ]);
    
    http_response_code(200);
    echo json_encode(['message' => 'Submission successful']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error saving data']);
}

$stmt->close();
$conn->close();
?>
