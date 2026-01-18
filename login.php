<?php
require_once 'php/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="images/favicon.ico" />
    <title>FC Barcelona - Login</title>
    <style>
      .auth-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
      }
      
      .auth-card {
        background-color: var(--bs-secondary);
        border-radius: 10px;
        padding: 2rem;
        max-width: 480px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      }
      
      .auth-card h2 {
        color: #ffffff !important;
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
        word-wrap: break-word;
        line-height: 1.4;
      }
      
      .auth-tabs {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid rgba(255, 255, 255, 0.15);
      }
      
      .auth-tab {
        flex: 1;
        padding: 0.875rem 0.75rem;
        background: transparent;
        border: none;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        white-space: nowrap;
      }
      
      .auth-tab:hover {
        color: #ffffff;
      }
      
      .auth-tab.active {
        color: var(--bs-primary);
        border-bottom-color: var(--bs-primary);
      }
      
      .auth-tab i {
        font-size: 0.9rem;
        margin-right: 0.25rem;
      }
      
      .auth-form {
        display: none;
      }
      
      .auth-form.active {
        display: block;
      }
      
      .form-label {
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: block;
      }
      
      .form-control {
        background-color: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #ffffff;
        padding: 0.875rem 1rem;
        font-size: 0.95rem;
        width: 100%;
        box-sizing: border-box;
      }
      
      .form-control:focus {
        background-color: rgba(255, 255, 255, 0.18);
        border-color: var(--bs-primary);
        color: #ffffff;
        box-shadow: 0 0 0 0.2rem rgba(165, 0, 68, 0.25);
        outline: none;
      }
      
      .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
        opacity: 1;
      }
      
      .form-control.is-valid {
        border-color: rgba(25, 135, 84, 0.5);
        background-color: rgba(25, 135, 84, 0.1);
      }
      
      .form-control.is-invalid {
        border-color: rgba(220, 53, 69, 0.7);
        background-color: rgba(220, 53, 69, 0.1);
      }
      
      .form-text {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
        margin-top: 0.375rem;
      }
      
      .alert {
        border-radius: 5px;
        margin-bottom: 1rem;
        padding: 0.875rem 1rem;
        font-size: 0.9rem;
        word-wrap: break-word;
      }
      
      .alert-danger {
        background-color: rgba(220, 53, 69, 0.25);
        border-color: rgba(220, 53, 69, 0.5);
        color: #ffffff;
      }
      
      .alert-success {
        background-color: rgba(25, 135, 84, 0.25);
        border-color: rgba(25, 135, 84, 0.5);
        color: #ffffff;
      }
      
      .user-info {
        background-color: rgba(165, 0, 68, 0.25);
        border: 1px solid rgba(165, 0, 68, 0.5);
        border-radius: 5px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        text-align: center;
      }
      
      .user-info h5 {
        color: #ffffff;
        margin-bottom: 0.5rem;
        font-size: 1rem;
      }
      
      .user-info p {
        margin: 0;
        color: #ffffff;
        font-size: 0.95rem;
        word-wrap: break-word;
      }
      
      .btn-primary {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        white-space: nowrap;
      }
      
      .btn-outline-primary {
        border-color: var(--bs-primary);
        color: var(--bs-primary);
      }
      
      .btn-outline-primary:hover {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        color: #ffffff;
      }
      
      @media (max-width: 576px) {
        .auth-card {
          padding: 1.5rem;
          max-width: 100%;
        }
        
        .auth-card h2 {
          font-size: 1.5rem;
        }
        
        .auth-tab {
          padding: 0.75rem 0.5rem;
          font-size: 0.875rem;
        }
        
        .auth-tab i {
          display: none;
        }
      }
    </style>
  </head>
  <body id="login">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo2.png" alt="" width="150">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Team
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-primary" href="team.html">Men's Team</a></li>
                <li><a class="dropdown-item text-primary" href="team-women.html">Women's Team</a></li>
              </ul>
            </li>
<<<<<<< Updated upstream
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Matches
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-primary" href="matches.html">Men's Matches</a></li>
                <li><a class="dropdown-item text-primary" href="matches-women.html">Women's Matches</a></li>
              </ul>
=======
            <li class="nav-item">
              <a class="nav-link" href="matches.php">Matches</a>
>>>>>>> Stashed changes
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.html">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.html">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopping.html">Shopping</a>
            </li>
          </ul>
          <span class="nav-item d-flex align-items-center gap-2">
            <span class="fa-stack">
              <a href="https://facebook.com" target="_blank">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x text-white"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="https://twitter.com" target="_blank">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x text-white"></i>
              </a>
            </span>
            <a href="login.php" class="btn btn-sm text-white" style="background-color: #a50044; border: none; padding: 0.5rem 1rem;">
              <i class="fas fa-user me-1"></i>Login
            </a>
          </span>
        </div>
      </div>
    </nav>

    <!-- Auth Section -->
    <section class="auth-container">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">
            <div class="auth-card">
              <h2 class="text-center mb-4 fw-bold">
                <i class="fas fa-user-circle me-2"></i>
                Welcome to FC Barcelona
              </h2>
              
              <div id="userInfoSection" class="user-info" style="display: none;">
                <h5>Logged in as:</h5>
                <p id="userInfoText"></p>
                <button id="logoutBtn" class="btn btn-outline-primary btn-sm mt-2">
                  <i class="fas fa-sign-out-alt me-1"></i>Logout
                </button>
              </div>

              <div id="authForms">
                <div class="auth-tabs">
                  <button class="auth-tab active" id="loginTab">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                  </button>
                  <button class="auth-tab" id="signupTab">
                    <i class="fas fa-user-plus me-2"></i>Sign Up
                  </button>
                </div>

                <!-- Login Form -->
                <form id="loginForm" class="auth-form active">
                  <div id="loginAlert"></div>
                  
                  <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input 
                      type="email" 
                      class="form-control" 
                      id="loginEmail" 
                      placeholder="Enter your email" 
                      required
                    >
                  </div>
                  
                  <div class="mb-4">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input 
                      type="password" 
                      class="form-control" 
                      id="loginPassword" 
                      placeholder="Enter your password" 
                      required
                    >
                  </div>
                  
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary text-white">
                      <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                  </div>
                </form>

                <!-- Signup Form -->
                <form id="signupForm" class="auth-form">
                  <div id="signupAlert"></div>
                  
                  <div class="mb-3">
                    <label for="signupName" class="form-label">Name (Optional)</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="signupName" 
                      placeholder="Enter your name"
                    >
                  </div>
                  
                  <div class="mb-3">
                    <label for="signupEmail" class="form-label">Email</label>
                    <input 
                      type="email" 
                      class="form-control" 
                      id="signupEmail" 
                      placeholder="Enter your email" 
                      required
                    >
                  </div>
                  
                  <div class="mb-4">
                    <label for="signupPassword" class="form-label">Password</label>
                    <input 
                      type="password" 
                      class="form-control" 
                      id="signupPassword" 
                      placeholder="At least 6 characters" 
                      required
                      minlength="6"
                    >
                    <small class="form-text">
                      Password must be at least 6 characters long
                    </small>
                  </div>
                  
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary text-white">
                      <i class="fas fa-user-plus me-2"></i>Create Account
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark py-6 mt-5 text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4 my-3">
            <h6 class="text-white mb-3">About FC Barcelona</h6>
            <p class="text-white-50">
            FC Barcelona Fan Portal – your source for team news, fixtures, tickets, and official merchandise. Follow the latest updates, buy tickets, 
            and shop for your favorite team gear. 
            </p>
          </div>
          <div class="col-md-4 my-3">
            <h6 class="text-white mb-3">Links</h6>
            <ul class="list-unstyled">
              <li class="mb-2">
                Important: <a href="#" class="text-white-50 text-decoration-none">Terms & Conditions</a>,
                <a href="privacy.html" class="text-white-50 text-decoration-none">Privacy Policy</a>
              </li>
              <li class="mb-2">
                Useful: <a href="gallery.html" class="text-white-50 text-decoration-none">Gallery</a>,
                <a href="shopping.html" class="text-white-50 text-decoration-none">Shop</a>,
                <a href="index.html#newsletter" class="text-white-50 text-decoration-none">Newsletter</a>
              </li>
              <li class="mb-2">
                Menu: <a href="index.html" class="text-white-50 text-decoration-none">Home</a>, 
                <a href="team.html" class="text-white-50 text-decoration-none">Team</a>,
                <a href="matches.html" class="text-white-50 text-decoration-none">Matches</a>,
              </li>
            </ul>
          </div>
          <div class="col-md-4 my-3">
            <div class="mb-4">
              <a href="#" class="text-decoration-none">
                <i class="fab fa-facebook fa-3x text-primary mx-2"></i>
              </a>
              <a href="#" class="text-decoration-none">
                <i class="fab fa-twitter fa-3x text-primary mx-2"></i>
              </a>
              <a href="#" class="text-decoration-none">
                <i class="fab fa-instagram fa-3x text-primary mx-2"></i>
              </a>
              <a href="#" class="text-decoration-none">
                <i class="fab fa-pinterest fa-3x text-primary mx-2"></i>
              </a>
            </div>
            <p class="text-white-50">
              We would love to hear from you
              <a href="mailto:contact@site.com" class="text-primary text-decoration-none"
                ><strong>contact@site.com</strong></a
              >
            </p>
          </div>
        </div>
      </div>
    </footer>

    <button id="to-top" class="to-top-btn">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> 
    </button>
    
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/auth-php.js"></script>
  </body>
</html>
