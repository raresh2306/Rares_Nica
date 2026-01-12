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
$name = isset($data['name']) ? trim($data['name']) : null;

// Validate input
if (empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email and password are required']);
    exit;
}

if (strlen($password) < 6) {
    http_response_code(400);
    echo json_encode(['error' => 'Password must be at least 6 characters long']);
    exit;
}

$conn = getDBConnection();

// Check if user already exists
$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    http_response_code(400);
    echo json_encode(['error' => 'An account with this email already exists. Please use a different email or try logging in instead.']);
    $stmt->close();
    $conn->close();
    exit;
}
$stmt->close();

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $conn->prepare('INSERT INTO users (email, password, name) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $email, $hashedPassword, $name);

if ($stmt->execute()) {
    $userId = $conn->insert_id;
    
    // Set session
    $_SESSION['userId'] = $userId;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name ? $name : $email;
    
    // Sync to Node.js backend as backup (non-blocking)
    syncToBackend('/api/auth/signup', [
        'email' => $email,
        'password' => $password, // Send plain password - backend will hash it
        'name' => $name
    ]);
    
    http_response_code(201);
    echo json_encode([
        'message' => 'User created successfully',
        'user' => [
            'id' => $userId,
            'email' => $email,
            'name' => $name ? $name : $email
        ]
    ]);
} else {
    // Check if it's a duplicate email error
    if ($conn->errno === 1062) {
        http_response_code(400);
        echo json_encode(['error' => 'An account with this email already exists. Please use a different email or try logging in.']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Error creating user. Please try again.']);
    }
}

$stmt->close();
$conn->close();
?>
