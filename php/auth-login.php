<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? $data['password'] : '';

// Validate input
if (empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email and password are required']);
    exit;
}

$conn = getDBConnection();

// Find user by email
$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid email or password']);
    $stmt->close();
    $conn->close();
    exit;
}

$user = $result->fetch_assoc();

// Verify password
if (!password_verify($password, $user['password'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid email or password']);
    $stmt->close();
    $conn->close();
    exit;
}

// Set session
$_SESSION['userId'] = $user['id'];
$_SESSION['email'] = $user['email'];
$_SESSION['name'] = $user['name'] ? $user['name'] : $user['email'];

// Sync to Node.js backend as backup (non-blocking)
// Note: We send the password for backend validation, but backend should already have the user
syncToBackend('/api/auth/login', [
    'email' => $email,
    'password' => $password
]);

http_response_code(200);
echo json_encode([
    'message' => 'Login successful',
    'user' => [
        'id' => $user['id'],
        'email' => $user['email'],
        'name' => $user['name'] ? $user['name'] : $user['email']
    ]
]);

$stmt->close();
$conn->close();
?>
