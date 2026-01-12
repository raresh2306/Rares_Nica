# PHP Login System Setup

This project has been converted to use PHP for authentication and database operations as required by your university course.

## PHP Files Created

### Database Configuration
- `php/config.php` - Database connection configuration

### Authentication Endpoints
- `php/auth-login.php` - Handles user login
- `php/auth-signup.php` - Handles user registration
- `php/auth-logout.php` - Handles user logout
- `php/auth-check.php` - Checks if user is authenticated
- `php/check-email.php` - Checks if email is available (for signup validation)

### Frontend
- `login.php` - Main login page (converted from login.html)
- `js/auth-php.js` - JavaScript client for PHP authentication

## Database Configuration

The database configuration is in `php/config.php`. It automatically uses environment variables when running in Docker, or falls back to defaults for local development:

```php
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: 'rootpassword');
define('DB_NAME', getenv('DB_NAME') ?: 'football_db');
```

**In Docker:** The configuration uses `DB_HOST=db` (the Docker service name) automatically.

**For local development:** Update the default values in `php/config.php` if your database settings differ.

## Requirements

1. **PHP 7.4+** with the following extensions:
   - `mysqli` (for MySQL database connection)
   - `session` (for session management)
   - `json` (for JSON responses)

2. **MySQL Database** - The same database used by the Node.js backend

3. **Web Server** - Apache or Nginx with PHP support

## Setup Instructions

### Option 1: Using XAMPP/WAMP/MAMP

1. Copy the project files to your web server directory:
   - XAMPP: `C:\xampp\htdocs\Rares_Nica\`
   - WAMP: `C:\wamp64\www\Rares_Nica\`
   - MAMP: `/Applications/MAMP/htdocs/Rares_Nica/`

2. Start Apache and MySQL from your control panel

3. Access the site at: `http://localhost/Rares_Nica/login.php`

### Option 2: Using PHP Built-in Server

1. Navigate to the project directory in terminal/command prompt

2. Start PHP server:
   ```bash
   php -S localhost:8000
   ```

3. Access the site at: `http://localhost:8000/login.php`

### Option 3: Using Docker (Recommended)

The project now includes PHP support in Docker Compose!

1. Make sure Docker and Docker Compose are installed

2. Build and start all services:
   ```bash
   docker-compose up --build
   ```

3. Access the site at: `http://localhost:8081/login.php`

4. The PHP service will automatically:
   - Install PHP 8.2 with Apache
   - Install MySQL extensions (mysqli, pdo, pdo_mysql)
   - Connect to the MySQL database container
   - Serve both HTML and PHP files

**Note:** The first time you run `docker-compose up --build`, it will build the PHP image which may take a few minutes. Subsequent starts will be faster.

## Database Setup

The PHP system uses the same MySQL database as the Node.js backend. Make sure:

1. MySQL is running
2. Database `football_db` exists
3. Table `users` exists with columns:
   - `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
   - `email` (VARCHAR(255), UNIQUE)
   - `password` (VARCHAR(255))
   - `name` (VARCHAR(255), nullable)
   - `created_at` (TIMESTAMP)

## How It Works

1. **Login Flow:**
   - User submits form on `login.php`
   - JavaScript sends POST request to `php/auth-login.php`
   - PHP validates credentials against database
   - PHP creates session if valid
   - JavaScript updates UI

2. **Signup Flow:**
   - User submits form on `login.php`
   - JavaScript sends POST request to `php/auth-signup.php`
   - PHP checks if email exists
   - PHP hashes password and creates user
   - PHP creates session
   - JavaScript updates UI

3. **Session Management:**
   - PHP uses native `$_SESSION` for authentication
   - Sessions are stored server-side
   - Session ID is sent via cookies

## API Endpoints

All endpoints return JSON:

- `POST php/auth-login.php` - Login
- `POST php/auth-signup.php` - Signup
- `POST php/auth-logout.php` - Logout
- `GET php/auth-check.php` - Check authentication status
- `GET php/check-email.php?email=...` - Check email availability

## Testing

1. Open `login.php` in your browser
2. Try creating a new account
3. Try logging in with the account
4. Check that session persists across page refreshes

## Notes

- All authentication and form submissions now use PHP as the primary system
- All HTML files link to `login.php`
- The contact form (`/submit`) has been converted to PHP (`php/submit-inquiry.php`)
- Password hashing uses PHP's `password_hash()` and `password_verify()` functions
- **Dual-Write Backup System**: Data is saved to both PHP (MySQL) and Node.js backend for redundancy
  - Login/Signup: Saved to PHP first, then synced to Node.js backend
  - Contact Form: Saved to PHP first, then synced to Node.js backend
  - Both systems write to the same MySQL database for backup/redundancy
- The Node.js backend service is kept running as a backup/secondary system
