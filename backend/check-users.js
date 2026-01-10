// Script to check users in the database
// Run with: docker exec -it football-site-backend node check-users.js

const mysql = require('mysql2');

const db = mysql.createConnection({
    host: process.env.DB_HOST || 'db',
    user: process.env.DB_USER || 'root',
    password: process.env.DB_PASS || 'rootpassword',
    database: process.env.DB_NAME || 'football_db'
});

db.connect((err) => {
    if (err) {
        console.error('Database connection failed:', err);
        process.exit(1);
    }
    
    console.log('Connected to database!\n');
    
    // Query all users (passwords will be hashed)
    db.query('SELECT id, email, name, created_at FROM users ORDER BY created_at DESC', (err, results) => {
        if (err) {
            console.error('Error querying users:', err);
            process.exit(1);
        }
        
        if (results.length === 0) {
            console.log('No users found in database.');
        } else {
            console.log(`Found ${results.length} user(s):\n`);
            results.forEach((user, index) => {
                console.log(`${index + 1}. ID: ${user.id}`);
                console.log(`   Email: ${user.email}`);
                console.log(`   Name: ${user.name || 'Not provided'}`);
                console.log(`   Created: ${user.created_at}`);
                console.log('');
            });
        }
        
        // Show password hashes (for verification only)
        console.log('\n--- Password Hashes (for verification) ---');
        db.query('SELECT email, LEFT(password, 20) as password_hash FROM users', (err, hashResults) => {
            if (!err && hashResults.length > 0) {
                hashResults.forEach(user => {
                    console.log(`${user.email}: ${user.password_hash}...`);
                });
            }
            db.end();
        });
    });
});

