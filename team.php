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
    <title>FC Barcelona - Team</title>
  </head>
  <body id="team">
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

    <header class="header position-relative">
      <img src="images/vertical-decoration-left.svg" alt="" class="vertical-decoration position-absolute d-none d-md-block">
       <div class="container">
        <div class="row">
          <div class="col-md-8 pt-2">
            <h1 class="xl-text text-secondary mt-2">
              FC Barcelona
              <span class="text-primary fw-bold">First Team</span>
            </h1>
            <p class="lead">
              Meet the stars of FC Barcelona - the players who carry the legacy of one of the world's greatest football clubs. 
              From seasoned veterans to rising talents, our squad represents the perfect blend of experience, skill, and passion 
              that defines the Barça way of playing football.
            </p>
          </div>
        </div>
       </div>
     </header>

    <section class="py-6">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="fw-bold text-center mb-4">Our Players</h2>

            <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
              <a href="#goalkeepers" class="btn btn-primary">Goalkeepers</a>
              <a href="#defenders" class="btn btn-primary">Defenders</a>
              <a href="#midfielders" class="btn btn-primary">Midfielders</a>
              <a href="#attackers" class="btn btn-primary">Attackers</a>
            </div>

            <h3 id="goalkeepers" class="fw-bold mt-4 mb-3">Goalkeepers</h3>
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Marc-André ter Stegen"
                     data-position="Goalkeeper"
                     data-number="1"
                     data-matches="422"
                     data-cleansheets="174"
                     data-saves="986"
                     data-bio-id="bio-marc-andre-ter-stegen"
                     data-bio-url="players/marc-andre-ter-stegen.php"
                     data-detail="A keeper with great reflexes and also excellent with the ball at his feet.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/1b765077-cfc5-4e66-8169-4e45f6ec7392/01-Ter_Stegen.jpg?width=940&height=940" class="card-img-top" alt="Marc-André ter Stegen">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">1</div>
                      <div class="small">Matches: 422</div>
                      <div class="small">Clean sheets: 174</div>
                      <div class="small">Saves: 986</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Marc André ter Stegen</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Joan Garcia"
                     data-position="Goalkeeper"
                     data-number="13"
                     data-matches="17"
                     data-cleansheets="8"
                     data-saves="47"
                     data-bio-id="bio-joan-garcia"
                     data-bio-url="players/joan-garcia.php"
                     data-detail="A goalkeeper with tremendous reflexes who can also play with the ball at his feet.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/2b12f57a-582e-408a-b23e-ec9c42b0d5b9/01-Joan_Garcia.jpg?width=940&height=940" class="card-img-top" alt="Gavi">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">13</div>
                      <div class="small">Matches: 17</div>
                      <div class="small">Clean sheets: 8</div>
                      <div class="small">Saves: 47</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Joan Garcia</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Szczesny"
                     data-position="Goalkeeper"
                     data-number="25"
                     data-matches="110"
                     data-cleansheets="8"
                     data-saves="12"
                     data-bio-id="bio-szczesny"
                     data-bio-url="players/szczesny.php"
                     data-detail="With an admirable career in goal for Arsenal, Roma, and Juventus, Szczęsny is a vastly experienced international goalkeeper.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/01ac5137-9725-4e97-858e-711344d43fb5/25-Szczesny.jpg?width=940&height=940" class="card-img-top" alt="Gavi">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">25</div>
                      <div class="small">Matches: 37</div>
                      <div class="small">Clean sheets: 13</div>
                      <div class="small">Saves: 84</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Szczesny</h5>
                  </div>
                </div>
              </div>
            </div>

            <h3 id="defenders" class="fw-bold mt-4 mb-3">Defenders</h3>
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Alejandro Balde"
                     data-position="Defender"
                     data-number="3"
                     data-matches="148"
                     data-goals="3"
                     data-assists="18"
                     data-bio-id="bio-alejandro-balde"
                     data-bio-url="players/alejandro-balde.php"
                     data-detail="Skill and strength make Alejandro Balde a fast, explosive fullback who can also support the attack">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/82dfc9f5-ffc4-4b47-a828-21de924f9b5f/03-Balde.jpg?width=940&height=940" class="card-img-top" alt="Alejandro Balde">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">3</div>
                      <div class="small">Matches: 148</div>
                      <div class="small">Goals: 3</div>
                      <div class="small">Assists: 18</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Alejandro Balde</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">  
                <div class="card h-100 player-card"
                     data-name="Ronald Araújo"
                     data-position="Defender"
                     data-number="4"
                     data-matches="190"
                     data-goals="12"
                     data-assists="7"
                     data-bio-id="bio-ronald-araujo"
                     data-bio-url="players/ronald-araujo.php"
                     data-detail="Uruguayan defender, strong in the air and capable with the ball at his feet.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/46af26e5-df57-406a-9bb1-b6f037631f0f/04-Araujo.jpg?width=940&height=940" class="card-img-top" alt="Ronald Araújo">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">4</div>
                      <div class="small">Matches: 190</div>
                      <div class="small">Goals: 12</div>
                      <div class="small">Assists: 7</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Ronald Araújo</h5>
                   </div>
                </div>
              </div>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Pau Cubarsí"
                   data-position="Defender"
                   data-number="5"
                   data-matches="103"
                   data-goals="1"
                   data-assists="5"
                   data-bio-id="bio-pau-cubarsi"
                   data-bio-url="players/pau-cubarsi.php"
                   data-detail="A centre back who provides leadership and decisiveness in defence, while also being able to bring the ball out.">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/2ca1e448-3d31-4ff2-9909-44fd00368472/02-Cubarsi.jpg?width=940&height=940" class="card-img-top" alt="Pau Cubarsí">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">5</div>
                    <div class="small">Matches: 103</div>
                    <div class="small">Goals: 1</div>
                    <div class="small">Assists: 5</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Pau Cubarsí</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Andreas Christensen"
                   data-position="Defender"
                   data-number="15"
                   data-matches="97"
                   data-goals="5"
                   data-assists="3"
                   data-bio-id="bio-andreas-christensen"
                   data-bio-url="players/andreas-christensen.php"
                   data-detail="Centre back with brilliant passing skills and a tremendous reading of the game. Fabulous and finding the right route to get the ball forward.">
                <img src=https://www.fcbarcelona.com/photo-resources/2025/09/09/11a6228b-5034-4d25-9fe3-ea3aafd04dd2/15-Christensen.jpg?width=940&height=940" class="card-img-top" alt="Andreas Christensen">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">15</div>
                    <div class="small">Matches: 97</div>
                    <div class="small">Goals: 5</div>
                    <div class="small">Assists: 3</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Andreas Christensen</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Gerard Martín"
                   data-position="Defender"
                   data-number="18"
                   data-matches="67"
                   data-goals="1"
                   data-assists="6"
                   data-bio-id="bio-gerard-martin"
                   data-bio-url="players/gerard-martin.php"
                   data-detail="Versatile defender who can play at left back or centre back.">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/6fd05ccb-8562-4ffd-9cc8-2d36762a3634/18-Martin.jpg?width=940&height=940" class="card-img-top" alt="Gerard Martín">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">18</div>
                    <div class="small">Matches: 67</div>
                    <div class="small">Goals: 1</div>
                    <div class="small">Assists: 6</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Gerard Martín</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Jules Koundé"
                   data-position="Defender"
                   data-number="23"
                   data-matches="167"
                   data-goals="10"
                   data-assists="20"
                   data-bio-id="bio-jules-kounde"
                   data-bio-url="players/jules-kounde.php"
                   data-detail="Jules Kounde is known for being a very fast defender, quick to intercept, and being good on the ball.">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/e25e8ccc-4b69-48ef-8c48-2eebbcc74770/23-Kounde.jpg?width=940&height=940" class="card-img-top" alt="Jules Koundé">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">23</div>
                    <div class="small">Matches: 167</div>
                    <div class="small">Goals: 10</div>
                    <div class="small">Assists: 20</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Jules Koundé</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Eric García"
                   data-position="Defender"
                   data-number="24"
                   data-matches="140"
                   data-goals="7"
                   data-assists="6"
                   data-bio-id="bio-eric-garcia"
                   data-bio-url="players/eric-garcia.php"
                   data-detail="Centre back who excels at getting the ball out from the back and has an instinctive ability to read the game">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/ab15b5c3-c764-40f7-983c-0fbd0ccd61bd/24-Eric_Garcia.jpg?width=940&height=940" class="card-img-top" alt="Eric García">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">24</div>
                    <div class="small">Matches: 140</div>
                    <div class="small">Goals: 7</div>
                    <div class="small">Assists: 6</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Eric García</h5>
                </div>
              </div>
            </div>
            </div>

            <h3 id="midfielders" class="fw-bold mt-4 mb-3">Midfielders</h3>
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Gavi"
                     data-position="Midfielder"
                     data-number="6"
                     data-matches="155"
                     data-goals="10"
                     data-assists="14"
                     data-bio-id="bio-gavi"
                     data-bio-url="players/gavi.php"
                     data-detail="Technically gifted midfielder with plenty of character and a good reader of the game.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/21356702-1d94-49a8-a94a-4170afe7ca16/06-Gavi.jpg?width=940&height=940" class="card-img-top" alt="Gavi">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">6</div>
                      <div class="small">Matches: 155</div>
                      <div class="small">Goals: 10</div>
                      <div class="small">Assists: 14</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Gavi</h5>
  
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Pedri"
                     data-position="Midfielder"
                     data-number="8"
                     data-matches="223"
                     data-goals="28"
                     data-assists="27"
                     data-bio-id="bio-pedri"
                     data-bio-url="players/pedri.php"
                     data-detail="The player enjoys playing on the front foot, driving at his direct opponent and having his passes break the defensive lines.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/10/597a1e13-c0b2-4c93-a2fd-4cc39a9459cc/08-Pedri.jpg?width=940&height=940" class="card-img-top" alt="Pedri">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">8</div>
                      <div class="small">Matches: 223</div>
                      <div class="small">Goals: 28</div>
                      <div class="small">Assists: 27</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Pedri</h5>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Fermín López"
                     data-position="Midfielder"
                     data-number="16"
                     data-matches="107"
                     data-goals="27"
                     data-assists="17"
                     data-bio-id="bio-fermin-lopez"
                     data-bio-url="players/fermin-lopez.php"
                     data-detail="Culer since 2016/17, the midfielder from La Masia is now an established first team player.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/4e851606-cfd6-4dc4-9042-c3dee40dbeb7/16-Fermin.jpg?width=940&height=940" class="card-img-top" alt="Fermín López">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">16</div>
                      <div class="small">Matches: 107</div>
                      <div class="small">Goals: 27</div>
                      <div class="small">Assists: 17</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Fermín López</h5>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Marc Casadó"
                     data-position="Midfielder"
                     data-number="17"
                     data-matches="59"
                     data-goals="1"
                     data-assists="7"
                     data-bio-id="bio-marc-casado"
                     data-bio-url="players/marc-casado.php"
                     data-detail="La Masía trained midfielder known for hard work, quality, and leadership.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/aee1292c-f40e-46e9-8b45-c19646ad3a04/17-Casado.jpg?width=940&height=940" class="card-img-top" alt="Marc Casadó">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">17</div>
                      <div class="small">Matches: 59</div>
                      <div class="small">Goals: 1</div>
                      <div class="small">Assists: 7</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Marc Casadó</h5>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Dani Olmo"
                     data-position="Midfielder"
                     data-number="20"
                     data-matches="58"
                     data-goals="17"
                     data-assists="8"
                     data-bio-id="bio-dani-olmo"
                     data-bio-url="players/dani-olmo.php"
                     data-detail="A goalscorer and a versatile addition who can in midfield or up front.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/79af1dbc-34f3-4bb7-9ee4-08269866ab47/20-Olmo.jpg?width=940&height=940" class="card-img-top" alt="Dani Olmo">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">20</div>
                      <div class="small">Matches: 58</div>
                      <div class="small">Goals: 17</div>
                      <div class="small">Assists: 8</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Dani Olmo</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Frenkie de Jong"
                     data-position="Midfielder"
                     data-number="21"
                     data-matches="280"
                     data-goals="19"
                     data-assists="25"
                     data-bio-id="bio-frenkie-de-jong"
                     data-bio-url="players/frenkie-de-jong.php"
                     data-detail="His versatility, energy and great vision have allowed him to continue developing his skills in any midfield position.">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/793001b1-f225-4259-8a74-27e418a3e4c9/21-De_Jong.jpg?width=940&height=940" class="card-img-top" alt="Frenkie de Jong">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">21</div>
                      <div class="small">Matches: 280</div>
                      <div class="small">Goals: 19</div>
                      <div class="small">Assists: 25</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Frenkie de Jong</h5>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Marc Bernal"
                     data-position="Midfielder"
                     data-number="22"
                     data-matches="14"
                     data-goals="0"
                     data-assists="1"
                     data-bio-id="bio-marc-bernal"
                     data-bio-url="players/marc-bernal.php"
                     data-detail="Holding midfielder with great tactical awareness and defensive abilities">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/d19a70cc-af3f-4ea0-b0d8-5ef0d098211a/22-Bernal.jpg?width=940&height=940" class="card-img-top" alt="Marc Bernal">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">22</div>
                      <div class="small">Matches: 14</div>
                      <div class="small">Goals: 0</div>
                      <div class="small">Assists: 1</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Marc Bernal</h5>
                  </div>
                </div>
              </div>
            </div>

            <h3 id="attackers" class="fw-bold mt-4 mb-3">Attackers</h3>
            <div class="row">
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Ferran Torres"
                     data-position="Forward"
                     data-number="7"
                     data-matches="181"
                     data-goals="58"
                     data-assists="20"
                     data-bio-id="bio-ferran-torres"
                     data-bio-url="players/ferran-torres.php"
                     data-detail="He brings together various talents which allow him to operate anywhere up front">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/c83c3cf6-9c12-41c4-b6fa-ea4cfa2bf7dc/07-Ferran_Torres.jpg?width=940&height=940" class="card-img-top" alt="Ferran Torres">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">7</div>
                      <div class="small">Matches: 181</div>
                      <div class="small">Goals: 58</div>
                      <div class="small">Assists: 20</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Ferran Torres</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 player-card"
                     data-name="Robert Lewandowski"
                     data-position="Striker"
                     data-number="9"
                     data-matches="166"
                     data-goals="110"
                     data-assists="21"
                     data-bio-id="bio-robert-lewandowski"
                     data-bio-url="players/robert-lewandowski.php"
                     data-detail="One of the best strikers ever, the Polish forward's stats speak for themselves">
                  <img src="https://www.fcbarcelona.com/photo-resources/2025/09/10/6dd5aa47-d5fb-45a5-b171-0da82c9c7105/09-Lewandowski.jpg?width=940&height=940" class="card-img-top w-100" alt="Robert Lewandowski">
                  <div class="player-overlay">
                    <div class="overlay-content">
                      <div class="display-6 fw-bold">9</div>
                      <div class="small">Matches: 166</div>
                      <div class="small">Goals: 110</div>
                      <div class="small">Assists: 21</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Robert Lewandowski</h5>
                  </div>
                </div>
              </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Lamine Yamal"
                   data-position="Forward"
                   data-number="10"
                   data-matches="128"
                   data-goals="33"
                   data-assists="38"
                   data-bio-id="bio-lamine-yamal"
                   data-bio-url="players/lamine-yamal.php"
                   data-detail="A great talent from La Masia who stands out for his daring dribbling">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/a9ecee2c-116c-405c-8524-3127913e7a3c/10-Lamine.jpg?width=940&height=940" class="card-img-top" alt="Lamine Yamal">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">10</div>
                    <div class="small">Matches: 128</div>
                    <div class="small">Goals: 33</div>
                    <div class="small">Assists: 38</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Lamine Yamal</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Raphinha"
                   data-position="Forward"
                   data-number="11"
                   data-matches="160"
                   data-goals="63"
                   data-assists="49"
                   data-bio-id="bio-raphinha"
                   data-bio-url="players/raphinha.php"
                   data-detail="A technically gifted, skill winger with great dribbling skills and combination play">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/10/08bbb1ff-004b-4623-a675-66fd1fbfdc8b/11-Raphinha.jpg?width=940&height=940" class="card-img-top" alt="Raphinha">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">11</div>
                    <div class="small">Matches: 160</div>
                    <div class="small">Goals: 63</div>
                    <div class="small">Assists: 49</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Raphinha</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Marcus Rashford"
                   data-position="Forward"
                   data-number="14"
                   data-matches="26"
                   data-goals="7"
                   data-assists="8"
                   data-bio-id="bio-marcus-rashford"
                   data-bio-url="players/marcus-rashford.php"
                   data-detail="Right footed, he can play anywhere up front, take players on and is an excellent finisher">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/10/85f7a271-6b29-4459-be8b-128cb25596d0/14-Rashford.jpg?width=940&height=940" class="card-img-top" alt="Marcus Rashford">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">14</div>
                    <div class="small">Matches: 26</div>
                    <div class="small">Goals: 7</div>
                    <div class="small">Assists: 8</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Marcus Rashford</h5>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card"
                   data-name="Roony Bardghji"
                   data-position="Forward"
                   data-number="28"
                   data-matches="14"
                   data-goals="2"
                   data-assists="4"
                   data-bio-id="bio-roony-bardghji"
                   data-bio-url="players/roony-bardghji.php"
                   data-detail="A young right winger known for his skill, pace and goalscoring ability, qualities that make him a very good prospect">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/3ae86d91-e8c5-415e-9299-3b26ec0d2930/28-Bardghji.jpg?width=940&height=940" class="card-img-top" alt="Roony Bardghji">
                <div class="player-overlay">
                  <div class="overlay-content">
                    <div class="display-6 fw-bold">28</div>
                    <div class="small">Matches: 14</div>
                    <div class="small">Goals: 2</div>
                    <div class="small">Assists: 4</div>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Roony Bardghji</h5>
                </div>
              </div>
            </div>
          </div>

          <h3 id="Coach" class="fw-bold mt-4 mb-3">Head Coach</h3>
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100 player-card coach-card"
                   data-name="Hansi Flick"
                   data-position="Head Coach"
                   data-bio-id="bio-hansi-flick"
                   data-bio-url="players/hansi-flick.php"
                   data-detail="The German coach is known for his tactical prowess and ability to lead the team to success.">
                <img src="https://www.fcbarcelona.com/photo-resources/2025/09/09/6b074293-dfb2-4f25-a0e3-3c02b351d730/00-Hansi_Flick.jpg?width=600&height=600" class="card-img-top" alt="Hansi Flick">
                <div class="card-body">
                  <h5 class="card-title">Hansi Flick</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="playerModal" tabindex="-1" aria-labelledby="playerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="playerModalLabel">Player</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3 align-items-center">
              <div class="col-md-5">
                <img id="playerModalImg" src="" alt="Player image" class="img-fluid rounded">
              </div>
              <div class="col-md-7">
                <h4 id="playerModalName" class="mb-1"></h4>
                <div id="playerModalPos" class="text-primary mb-3"></div>
                <div id="playerModalStats" class="mb-3"></div>
                <p id="playerModalDetail" class="mb-0"></p>
                <div class="mt-4">
                  <a id="playerModalBioBtn" class="btn btn-outline-primary" href="#" role="button">Full bio</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
      <a href="#team">
      <i class="fa-solid fa-hand-point-up fa-2x icon-white"></i> </a>
    </button>

    <script src="js/replaceme.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/navbar-auth.js"></script>
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
