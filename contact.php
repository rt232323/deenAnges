
<?php
include 'connexion.php';
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les Anges - Contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
  
    <!-- Favicons -->
    <link href="img/favicon.jpg" rel="icon">
    <link href="img/apple-touch-icon.jpg" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/styleproduits.css" rel="stylesheet">


<style>
  /* Global Styles */
  .section.contact {
  padding: 40px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.section.contact h3 {
  color: #007bff;
  font-size: 2em;
  margin-bottom: 20px;
}

.section.contact ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.section.contact ul li {
  margin-bottom: 10px;
}

.section.contact ul li strong {
  font-weight: bold;
}

.section.contact ul li a {
  color: #007bff;
  text-decoration: none;
}

.section.contact ul li a:hover {
  text-decoration: underline;
}

/* Responsive Adjustments */

@media (max-width: 768px) {
  .section.contact {
    padding: 30px;
  }
  .section.contact h3 {
    font-size: 1.5em;
  }
  .cad img {
    width: 100%;
    height: 100%;
  }
}

@media (max-width: 480px) {
  .section.contact {
    padding: 20px;
  }
  .section.contact h3 {
    font-size: 1.2em;
  }
  
}


/* Cartes */
.cad {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    margin-bottom: 20px;
}

.cad:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.cad-body {
    padding: 20px;
}

.cad-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #28a745;
}

.cad-text {
    font-size: 1.2rem;
    color: #555;
}
.cad img {
    width: 100%;
    height: 400px;
  }

  .cad-text a {
    color: #007bff;
  }
</style>
</head>

<body>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Les Anges</a></h1>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.html">Accueil</a></li>
          <li><a href="#about">A propos</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="produit.php">Produits</a></li>
          <li>
                        <a href="panier.php">
                            Panier  <i class="fa fa-shopping-cart"></i>
                            <?php
                            // Compter le nombre de produits dans le panier
                            $totalProducts = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
                            echo '<span class="badge">' . $totalProducts . '</span>';
                            ?>
                        </a>
                    </li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Connexion</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>

</header><!-- End Header -->

  <main id="main" class="main">

    <div style="margin-top: 10%">
      <div class="cad">
        <img src="img/produits/contact1.png" alt="" >
          <div class="cad-body">
              <h5 class="cad-title" >Whatsapp</h5>
              <p class="cad-text">
                  <span><strong>Discutez avec nous sur whatsapp:</strong> <a href="https://wa.me/+22997138955">https://wa.me/+22997138955</a></span>
              </p>
          </div>
      </div>
  </div>

  <div >
      <div class="cad">
          <div class="cad-body">
              <h5 class="cad-title" >Email</h5>
              <p class="cad-text">
                  <span><strong>Envoie-nous un message:</strong> <a href="mailto:mathuakouet@yahoo.fr">mathuakouet@yahoo.fr</a></span>
              </p>
          </div>
      </div>
  </div>

  </main><!-- End #main -->


  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <!--  Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>

</body>

</html>