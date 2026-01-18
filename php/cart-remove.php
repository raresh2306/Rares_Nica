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
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}

$userId = $_SESSION['userId'];
$input = json_decode(file_get_contents('php://input'), true);
$cartItemId = $input['cartItemId'] ?? null;
$removeQuantity = $input['quantity'] ?? 1;

if (!$cartItemId || !is_numeric($cartItemId) || $removeQuantity < 1) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid cart item ID or quantity']);
    exit;
}

$conn = getDBConnection();

try {
    // Get current quantity
    $stmt = $conn->prepare("SELECT quantity FROM cart_items WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $cartItemId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        http_response_code(404);
        echo json_encode(['error' => 'Cart item not found or does not belong to user']);
        exit;
    }

    $currentQuantity = $row['quantity'];
    $newQuantity = $currentQuantity - $removeQuantity;

    if ($newQuantity <= 0) {
        // Remove item completely if quantity is 0 or less
        $stmt = $conn->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $cartItemId, $userId);
        $stmt->execute();
        echo json_encode(['success' => true, 'message' => 'Product removed from cart']);
    } else {
        // Update quantity
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("iii", $newQuantity, $cartItemId, $userId);
        $stmt->execute();
        echo json_encode(['success' => true, 'message' => 'Product quantity updated in cart', 'new_quantity' => $newQuantity]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
