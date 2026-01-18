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
    <title>FC Barcelona - Women's Matches</title>
  </head>
  <body id="matches-women">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Team
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="team.php">Men's Team</a></li>
                <li><a class="dropdown-item" href="team-women.php">Women's Team</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="matches.php">Matches</a>
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
    </nav>

    <!-- Matches Header -->
    <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              FC Barcelona Femení
              <span class="text-primary fw-bold">Fixtures & Results</span>
            </h1>
            <p class="lead">
              Stay up to date with all FC Barcelona Femení matches - from upcoming fixtures to recent results. 
              Follow the women's team's journey through Primera División Femenina, Champions League, and Copa de la Reina. 
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
              <!-- Match 1 -->
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="images/logo2.png" alt="FC Barcelona" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">Barcelona Femení</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h5 class="text-primary">vs</h5>
                        <p class="mb-1"><strong>Real Madrid Femenino</strong></p>
                        <small class="text-muted">El Clásico Femenino</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="images/partner-logo-1.png" alt="Real Madrid" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">Real Madrid</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Primera División</strong></p>
                      <p class="mb-1">Saturday, March 16, 2024</p>
                      <p class="mb-1">16:30 CET</p>
                      <p class="mb-0">Estadi Johan Cruyff, Barcelona</p>
                      <a href="#" class="btn btn-primary btn-sm mt-2">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Match 2 -->
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="images/logo2.png" alt="FC Barcelona" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">Barcelona Femení</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h5 class="text-primary">vs</h5>
                        <p class="mb-1"><strong>Atletico Madrid Femenino</strong></p>
                        <small class="text-muted">Primera División</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="images/partner-logo-2.png" alt="Atletico Madrid" class="img-fluid" style="max-height: 60px;">
                        <h6 class="mt-2">Atletico Madrid</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Primera División</strong></p>
                      <p class="mb-1">Sunday, March 24, 2024</p>
                      <p class="mb-1">12:00 CET</p>
                      <p class="mb-0">Estadio Cívitas Metropolitano, Madrid</p>
                      <a href="#" class="btn btn-primary btn-sm mt-2">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Results Section -->
    <section class="py-6 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-5">Recent Results</h2>
            <div class="row">
              <!-- Result 1 -->
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="images/logo2.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Barcelona Femení</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h4 class="text-success mb-0">4-0</h4>
                        <small class="text-muted">Won</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="images/partner-logo-3.png" alt="Valencia" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Valencia Femenino</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Primera División</strong></p>
                      <p class="mb-0">March 10, 2024</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Result 2 -->
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="images/logo2.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Barcelona Femení</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h4 class="text-success mb-0">5-1</h4>
                        <small class="text-muted">Won</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="images/partner-logo-4.png" alt="Sevilla" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Sevilla Femenino</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Champions League</strong></p>
                      <p class="mb-0">March 3, 2024</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Result 3 -->
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-4 text-center">
                        <img src="images/logo2.png" alt="FC Barcelona" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Barcelona Femení</h6>
                      </div>
                      <div class="col-4 text-center">
                        <h4 class="text-success mb-0">3-0</h4>
                        <small class="text-muted">Won</small>
                      </div>
                      <div class="col-4 text-center">
                        <img src="images/partner-logo-5.png" alt="Athletic Club" class="img-fluid" style="max-height: 50px;">
                        <h6 class="mt-1">Athletic Club</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="text-center">
                      <p class="mb-1"><strong>Primera División</strong></p>
                      <p class="mb-0">February 28, 2024</p>
                    </div>
                  </div>
                </div>
              </div>
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
              <a href="#" class="text-decoration-none">
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
      <a href="#matches-women">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> </a>
    </button>

    <script src="js/replaceme.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/navbar-auth.js"></script>
  </body>
</html>

