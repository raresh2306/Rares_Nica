const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');
const bcrypt = require('bcrypt');
const session = require('express-session');

const app = express();

// Configure CORS to allow credentials
app.use(cors({
    origin: 'http://localhost:8081',
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