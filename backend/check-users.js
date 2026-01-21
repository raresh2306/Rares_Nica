/**
 * Script Node.js pentru verificarea utilizatorilor din baza de date
 * Acest script este folosit pentru debugging și administrare
 * Poate fi rulat în containerul Docker pentru a vedea toți utilizatorii înregistrați
 * 
 * Mod de utilizare:
 * docker exec -it football-site-backend node check-users.js
 */

// Importăm biblioteca mysql2 pentru conexiunea la baza de date MySQL
const mysql = require('mysql2');

// CONFIGURARE CONEXIUNE BAZĂ DE DATE
// Creăm conexiunea folosind variabilele de mediu sau valori default
// Acestea trebuie să fie identice cu configurarea din PHP
const db = mysql.createConnection({
    host: process.env.DB_HOST || 'db',           // Host-ul bazei de date (în Docker e 'db')
    user: process.env.DB_USER || 'root',         // Utilizator baza de date
    password: process.env.DB_PASS || 'rootpassword', // Parola bazei de date
    database: process.env.DB_NAME || 'football_db'   // Numele bazei de date
});

// CONEXIUNE LA BAZA DE DATE
// Încercăm să ne conectăm și gestionăm erorile
db.connect((err) => {
    if (err) {
        console.error('Database connection failed:', err);
        process.exit(1); // Ieșim cu cod de eroare dacă conexiunea eșuează
    }
    
    console.log('Connected to database!\n');
    
    // INTEROGARE UTILIZATORI
    // Selectăm toți utilizatorii ordonați după data creării (cel mai recent primul)
    // Nu selectăm parolele în clar, doar informațiile publice
    db.query('SELECT id, email, name, created_at FROM users ORDER BY created_at DESC', (err, results) => {
        if (err) {
            console.error('Error querying users:', err);
            process.exit(1);
        }
        
        if (results.length === 0) {
            console.log('No users found in database.');
        } else {
            console.log(`Found ${results.length} user(s):\n`);
            
            // Afișăm informațiile pentru fiecare utilizator
            results.forEach((user, index) => {
                console.log(`${index + 1}. ID: ${user.id}`);
                console.log(`   Email: ${user.email}`);
                console.log(`   Name: ${user.name || 'Not provided'}`);
                console.log(`   Created: ${user.created_at}`);
                console.log(''); // Linie goală pentru separare
            });
        }
        
        // VERIFICARE HASH-URI PAROLE (doar pentru debugging)
        // Afișăm primele 20 caractere din hash-urile parolelor pentru verificare
        // NU afișăm parolele în clar - doar hash-urile pentru debugging
        console.log('\n--- Password Hashes (for verification) ---');
        db.query('SELECT email, LEFT(password, 20) as password_hash FROM users', (err, hashResults) => {
            if (!err && hashResults.length > 0) {
                hashResults.forEach(user => {
                    console.log(`${user.email}: ${user.password_hash}...`);
                });
            }
            
            // ÎNCHIDERE CONEXIUNE
            // Închidem conexiunea la baza de date la final
            db.end();
        });
    });
});

