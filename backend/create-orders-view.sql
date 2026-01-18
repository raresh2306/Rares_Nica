-- Create a permanent view for orders with user and product details
-- This view shows: Order ID, Username, Email, Products Ordered, Order Date

USE football_db;

-- Drop the view if it already exists (to allow recreation)
DROP VIEW IF EXISTS orders_with_details;

-- Create the view
CREATE VIEW orders_with_details AS
SELECT 
    o.id AS order_id,
    u.name AS username,
    u.email AS user_email,
    GROUP_CONCAT(CONCAT(p.name, ' (x', oi.quantity, ')') ORDER BY p.name SEPARATOR ', ') AS products_ordered,
    o.total_amount AS order_total,
    o.status,
    o.created_at AS order_date
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
GROUP BY o.id, u.name, u.email, o.total_amount, o.status, o.created_at;

-- Select from the view to verify it works
SELECT * FROM orders_with_details ORDER BY order_date DESC;
