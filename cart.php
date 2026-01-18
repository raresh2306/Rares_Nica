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
    <title>FC Barcelona - Shopping Cart</title>
  </head>
  <body id="cart">
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

    <!-- Cart Header -->
    <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              Shopping <span class="text-primary fw-bold">Cart</span>
            </h1>
            <p class="lead">
              Review your items and proceed to checkout.
            </p>
          </div>
        </div>
      </div>
    </header>

    <!-- Cart Content -->
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div id="empty-cart-message" class="alert alert-info" style="display: none;">
              <h5>Your cart is empty</h5>
              <p>Start shopping to add items to your cart!</p>
              <a href="shopping.php" class="btn btn-primary">Go Shopping</a>
            </div>
            <div id="cart-items-container">
              <!-- Cart items will be loaded here by JavaScript -->
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Order Summary</h5>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                  <span>Total:</span>
                  <span class="fw-bold" id="cart-total">$0.00</span>
                </div>
                <button class="btn btn-primary w-100 position-relative" onclick="submitOrder()" id="submit-order-btn" style="overflow: hidden;">
                  <span id="submit-btn-content" style="position: relative; z-index: 1;">
                    <i class="fas fa-check me-1"></i>Submit Order
                  </span>
                  <div id="timer-bar" class="position-absolute top-0 start-0 h-100 bg-success" style="width: 100%; opacity: 0.3; display: none; transition: width 5s linear; z-index: 0;"></div>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 my-3">
            <h5>FC Barcelona</h5>
            <p class="text-white-50">
              The official website for FC Barcelona fans. Stay updated with the latest news, matches, and team information.
            </p>
          </div>
          <div class="col-md-4 my-3">
            <h5>Quick Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="index.php" class="text-white-50 text-decoration-none">Home</a>
              </li>
              <li class="mb-2">
                <a href="team.php" class="text-white-50 text-decoration-none">Team</a>
              </li>
              <li class="mb-2">
                <a href="matches.php" class="text-white-50 text-decoration-none">Matches</a>
              </li>
              <li class="mb-2">
                <a href="shopping.php" class="text-white-50 text-decoration-none">Shopping</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 my-3">
            <h5>Follow Us</h5>
            <div class="mb-4">
              <a href="https://facebook.com" target="_blank" class="text-decoration-none">
                <i class="fab fa-facebook fa-3x text-primary mx-2"></i>
              </a>
              <a href="https://www.instagram.com/raresh.23/" target="_blank" class="text-decoration-none">
                <i class="fab fa-instagram fa-3x text-primary mx-2"></i>
              </a>
              <a href="#" class="text-decoration-none">
                <i class="fab fa-pinterest fa-3x text-primary mx-2"></i>
              </a>
            </div>
          </div>
        </div>
        <hr class="my-4 bg-white">
        <div class="row">
          <div class="col-md-6">
            <p class="text-white-50 mb-0">
              &copy; <?php echo date('Y'); ?> FC Barcelona. All rights reserved.
            </p>
          </div>
          <div class="col-md-6 text-md-end">
            <a href="privacy.php" class="text-white-50 text-decoration-none">Privacy Policy</a>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/replaceme.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/navbar-auth.js"></script>
  </body>
</html>
