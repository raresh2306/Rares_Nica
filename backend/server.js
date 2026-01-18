const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');
const bcrypt = require('bcrypt');
const session = require('express-session');

const cookieParser = require('cookie-parser');

const app = express();

// Use cookie parser for session cookies
app.use(cookieParser());

// Configure CORS to allow credentials from multiple origins
const allowedOrigins = ['http://localhost:8081', 'http://127.0.0.1:8081', 'http://localhost'];
app.use(cors({
    origin: function (origin, callback) {
        // Allow requests with no origin (like mobile apps, curl, Postman)
        if (!origin || allowedOrigins.includes(origin)) {
            callback(null, true);
        } else {
            callback(null, true); // Allow all origins in development
        }
    },
    credentials: true
}));

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Configure session middleware
app.use(session({
    secret: 'your-secret-key-change-in-production',
    resave: false,
    saveUninitialized: false,
    cookie: {
        secure: false, // Set to true if using HTTPS
        httpOnly: true,
        maxAge: 24 * 60 * 60 * 1000 // 24 hours
    }
}));


let db;
function connectWithRetry() {
    const timezone = process.env.DB_TIMEZONE || '+02:00';
    db = mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        password: process.env.DB_PASS,
        database: process.env.DB_NAME,
        timezone: timezone
    });

    db.connect(err => {
        if (err) {
            console.error('Database connection failed, retrying in 5 seconds...');
            setTimeout(connectWithRetry, 5000);
        } else {
            console.log('Connected to MySQL Database!');
            // Set timezone - use environment variable or default to UTC+2 (Central European Time)
            // Examples: '+02:00' for UTC+2, '+01:00' for UTC+1, 'SYSTEM' for server timezone
            const timezone = process.env.DB_TIMEZONE || '+02:00';
            db.query(`SET time_zone = ?`, [timezone], (tzErr) => {
                if (tzErr) {
                    console.log('Warning: Could not set timezone, using default:', tzErr.message);
                } else {
                    console.log(`Timezone set to ${timezone}`);
                }
                initializeTable();
            });
        }
    });
}


function initializeTable() {
    // Create inquiries table
    const inquiriesSql = `
        CREATE TABLE IF NOT EXISTS inquiries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            email VARCHAR(255),
            phone VARCHAR(50),
            interested VARCHAR(100),
            agreed_policy VARCHAR(10),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )`;
    db.query(inquiriesSql, err => {
        if (err) console.log("Error creating inquiries table:", err);
        else console.log("Table 'inquiries' is ready.");
    });

    // Create users table
    const usersSql = `
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            name VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )`;
    db.query(usersSql, err => {
        if (err) console.log("Error creating users table:", err);
        else console.log("Table 'users' is ready.");
    });

    // Create categories table for shopping
    const categoriesSql = `
        CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            description TEXT,
            icon_class VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )`;
    db.query(categoriesSql, err => {
        if (err) console.log("Error creating categories table:", err);
        else console.log("Table 'categories' is ready.");
    });

    // Create products table for shopping
    const productsSql = `
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            price DECIMAL(10,2) NOT NULL,
            image_url VARCHAR(500),
            category_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
        )`;
    db.query(productsSql, err => {
        if (err) console.log("Error creating products table:", err);
        else console.log("Table 'products' is ready.");
    });
}

connectWithRetry();


// Authentication endpoints

// Check if email is available (optional - for real-time validation)
app.get('/api/auth/check-email/:email', (req, res) => {
    const email = req.params.email;

    if (!email || !email.includes('@')) {
        return res.status(400).json({ available: false, error: 'Invalid email format' });
    }

    db.query('SELECT * FROM users WHERE email = ?', [email], (err, results) => {
        if (err) {
            console.error("Error checking email:", err);
            return res.status(500).json({ available: false, error: 'Server error' });
        }

        if (results.length > 0) {
            return res.status(200).json({ available: false, message: 'This email is already registered' });
        }

        return res.status(200).json({ available: true, message: 'Email is available' });
    });
});

// Signup endpoint
app.post('/api/auth/signup', async (req, res) => {
    const { email, password, name } = req.body;

    // Validate input
    if (!email || !password) {
        return res.status(400).json({ error: 'Email and password are required' });
    }

    if (password.length < 6) {
        return res.status(400).json({ error: 'Password must be at least 6 characters long' });
    }

    try {
        // Check if user already exists
        db.query('SELECT * FROM users WHERE email = ?', [email], async (err, results) => {
            if (err) {
                console.error("Error checking user:", err);
                return res.status(500).json({ error: 'Server error' });
            }

            if (results.length > 0) {
                return res.status(400).json({ error: 'An account with this email already exists. Please use a different email or try logging in instead.' });
            }

            // Hash password
            const hashedPassword = await bcrypt.hash(password, 10);

            // Insert new user
            db.query(
                'INSERT INTO users (email, password, name) VALUES (?, ?, ?)',
                [email, hashedPassword, name || null],
                (err, result) => {
                    if (err) {
                        console.error("Error creating user:", err);
                        
                        // Check if it's a duplicate email error (MySQL error code 1062)
                        if (err.code === 'ER_DUP_ENTRY' || err.errno === 1062) {
                            return res.status(400).json({ error: 'An account with this email already exists. Please use a different email or try logging in.' });
                        }
                        
                        return res.status(500).json({ error: 'Error creating user. Please try again.' });
                    }

                    // Set session
                    req.session.userId = result.insertId;
                    req.session.email = email;
                    req.session.name = name || email;

                    res.status(201).json({
                        message: 'User created successfully',
                        user: {
                            id: result.insertId,
                            email: email,
                            name: name || email
                        }
                    });
                }
            );
        });
    } catch (error) {
        console.error("Error in signup:", error);
        res.status(500).json({ error: 'Server error' });
    }
});

// Login endpoint
app.post('/api/auth/login', async (req, res) => {
    const { email, password } = req.body;

    // Validate input
    if (!email || !password) {
        return res.status(400).json({ error: 'Email and password are required' });
    }

    try {
        // Find user by email
        db.query('SELECT * FROM users WHERE email = ?', [email], async (err, results) => {
            if (err) {
                console.error("Error finding user:", err);
                return res.status(500).json({ error: 'Server error' });
            }

            if (results.length === 0) {
                return res.status(401).json({ error: 'Invalid email or password' });
            }

            const user = results[0];

            // Compare password
            const isValidPassword = await bcrypt.compare(password, user.password);

            if (!isValidPassword) {
                return res.status(401).json({ error: 'Invalid email or password' });
            }

            // Set session
            req.session.userId = user.id;
            req.session.email = user.email;
            req.session.name = user.name || user.email;

            res.status(200).json({
                message: 'Login successful',
                user: {
                    id: user.id,
                    email: user.email,
                    name: user.name || user.email
                }
            });
        });
    } catch (error) {
        console.error("Error in login:", error);
        res.status(500).json({ error: 'Server error' });
    }
});

// Logout endpoint
app.post('/api/auth/logout', (req, res) => {
    req.session.destroy((err) => {
        if (err) {
            console.error("Error destroying session:", err);
            return res.status(500).json({ error: 'Error logging out' });
        }
        res.clearCookie('connect.sid');
        res.status(200).json({ message: 'Logout successful' });
    });
});

// Check session endpoint
app.get('/api/auth/check', (req, res) => {
    if (req.session.userId) {
        res.status(200).json({
            authenticated: true,
            user: {
                id: req.session.userId,
                email: req.session.email,
                name: req.session.name
            }
        });
    } else {
        res.status(200).json({ authenticated: false });
    }
});

// Original submit endpoint
app.post('/submit', (req, res) => {

    const { name, email, phone, interested, agree } = req.body;

    // Set timezone before query to ensure NOW() uses UTC+2
    const timezone = process.env.DB_TIMEZONE || '+02:00';
    db.query('SET time_zone = ?', [timezone], (tzErr) => {
        if (tzErr) {
            console.error("Error setting timezone:", tzErr);
        }
        
        // Now insert with explicit timestamp using NOW() which will respect the session timezone
        const sql = 'INSERT INTO inquiries (name, email, phone, interested, agreed_policy, created_at) VALUES (?, ?, ?, ?, ?, NOW())';
        
        db.query(sql, [name, email, phone, interested, agree], (err, result) => {
            if (err) {
                console.error("Error inserting data:", err);
                res.status(500).send('Error saving data');
            } else {
               
                res.status(200).json({ message: "Submission successful" });
            }
        });
    });
});

// Shopping endpoints

// Sync shopping data from PHP to Node.js backend
app.post('/api/sync/shopping-data', (req, res) => {
    const { categories, products } = req.body;
    
    try {
        // Sync categories
        if (categories && categories.length > 0) {
            const categoryValues = categories.map(cat => [cat.id, cat.name, cat.description, cat.icon_class]);
            const categorySql = 'INSERT IGNORE INTO categories (id, name, description, icon_class) VALUES ?';
            db.query(categorySql, [categoryValues], (err) => {
                if (err) console.error("Error syncing categories:", err);
            });
        }
        
        // Sync products
        if (products && products.length > 0) {
            const productValues = products.map(prod => [prod.id, prod.name, prod.description, prod.price, prod.image_url, prod.category_id]);
            const productSql = 'INSERT IGNORE INTO products (id, name, description, price, image_url, category_id) VALUES ?';
            db.query(productSql, [productValues], (err) => {
                if (err) console.error("Error syncing products:", err);
            });
        }
        
        res.status(200).json({ message: "Shopping data synced successfully" });
    } catch (error) {
        console.error("Error syncing shopping data:", error);
        res.status(500).json({ error: "Error syncing shopping data" });
    }
});

// Get all categories
app.get('/api/categories', (req, res) => {
    const sql = 'SELECT * FROM categories ORDER BY name';
    db.query(sql, (err, results) => {
        if (err) {
            console.error("Error fetching categories:", err);
            return res.status(500).json({ error: 'Server error' });
        }
        res.status(200).json(results);
    });
});

// Get products by category (optional category_id parameter)
app.get('/api/products', (req, res) => {
    const categoryId = req.query.category_id;
    
    let sql = `
        SELECT p.*, c.name as category_name, c.icon_class as category_icon 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id
    `;
    
    const params = [];
    
    if (categoryId) {
        sql += ' WHERE p.category_id = ?';
        params.push(categoryId);
    }
    
    sql += ' ORDER BY p.name';
    
    db.query(sql, params, (err, results) => {
        if (err) {
            console.error("Error fetching products:", err);
            return res.status(500).json({ error: 'Server error' });
        }
        res.status(200).json(results);
    });
});

// Get single product by ID
app.get('/api/products/:id', (req, res) => {
    const productId = req.params.id;
    
    const sql = `
        SELECT p.*, c.name as category_name, c.icon_class as category_icon 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        WHERE p.id = ?
    `;
    
    db.query(sql, [productId], (err, results) => {
        if (err) {
            console.error("Error fetching product:", err);
            return res.status(500).json({ error: 'Server error' });
        }
        
        if (results.length === 0) {
            return res.status(404).json({ error: 'Product not found' });
        }
        
        res.status(200).json(results[0]);
    });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});