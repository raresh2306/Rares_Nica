const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Database Connection
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

// Create Table Matching Your Form
function initializeTable() {
    const sql = `
        CREATE TABLE IF NOT EXISTS inquiries (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            email VARCHAR(255),
            phone VARCHAR(50),
            interested VARCHAR(100),
            agreed_policy VARCHAR(10),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )`;
    db.query(sql, err => {
        if (err) console.log("Error creating table:", err);
        else console.log("Table 'inquiries' is ready.");
    });
}

connectWithRetry();

// Handle Form Submission
app.post('/submit', (req, res) => {
    // These names match the HTML name="..." attributes exactly
    const { name, email, phone, interested, agree } = req.body;

    const sql = 'INSERT INTO inquiries (name, email, phone, interested, agreed_policy) VALUES (?, ?, ?, ?, ?)';
    
    db.query(sql, [name, email, phone, interested, agree], (err, result) => {
        if (err) {
            console.error("Error inserting data:", err);
            res.status(500).send('Error saving data');
        } else {
            // Redirect back to your website (Update the port if your live server is different)
            res.redirect('http://127.0.0.1:5500/index.html'); 
        }
    });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});