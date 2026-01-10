-- Run this in DataGrip Database Console to refresh tables
-- This will force DataGrip to recognize the users table

USE football_db;

-- Show all tables (should show both inquiries and users)
SHOW TABLES;

-- Verify users table structure
DESCRIBE users;

-- If table doesn't show in sidebar, try selecting from it
SELECT COUNT(*) as user_count FROM users;

