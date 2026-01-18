<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (!isset($_SESSION['userId'])) {
    http_response_code(401);
    echo json_encode(['error' => 'User not authenticated', 'requires_login' => true]);
    exit;
}

$userId = $_SESSION['userId'];
$input = json_decode(file_get_contents('php://input'), true);
$productId = $input['productId'] ?? null;
$quantity = $input['quantity'] ?? 1;

if (!$productId || !is_numeric($productId) || $quantity < 1) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid product ID or quantity']);
    exit;
}

$conn = getDBConnection();

try {
    // Check if product exists
    $stmt = $conn->prepare("SELECT id FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(['error' => 'Product not found']);
        exit;
    }

    // Check if item already in cart
    $stmt = $conn->prepare("SELECT quantity FROM cart_items WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Update quantity if item exists
        $newQuantity = $row['quantity'] + $quantity;
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("iii", $newQuantity, $userId, $productId);
        $stmt->execute();
        echo json_encode(['success' => true, 'message' => 'Product quantity updated in cart', 'new_quantity' => $newQuantity]);
    } else {
        // Add new item to cart
        $stmt = $conn->prepare("INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $userId, $productId, $quantity);
        $stmt->execute();
        echo json_encode(['success' => true, 'message' => 'Product added to cart', 'quantity' => $quantity]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
