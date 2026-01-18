<?php
require_once 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    echo json_encode(['cart' => [], 'total' => 0, 'item_count' => 0]);
    exit;
}

$userId = $_SESSION['userId'];
$conn = getDBConnection();

try {
    $sql = "
        SELECT
            ci.id as cart_item_id,
            ci.quantity,
            p.id as product_id,
            p.name,
            p.description,
            p.price,
            p.image_url
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.user_id = ?
        ORDER BY ci.created_at DESC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $cartItems = [];
    $total = 0;
    $itemCount = 0;

    while ($row = $result->fetch_assoc()) {
        $itemTotal = floatval($row['price']) * intval($row['quantity']);
        $total += $itemTotal;
        $itemCount += intval($row['quantity']);

        $cartItems[] = [
            'cart_item_id' => intval($row['cart_item_id']),
            'product_id' => intval($row['product_id']),
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => floatval($row['price']),
            'quantity' => intval($row['quantity']),
            'image_url' => $row['image_url'],
            'item_total' => $itemTotal
        ];
    }

    echo json_encode([
        'cart' => $cartItems,
        'total' => round($total, 2),
        'item_count' => $itemCount
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
