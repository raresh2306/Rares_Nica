-- View Orders with User Details and Products
-- This query shows orders with user information and product names

-- Option 1: Detailed view - One row per order item (shows all products separately)
SELECT 
    o.id AS order_id,
    u.name AS username,
    u.email AS user_email,
    p.name AS product_name,
    oi.quantity,
    oi.price AS item_price,
    o.total_amount AS order_total,
    o.status,
    o.created_at AS order_date
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
ORDER BY o.id DESC, p.name;

-- Option 2: Summary view - One row per order with products grouped together
SELECT 
    o.id AS order_id,
    u.name AS username,
    u.email AS user_email,
    GROUP_CONCAT(p.name ORDER BY p.name SEPARATOR ', ') AS products_ordered,
    GROUP_CONCAT(oi.quantity ORDER BY p.name SEPARATOR ', ') AS quantities,
    o.total_amount AS order_total,
    o.status,
    o.created_at AS order_date
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
GROUP BY o.id, u.name, u.email, o.total_amount, o.status, o.created_at
ORDER BY o.id DESC;
