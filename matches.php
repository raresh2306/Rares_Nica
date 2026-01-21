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
    <title>FC Barcelona - Matches</title>
  </head>
  <body id="matches">
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
              <a class="nav-link" href="index.php">Home</a>
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

    <!-- Matches Header -->
    <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              FC Barcelona
              <span class="text-primary fw-bold">Fixtures & Results</span>
            </h1>
            <p class="lead">
              Stay up to date with all FC Barcelona matches - from upcoming fixtures to recent results. 
              Follow your team's journey through La Liga, Champions League, Copa del Rey, and other competitions. 
              Get match details, ticket information, and live updates.
            </p>
          </div>
        </div>
       </div>
     </header>

    <!-- Upcoming Matches Section -->
    <section class="py-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-5">Upcoming Matches</h2>
            <div class="row">
              <!-- AUTO-GENERATED UPCOMING MATCHES START -->

              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="https://crests.football-data.org/81.png" alt="FC Barcelona" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">FC Barcelona</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h5 class="text-primary">vs</h5>
                        <p class="mb-1"><strong>SK Slavia Praha</strong></p>
                        <small class="text-muted">UEFA Champions League</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="https://crests.football-data.org/930.png" alt="SK Slavia Praha" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">SK Slavia Praha</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>UEFA Champions League</strong></p>
                      <p class="mb-1">Wednesday, January 21, 2026</p>
                      <p class="mb-1">10:00 PM GMT+2</p>
                      <p class="mb-0">Away</p>
                      <a href="#" class="btn btn-primary btn-sm mt-2">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="https://crests.football-data.org/81.png" alt="FC Barcelona" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">FC Barcelona</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h5 class="text-primary">vs</h5>
                        <p class="mb-1"><strong>Real Oviedo</strong></p>
                        <small class="text-muted">Primera Division</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="https://crests.football-data.org/1048.png" alt="Real Oviedo" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">Real Oviedo</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Primera Division</strong></p>
                      <p class="mb-1">Sunday, January 25, 2026</p>
                      <p class="mb-1">05:15 PM GMT+2</p>
                      <p class="mb-0">Camp Nou, Barcelona</p>
                      <a href="#" class="btn btn-primary btn-sm mt-2">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- AUTO-GENERATED UPCOMING MATCHES END -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Results Section -->
    <section class="py-6 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-5">La Liga Recent Results</h2>
            <div class="row">
              <!-- AUTO-GENERATED MATCHES START -->

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/81.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">FC Barcelona</h6>
                  </div>
                  <div class="col-4 text-center">
                    <h4 class="text-danger mb-0">1-2</h4>
                    <small class="text-muted">Lost</small>
                  </div>
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/92.png" alt="Real Sociedad de Fútbol" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">Real Sociedad de Fútbol</h6>
                  </div>
                </div>
                <hr>
                <div class="text-center">
                  <p class="mb-1"><strong>Primera Division</strong></p>
                  <p class="mb-0">January 18, 2026</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/81.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">FC Barcelona</h6>
                  </div>
                  <div class="col-4 text-center">
                    <h4 class="text-success mb-0">2-0</h4>
                    <small class="text-muted">Won</small>
                  </div>
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/80.png" alt="RCD Espanyol de Barcelona" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">RCD Espanyol de Barcelona</h6>
                  </div>
                </div>
                <hr>
                <div class="text-center">
                  <p class="mb-1"><strong>Primera Division</strong></p>
                  <p class="mb-0">January 3, 2026</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/81.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">FC Barcelona</h6>
                  </div>
                  <div class="col-4 text-center">
                    <h4 class="text-success mb-0">2-0</h4>
                    <small class="text-muted">Won</small>
                  </div>
                  <div class="col-4 text-center">
                    <img src="https://crests.football-data.org/94.png" alt="Villarreal CF" class="img-fluid" style="max-height: 50px;">
                    <h6 class="mt-1">Villarreal CF</h6>
                  </div>
                </div>
                <hr>
                <div class="text-center">
                  <p class="mb-1"><strong>Primera Division</strong></p>
                  <p class="mb-0">December 21, 2025</p>
                </div>
              </div>
            </div>
          </div>
              <!-- AUTO-GENERATED MATCHES END -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-secondary py-6">
      <div class="container">
        <div class="row">
          <div class="col-md-4 my-3">
            <h6>About FC Barcelona</h6>
            <p>
            FC Barcelona Fan Portal – your source for team news, fixtures, tickets, and official merchandise. Follow the latest updates, buy tickets, 
            and shop for your favorite team gear. 
            </p>
          </div>
          <div class="col-md-4 my-3">
            <h6>Links</h6>
            <ul class="list-unstyled">
              <li>
                Important: <a href="#">Terms & Conditions</a>,
                <a href="privacy.php">Privacy Policy</a>
              </li>
              <li>
                Useful: <a href="gallery.php">Gallery</a>,
                <a href="shopping.php">Shop</a>,
                <a href="index.php#newsletter">Newsletter</a>
              </li>
              <li>
                Menu: <a href="index.php">Home</a>, 
                <a href="team.php">Team</a>,
                <a href="matches.php">Matches</a>,
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
            <p>
              We would love to hear from you
              <a href="mailto:contact@site.com"
                ><strong>contact@site.com</strong></a
              >
            </p>
          </div>
        </div>
      </div>
    </footer>

    <button id="to-top" class="to-top-btn">
      <a href="#matches">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> </a>
    </button>

    <!-- SCRIPTURI JAVASCRIPT - FUNCȚIONALITĂȚI DINAMICE -->
    <script src="js/replaceme.min.js"></script>     <!-- Pentru animații de text -->
    <script src="js/bootstrap.bundle.min.js"></script> <!-- Framework Bootstrap pentru componente UI -->
    <script src="js/script.js"></script>              <!-- Script principal pentru funcționalități generale -->
    <script src="js/navbar-auth.js"></script>          <!-- Actualizare dinamică navbar login/logout -->
    
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
