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
$conn = getDBConnection();

try {
    $conn->begin_transaction();

    // Get cart items for the user
    $stmt = $conn->prepare("SELECT ci.product_id, ci.quantity, p.price FROM cart_items ci JOIN products p ON ci.product_id = p.id WHERE ci.user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $cartItems = [];
    $totalAmount = 0;

    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
        $totalAmount += $row['quantity'] * $row['price'];
    }

    if (empty($cartItems)) {
        http_response_code(400);
        echo json_encode(['error' => 'Cart is empty']);
        exit;
    }

    // Create a new order
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, 'completed')");
    $stmt->bind_param("id", $userId, $totalAmount);
    $stmt->execute();
    $orderId = $conn->insert_id;

    // Move cart items to order_items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($cartItems as $item) {
        $stmt->bind_param("iiid", $orderId, $item['product_id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }

    // Clear the user's cart
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Order submitted successfully', 'order_id' => $orderId, 'total_amount' => $totalAmount]);

} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
