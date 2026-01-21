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
    <title>FC Barcelona</title>
  </head>
  <body id="home">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="images/logo2.png" alt="" width="150">
          <span class="typing-text" id="logoText">- FANS PORTAL</span>
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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Team
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-primary" href="team.php">Men's Team</a></li>
                <li><a class="dropdown-item text-primary" href="team-women.php">Women's Team</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="matches.php">Matches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="history.php">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopping.php">Shopping</a>
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
              <a href="https://www.instagram.com/raresh.23/" target="_blank">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x text-white"></i>
              </a>
            </span>
            <span class="fa-stack">
              <a href="cart.php">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-shopping-cart fa-stack-1x text-white"></i>
                <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary" style="display: none;">0</span>
              </a>
            </span>
            <a href="login.php" class="btn btn-sm text-white" style="background-color: #a50044; border: none; padding: 0.5rem 1rem;">
              <i class="fas fa-user me-1"></i>Login
            </a>
          </span>
      </div>
    </nav>

    <!-- header -->
     <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              Find What's New 
              <span class="">
                <span class="fixed-for text-secondary">About </span>
                <span class="replace-me text-primary fw-bold">Transfers, Fixtures, Standings, First Team, Academy, Shop</span>
              </span>
            </h1>
            <p class="lead">
              Welcome to the world of FC Barcelona — where passion, history, and greatness come together to inspire generations. 
              From the heart of Catalonia to the global stage, Barça represents unity, creativity, and relentless pursuit of excellence. 
              Step into a legacy built by legends, powered by fans, and driven by the belief that football is more than a game — it's a way of life.
            </p>
            <a href="history.php" class="btn my-3 p-3 btn-primary text-light">Learn More</a>
          </div>
        </div>
       </div>
     </header>

     <!-- Partners -->
    <section class="partners py-4 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h6 class="fs-5 fw-semibold text-center mb-5 text-uppercase">Our Partners:</h6>
            <div class="partner-slider-container">
              <div class="partner-slider">
                <div class="partner-logo-item">
                  <img src="images/partner-logo-1.png" alt="Partner Logo 1">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-2.png" alt="Partner Logo 2">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-3.png" alt="Partner Logo 3">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-4.png" alt="Partner Logo 4">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-5.png" alt="Partner Logo 5">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-6.png" alt="Partner Logo 6">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-7.png" alt="Partner Logo 7">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-8.png" alt="Partner Logo 8">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-9.png" alt="Partner Logo 9">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-10.png" alt="Partner Logo 10">
                </div>
                <!-- Duplicate for seamless loop -->
                <div class="partner-logo-item">
                  <img src="images/partner-logo-1.png" alt="Partner Logo 1">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-2.png" alt="Partner Logo 2">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-3.png" alt="Partner Logo 3">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-4.png" alt="Partner Logo 4">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-5.png" alt="Partner Logo 5">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-6.png" alt="Partner Logo 6">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-7.png" alt="Partner Logo 7">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-8.png" alt="Partner Logo 8">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-9.png" alt="Partner Logo 9">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-10.png" alt="Partner Logo 10">
                </div>
                <!-- Third set for extra smoothness -->
                <div class="partner-logo-item">
                  <img src="images/partner-logo-1.png" alt="Partner Logo 1">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-2.png" alt="Partner Logo 2">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-3.png" alt="Partner Logo 3">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-4.png" alt="Partner Logo 4">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-5.png" alt="Partner Logo 5">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-6.png" alt="Partner Logo 6">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-7.png" alt="Partner Logo 7">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-8.png" alt="Partner Logo 8">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-9.png" alt="Partner Logo 9">
                </div>
                <div class="partner-logo-item">
                  <img src="images/partner-logo-10.png" alt="Partner Logo 10">
                </div>
                
              </div>
            </div>
      </div>
    </section>

    <!-- FORMULAR DE CONTACT - FUNCȚIONALITATE DINAMICĂ DE INQUIRY -->
    <!--
      Acest formular de contact permite utilizatorilor să trimită o solicitare de informații.
      Funcționalitatea dinamică este implementată prin intermediul JavaScript și trimite datele către un script PHP.
    -->
    <section id="contact" class="contact my-6">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="fw-bold text-center">Get More Information</h2>
            <hr class="hr-heading" />
            <p class="lead">We provide innovative software solutions that empower businesses to
              thrive in the digital era.</p>
            
            <!-- Informații de contact și beneficii -->
            <ul class="list-unstyled">
              <li class="mb-3">
                <span class="fa-stack fa-1x">
                  <i class="fas fa-circle fa-stack-2x text-primary"></i>
                  <i class="fas fa-phone fa-stack-1x text-white"></i>
                </span>
                <span class="ms-3">Call us at: <strong>+1 234 567 890</strong></span>
              </li>
              <li class="mb-3">
                <span class="fa-stack fa-1x">
                  <i class="fas fa-circle fa-stack-2x text-primary"></i>
                  <i class="fas fa-envelope fa-stack-1x text-white"></i>
                </span>
                <span class="ms-3">Email: <strong>contact@site.com</strong></span>
              </li>
              <li class="mb-3">
                <span class="fa-stack fa-1x">
                  <i class="fas fa-circle fa-stack-2x text-primary"></i>
                  <i class="fas fa-map-marker-alt fa-stack-1x text-white"></i>
                </span>
                <span class="ms-3">Address: <strong>Barcelona, Spain</strong></span>
              </li>
            </ul>
          </div>
          <div class="col-md-5 offset-md-1">
            <!-- FORMULAR DE INQUIRY - TRIMITE CĂTRE submit-inquiry.php -->
            <!--
              Acest formular trimite datele utilizatorului către un script PHP care procesează solicitarea.
              Funcționalitatea dinamică este implementată prin intermediul JavaScript și trimite datele către server.
            -->
            <form id="inquiryForm">
              <div class="mb-4">
                <input type="text" name="name" class="form-control bg-secondary" placeholder="Enter name" required>
              </div>
              <div class="mb-4">
                <input type="email" name="email" class="form-control bg-secondary" placeholder="Enter email" required>
              </div>
              <div class="mb-4">
                <input type="text" name="phone" class="form-control bg-secondary" placeholder="Enter phone">
              </div>
              <div class="mb-4">
                <select name="interested" id="interested" class="form-control bg-secondary">
                  <option value="">Interested In...</option>
                  <option value="First team">First team</option>
                  <option value="Shop">Shop</option>
                  <option value="Tickets">Tickets</option>
                  <option value="Fixtures and Tickets">Fixtures and Tickets</option>
                </select>
              </div>
              <div class="mb-4 form-check">
                <input type="checkbox" name="agree" id="agree-check" required />
                <label for="agree-check" class="form-check-label">
                  I agree to the <a href="privacy.php">Privacy Policy</a>
                </label>
              </div>
              <div class="d-grid gap-2">
                <input type="submit" value="Submit" class="btn btn-primary text-white" />
              </div>
            </form>
        </div>
      </div>
     </section>



     

    <!-- Footer -->
    <footer class="footer bg-dark py-6 text-white">
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
                <a href="privacy.php" class="text-white-50 text-decoration-none">Privacy Policy</a>
              </li>
              <li class="mb-2">
                Useful: <a href="gallery.php" class="text-white-50 text-decoration-none">Gallery</a>,
                <a href="shopping.php" class="text-white-50 text-decoration-none">Shop</a>,
                <a href="index.php#newsletter" class="text-white-50 text-decoration-none">Newsletter</a>
              </li>
              <li class="mb-2">
                Menu: <a href="index.php" class="text-white-50 text-decoration-none">Home</a>, 
                <a href="team.php" class="text-white-50 text-decoration-none">Team</a>,
                <a href="matches.php" class="text-white-50 text-decoration-none">Matches</a>,
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
              <a href="https://www.instagram.com/raresh.23/" class="text-decoration-none" target="_blank">
                <i class="fab fa-instagram fa-3x text-primary mx-2"></i>
              </a>
              <a href="#" class="text-decoration-none">
                <i class="fab fa-pinterest fa-3x text-primary mx-2"></i>
              </a>
            </div>
            <p class="text-white-50">
              We would love to hear from you
                <a href="mailto:raresnica23@outlook.com" class="text-primary text-decoration-none"
                ><strong>raresnica23@outlook.com</strong></a
              >
            </p>
          </div>
        </div>
      </div>
    </footer>

    <button id="to-top" class="to-top-btn">
      <a href="#home">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> </a>
    </button>

    <!-- Cookie Consent Modal -->
    <div class="modal fade" id="cookieConsentModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-secondary text-white border-0">
          <div class="modal-header bg-primary text-white border-0">
            <div class="d-flex align-items-center">
              <img src="images/logo2.png" alt="FC Barcelona" width="48" class="me-2">
              <h5 class="modal-title">Cookies</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            We use cookies to improve your experience and analyze our traffic. By clicking 'Accept All,' you consent to our use of cookies. 
            You can manage your preferences or read more in our
            <a href="privacy.php" class="link-light fw-semibold">Privacy Policy</a>.
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Reject</button>
            <button type="button" id="acceptCookiesBtn" class="btn btn-primary text-white">Accept All</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL DE SUCCES PENTRU FORMULAR - AFIȘARE DUPĂ TRIMITERE -->
    <!--
      Acest modal este afișat atunci când formularul de contact este trimis cu succes.
      Folosște Bootstrap pentru afișarea unui popup de confirmare.
    -->
    <div class="modal fade" id="formSuccessModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-secondary text-white border-0">
          <div class="modal-header bg-primary text-white border-0">
            <div class="d-flex align-items-center">
              <img src="images/logo2.png" alt="FC Barcelona" width="48" class="me-2">
              <h5 class="modal-title">Thank you!</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Thank you for your request. We will contact you soon.
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- SCRIPTURI JAVASCRIPT - FUNCȚIONALITĂȚI DINAMICE -->
    <script src="js/replaceme.min.js"></script>     <!-- Pentru animații de text -->
    <script src="js/bootstrap.bundle.min.js"></script> <!-- Framework Bootstrap pentru componente UI (modale, alerte) -->
    <script src="js/script.js"></script>              <!-- Script principal pentru funcționalități generale -->
    <script src="js/cart.js"></script>                <!-- Gestionare coș de cumpărături (actualizare badge) -->
    <script src="js/navbar-auth.js"></script>          <!-- Actualizare dinamică navbar login/logout -->
    
    <!-- SCRIPT FORMULAR DE CONTACT - TRIMITERE CĂTRE PHP -->
    <script>
      /**
       * FUNCȚIONALITATE FORMULAR DE CONTACT
       * Trimite datele formularului către submit-inquiry.php
       * Include validare și afișare modal de succes
       */
      document.addEventListener('DOMContentLoaded', function() {
        const inquiryForm = document.getElementById('inquiryForm');
        
        if (inquiryForm) {
          inquiryForm.addEventListener('submit', async function(e) {
            e.preventDefault(); // Prevenim comportamentul default de submit
            
            // Colectăm datele din formular
            const formData = new FormData(this);
            
            try {
              // Trimitem datele către server folosind fetch API
              const response = await fetch('php/submit-inquiry.php', {
                method: 'POST',
                body: formData // FormData include automat toate câmpurile formularului
              });
              
              const result = await response.json();
              
              if (response.ok && result.success) {
                // SUCCES - Afișăm modalul de confirmare
                const successModal = new bootstrap.Modal(document.getElementById('formSuccessModal'));
                successModal.show();
                
                // Resetăm formularul după trimitere
                this.reset();
              } else {
                // EROARE - Afișăm mesaj de eroare
                alert('Error: ' + (result.error || 'Unknown error occurred'));
              }
            } catch (error) {
              console.error('Error submitting form:', error);
              alert('Error submitting form. Please try again.');
            }
          });
        }
      });
    </script>
    
    <!-- SCRIPT ANIMAȚIE LOGO - EFECT VISUAL DINAMIC -->
    <script>
      /**
       * ANIMAȚIE TYPING PENTRU LOGO "- FANS PORTAL"
       * Creează un efect de scriere automată pentru textul logo-ului
       * Include cursor care clipește și eliminare automat după 7 secunde
       */
      document.addEventListener('DOMContentLoaded', function() {
        const logoText = document.getElementById('logoText');
        if (logoText) {
          const text = '- FANS PORTAL';        // Textul de afișat
          logoText.textContent = '';            // Golim elementul la început
          logoText.style.opacity = '1';         // Asigurăm vizibilitatea
          
          let i = 0;                           // Index pentru caracterul curent
          let showCursor = true;               // Flag pentru cursorul care clipește
          
          /**
           * FUNCȚIA PRINCIPALĂ DE TYPING
           * Adaugă caractere unul câte unul cu efect de cursor care clipește
           */
          function typeWriter() {
            if (i < text.length) {
              // Afișăm textul până la caracterul curent + cursor (dacă e vizibil)
              logoText.innerHTML = text.substring(0, i + 1) + (showCursor ? '<span class="typing-cursor">|</span>' : '');
              showCursor = !showCursor; // Inversăm vizibilitatea cursorului pentru efect de clipire
              i++;
              setTimeout(typeWriter, 175); // Viteză de typing: 175ms per caracter
            } else {
              // După ce s-a terminat scrierea, menținem cursorul care clipește
              logoText.innerHTML = text + '<span class="typing-cursor">|</span>';
              
              // Eliminăm cursorul după 7 secunde (7 blinks)
              setTimeout(() => {
                const cursor = logoText.querySelector('.typing-cursor');
                if (cursor) {
                  cursor.remove();
                }
              }, 7000);
            }
          }
          
          // Pornim animația după un scurt delay pentru efect dramatic
          setTimeout(typeWriter, 500);
        }
      });
    </script>
  </body>
</html> 
