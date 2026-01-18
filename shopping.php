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
    <title>FC Barcelona - Shopping</title>
  </head>
  <body id="shopping">
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

    <!-- Shopping Header -->
    <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              FC Barcelona
              <span class="text-primary fw-bold">Official Store</span>
            </h1>
            <p class="lead">
              Show your support for FC Barcelona with our exclusive collection of official merchandise. 
              From authentic jerseys and training gear to accessories and collectibles, 
              find everything you need to represent the Blaugrana colors with pride.
            </p>
          </div>
        </div>
       </div>
     </header>

         <!-- Categories Section -->
    <section class="py-6 bg-body-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-5">Shop by Category</h2>
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-4 category-card" data-category="Jerseys" style="cursor: pointer;">
                <div class="card h-100 text-center bg-primary text-white">
                  <div class="card-body">
                    <i class="fas fa-tshirt fa-3x text-white mb-3"></i>
                    <h5 class="card-title text-white">Jerseys</h5>
                    <p class="card-text text-white">Kit jerseys and Training kits</p>
                    <a href="#" class="btn btn-outline-light category-filter-btn" data-category="Jerseys">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4 category-card" data-category="Fashion" style="cursor: pointer;">
                <div class="card h-100 text-center bg-primary text-white">
                  <div class="card-body">
                    <i class="fas fa-running fa-3x text-white mb-3"></i>
                    <h5 class="card-title text-white">Fashion</h5>
                    <p class="card-text text-white">Jackets, sweatshirts, and more</p>
                    <a href="#" class="btn btn-outline-light category-filter-btn" data-category="Fashion">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4 category-card" data-category="Memorabilia" style="cursor: pointer;">
                <div class="card h-100 text-center bg-primary text-white">
                  <div class="card-body">
                    <i class="fas fa-gift fa-3x text-white mb-3"></i>
                    <h5 class="card-title text-white">Memorabilia</h5>
                    <p class="card-text text-white">Gifts for your favorite fan</p>
                    <a href="#" class="btn btn-outline-light category-filter-btn" data-category="Memorabilia">Shop Now</a>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="text-center mt-4">
              <a href="#" class="btn btn-primary btn-lg show-all-btn" style="cursor: pointer;">
                <i class="fas fa-th me-2"></i>Show All Products
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products-section" class="py-6 bg-secondary">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-5">Featured Products</h2>
            <div class="row">
              <!-- Product 1 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/homekit.jpg" class="card-img-top" alt="Home Jersey">
                  <div class="card-body">
                    <h5 class="card-title">Home Jersey 2025/26</h5>
                    <p class="card-text">Official FC Barcelona home jersey for the current season. Made with premium materials and featuring the iconic Blaugrana colors.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€89.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Product 2 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/awaykit.jpg" class="card-img-top" alt="Away Jersey">
                  <div class="card-body">
                    <h5 class="card-title">Away Jersey 2025/26</h5>
                    <p class="card-text">Official FC Barcelona away jersey featuring the iconic Mamba logo as a tribute to basketball legend Kobe Bryant.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€89.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Product 3 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/third.jpg" class="card-img-top" alt="Third Kit">
                  <div class="card-body">
                    <h5 class="card-title">Third Jersey 2025/26</h5>
                    <p class="card-text">The color scheme is a homage to the '08/'09 season when Barcelona completed the historic "Sextuple". </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€89.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Product 4 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/fourth.jpg" class="card-img-top" alt="Fourth Kit">
                  <div class="card-body">
                    <h5 class="card-title">"El Clásico" Jersey 2025/26</h5>
                    <p class="card-text">The kit is a tribute to the historic "El Clásico" match between FC Barcelona and Real Madrid in 2005.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€89.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Product 5 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/prematch-fourth.jpg" class="card-img-top" alt="prematch kit">
                  <div class="card-body">
                    <h5 class="card-title">Pre-match Fourth Shirt</h5>
                    <p class="card-text">FC Barcelona's pre-match fourth shirt for the 2025/26 season.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€64.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Product 6 -->
              <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                <div class="card h-100">
                  <img src="images/training-fourth.jpg" class="card-img-top" alt="training kit">
                  <div class="card-body">
                    <h5 class="card-title">Training Shirt Fourth Kit</h5>
                    <p class="card-text">FC Barcelona's training shirt fourth kit for the 2025/26 season.</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <span class="h5 text-primary mb-0">€74.99</span>
                      <button class="btn btn-primary">Add to Cart</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Product 7 -->
                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="images/jacket.png" class="card-img-top" alt="jacket">
                    <div class="card-body">
                      <h5 class="card-title">Jacket Barca Nike GX</h5>
                      <p class="card-text">FC Barcelona's jacket for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€79.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="images/jacket-tech.jpg" class="card-img-top" alt="tech jacket">
                    <div class="card-body">
                      <h5 class="card-title">Jacket tech fleece Barça Nike</h5>
                      <p class="card-text">FC Barcelona's tech fleece jacket for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€134.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="images/player-anthem-jacket.jpg" class="card-img-top" alt="player anthem jacket">
                    <div class="card-body">
                      <h5 class="card-title">Player Anthem Jacket Home</h5>
                      <p class="card-text">FC Barcelona's player anthem jacket for home games.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€149.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="images/prematch-sweat.jpg" class="card-img-top" alt="pre-match sweatshirt">
                    <div class="card-body">
                      <h5 class="card-title">Pre-match Sweatshirt</h5>
                      <p class="card-text">FC Barcelona's pre-match sweatshirt for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€79.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                  <div class="card h-100">
                    <img src="images/prematch-home.jpg  " class="card-img-top" alt="pre-match home shirt">
                    <div class="card-body">
                      <h5 class="card-title">Pre-match Home Shirt</h5>
                      <p class="card-text">FC Barcelona's pre-match home shirt for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€64.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO251103A79838_med.jpg?v=1762353934&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Tracksuit 2025/26</h5>
                      <p class="card-text">FC Barcelona's tracksuit for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€139.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO250804A24208_med.jpg?v=1754476647&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Tee purple Barca Nike</h5>
                      <p class="card-text">FC Barcelona x Nike purple tee with Spotify logo on the side.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€44.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/MGA1324_Easy-Resize.com.jpg?v=1763387050&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Jacket Barca Nike</h5>
                      <p class="card-text">Get in trend with the new FC Barcelona x Nike Jacket.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€139.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO250925A56753_med.jpg?v=1758809038&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">T-Shirt Barca x Kobe Bryant</h5>
                      <p class="card-text">FC Barcelona x Kobe Bryant away T-Shirt express.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€54.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO250912A47095_med.jpg?v=1757941027&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Coach Training T-Shirt</h5>
                      <p class="card-text">FC Barcelona coach training t-shirt for the 2025/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€49.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO251006A63146_med.jpg?v=1759757137&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Tracksuit FC Barcelona T90</h5>
                      <p class="card-text">FC Barcelona x Nike third tracksuit for the 25/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€139.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO251006A62974_med.jpg?v=1759757016&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Pre-match Third Shirt </h5>
                      <p class="card-text">FC Barcelona's Third pre-match shirt for the 25/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€64.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO251006A62977_med.jpg?v=1759757066&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Third Anthem Jacket T90</h5>
                      <p class="card-text">FC Barcelona's Third anthem jacket for the 25/26 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€139.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/VO250917A51534_med.jpg?v=1758180897&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Tee Barca x Nike T90</h5>
                      <p class="card-text">FC Barcelona x Nike T90 T-Shirt featuring Spotify logo.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€54.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/Retro_Players_Baixa-7928.jpg?v=1763462680&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Retro 1899 Sweatshirt</h5>
                      <p class="card-text">FC Barcelona retro turquoise sweatshirt.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€69.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/Bolet_Baixa-11795.jpg?v=1765970839&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Retro Oversized T-Shirt</h5>
                      <p class="card-text">FC Barcelona retro polo shirt oversized for men.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€59.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Jerseys">
                  <div class="card h-100">
                    <img src="images/basket.jpg" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Jersey Retro Basket 94</h5>
                      <p class="card-text">FC Barcelona retro jersey for the 1994/95 basketball season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€89.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Fashion">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/CORE-II4082_391dac34-f71d-4453-acdc-51b48962fdaf.jpg?v=1740042048&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Spotify Camp Nou Tee</h5>
                      <p class="card-text">FC Barcelona Camp Nou retro tee.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€29.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Memorabilia">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/FotosMaqueta-2.jpg?v=1763466576&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Mini Spotify Camp Nou</h5>
                      <p class="card-text">FC Barcelona miniature Spotify Camp Nou.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€44.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Memorabilia">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/76079_1.jpg?v=1765888308&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Old Camp Nou Net</h5>
                      <p class="card-text">A part of the away goal net of the old Camp Nou.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€79.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Memorabilia">
                  <div class="card h-100">
                    <img src="images/grass.jpg" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Grass from Camp Nou</h5>
                      <p class="card-text">From the last game at Camp Nou in 2022/2023 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€79.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Memorabilia">
                  <div class="card h-100">
                    <img src="https://store.fcbarcelona.com/cdn/shop/files/75490_1.jpg?v=1721372454&width=823" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Net Keychain</h5>
                      <p class="card-text">A keychain with the net from 2022/2023 season.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€29.99</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 product-item" data-category="Memorabilia">
                  <div class="card h-100">
                    <img src="images/crest.jpg" class="card-img-top" alt="training kit">
                    <div class="card-body">
                      <h5 class="card-title">Crest Insignia</h5>
                      <p class="card-text">A crest insignia featuring a diamond..</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 text-primary mb-0">€699.00</span>  
                        <button class="btn btn-primary">Add to Cart</button>
                      </div>
                    </div>
                  </div>
                </div>




            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Newsletter Section -->
    <section class="py-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="fw-bold mb-4">Stay Updated</h2>
            <p class="lead mb-4">Subscribe to our newsletter and be the first to know about new products, exclusive offers, and special promotions.</p>
            <div class="row">
              <div class="col-md-8 mx-auto">
                <div class="input-group">
                  <input type="email" class="form-control" placeholder="Enter your email address">
                  <button class="btn btn-primary" type="button">Subscribe</button>
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
      <a href="#shopping">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> </a>
    </button>

    <!-- Login Required Modal -->
    <div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
          <div class="modal-header" style="background-color: #a50044; color: white; border-radius: 15px 15px 0 0; border-bottom: none;">
            <div class="d-flex align-items-center">
              <i class="fas fa-user-circle fa-2x me-2"></i>
              <h5 class="modal-title mb-0" id="loginRequiredModalLabel">Login Required</h5>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center py-4">
            <p class="mb-3" style="font-size: 1.1rem;">You need to log in to add items to your cart.</p>
            <p class="text-muted">Would you like to log in now?</p>
          </div>
          <div class="modal-footer justify-content-center border-top-0" style="border-radius: 0 0 15px 15px; padding: 1rem;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px; padding: 0.5rem 2rem;">Cancel</button>
            <button type="button" class="btn text-white" id="goToLoginBtn" style="background-color: #a50044; border-radius: 8px; padding: 0.5rem 2rem;">Login</button>
          </div>
        </div>
      </div>
    </div>

    <script src="js/replaceme.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/navbar-auth.js"></script>
    
    <script>
        // Setup cart functionality
        function setupCartFunctionality() {
            // Get all "Add to Cart" buttons
            const addToCartButtons = document.querySelectorAll('.btn-primary');
            
            addToCartButtons.forEach(button => {
                // Check if this is an "Add to Cart" button
                if (button.textContent.trim().toLowerCase().includes('add to cart')) {
                    button.addEventListener('click', async function(e) {
                        e.preventDefault();
                        
                        // Get product name from card title - find the .card-body that contains this button
                        const cardBody = this.closest('.card-body');
                        const productName = cardBody ? cardBody.querySelector('.card-title')?.textContent.trim() : '';
                        
                        if (!productName) {
                            alert('Error: Could not find product name');
                            return;
                        }
                        
                        // Check authentication
                        try {
                            const authResponse = await fetch('php/auth-check.php');
                            const authData = await authResponse.json();
                            
                            if (!authData.authenticated) {
                                // User not logged in - show custom modal
                                const loginModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
                                loginModal.show();
                                
                                // Handle login button click in modal
                                document.getElementById('goToLoginBtn').onclick = function() {
                                    window.location.href = 'login.php';
                                };
                                return;
                            }
                            
                            // Get product ID by name
                            const productIdResponse = await fetch('php/get-product-id.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({ product_name: productName })
                            });
                            
                            const productIdData = await productIdResponse.json();
                            
                            if (!productIdResponse.ok || !productIdData.product_id) {
                                const errorMsg = productIdData.error || 'Product not found in database';
                                console.error('Product ID lookup failed:', errorMsg, 'Product name:', productName);
                                alert('Error: ' + errorMsg + '. Product: "' + productName + '"');
                                return;
                            }
                            
                            // Add to cart
                            const addResponse = await fetch('php/cart-add.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                credentials: 'include',
                                body: JSON.stringify({ 
                                    productId: productIdData.product_id,
                                    quantity: 1
                                })
                            });
                            
                            const addData = await addResponse.json();
                            
                            if (addResponse.ok && addData.success) {
                                // Store original button state
                                const originalText = this.textContent.trim();
                                const originalClasses = this.className;
                                
                                // Change button to green "Added" state
                                this.textContent = 'Added';
                                this.className = 'btn btn-success';
                                this.disabled = true;
                                
                                // Update cart badge
                                if (typeof updateCartBadge === 'function') {
                                    await updateCartBadge();
                                }
                                
                                // Revert button after 2 seconds
                                setTimeout(() => {
                                    this.textContent = originalText;
                                    this.className = originalClasses;
                                    this.disabled = false;
                                }, 2000);
                            } else {
                                alert('Error adding to cart: ' + (addData.error || 'Unknown error'));
                            }
                        } catch (error) {
                            console.error('Error adding to cart:', error);
                            alert('Error adding to cart. Please try again.');
                        }
                    });
                }
            });
        }
        
        // Category filtering functionality
        function setupCategoryFiltering() {
            const categoryCards = document.querySelectorAll('.category-card, .category-filter-btn');
            const productItems = document.querySelectorAll('.product-item');
            const showAllBtn = document.querySelector('.show-all-btn');
            const productsSection = document.getElementById('products-section');
            
            function filterByCategory(category) {
                productItems.forEach(product => {
                    const productCategory = product.getAttribute('data-category');
                    if (category && productCategory === category) {
                        product.style.display = '';
                    } else if (category) {
                        product.style.display = 'none';
                    } else {
                        product.style.display = '';
                    }
                });
                
                // Scroll to products section with offset for navbar
                if (productsSection) {
                    const offset = 100; // Offset for navbar
                    const elementPosition = productsSection.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - offset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
            
            // Category cards and buttons
            categoryCards.forEach(card => {
                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    const category = this.getAttribute('data-category');
                    filterByCategory(category);
                });
            });
            
            // Show All button
            if (showAllBtn) {
                showAllBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    filterByCategory(null); // null means show all
                });
            }
        }
        
        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            setupCartFunctionality();
            setupCategoryFiltering();
            // Update cart badge on load
            if (typeof updateCartBadge === 'function') {
                updateCartBadge();
            }
        });
    </script>
    <script>
      // Typing animation for logo "- FANS PORTAL" text
      document.addEventListener('DOMContentLoaded', function() {
        const logoText = document.getElementById('logoText');
        if (logoText) {
          const text = '- FANS PORTAL';
          logoText.textContent = '';
          logoText.style.opacity = '1';
          
          let i = 0;
          let showCursor = true;
          function typeWriter() {
            if (i < text.length) {
              // Show current text + cursor
              logoText.innerHTML = text.substring(0, i + 1) + (showCursor ? '<span class="typing-cursor">|</span>' : '');
              showCursor = !showCursor; // Toggle cursor visibility
              i++;
              setTimeout(typeWriter, 175); // Speed of typing (175ms per character)
            } else {
              // After typing is complete, keep cursor blinking
              logoText.innerHTML = text + '<span class="typing-cursor">|</span>';
              // Remove cursor after 7 blinks (7 seconds)
              setTimeout(() => {
                const cursor = logoText.querySelector('.typing-cursor');
                if (cursor) {
                  cursor.remove();
                }
              }, 7000);
            }
          }
          
          // Start typing animation after a short delay
          setTimeout(typeWriter, 500);
        }
      });
    </script>
  </body>
</html>
