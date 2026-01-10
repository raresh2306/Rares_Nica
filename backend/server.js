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
    db = mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        password: process.env.DB_PASS,
        database: process.env.DB_NAME
    });

    db.connect(err => {
        if (err) {
            console.error('Database connection failed, retrying in 5 seconds...');
            setTimeout(connectWithRetry, 5000);
        } else {
            console.log('Connected to MySQL Database!');
            initializeTable();
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

    const sql = 'INSERT INTO inquiries (name, email, phone, interested, agreed_policy) VALUES (?, ?, ?, ?, ?)';
    
    db.query(sql, [name, email, phone, interested, agree], (err, result) => {
        if (err) {
            console.error("Error inserting data:", err);
            res.status(500).send('Error saving data');
        } else {
           
            res.status(200).json({ message: "Submission successful" });
        }
    });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});