
<?php
include 'connexion.php';
session_start();
$sql = "SELECT * FROM produit";
$stmt = $bdd->query($sql);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les Anges - Produits</title>
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
  </header><!-- #header -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/produits/prod.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Produits Frais de Notre Ferme Agro-Pastorale</h2>
                <p>Explorez notre sélection de produits frais et naturels, cultivés avec soin pour vous offrir le meilleur de notre ferme.</p>
                <a href="#produit"><button class="btn btn-success">Acheter Maintenant</button></a>
                <a href="contact.php"><button class="btn btn-danger">En Savoir Plus</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #intro -->
  <div class="section-header" id="produit" style="margin-top: 10%;">
    <h3 class="section-title">Nos produits</h3>
  </div>
  <main>
    <div class="container">
      <?php foreach ($produits as $produit): ?>
      <div class="product">
        <img src="<?= htmlspecialchars($produit['image']); ?>" alt="<?= htmlspecialchars($produit['nom']); ?>">
        <h3><?= htmlspecialchars($produit['nom']); ?></h3>
        <h6><?= htmlspecialchars($produit['description']); ?></h6>
        <p><?= htmlspecialchars($produit['prix']); ?> CFA</p>
        <form action="add_to_cart.php" method="post">
          <input type="hidden" name="id" value="<?= htmlspecialchars($produit['id']); ?>">
          <input type="hidden" name="image" value="<?= htmlspecialchars($produit['image']); ?>">
          <input type="hidden" name="nom" value="<?= htmlspecialchars($produit['nom']); ?>">
          <input type="hidden" name="description" value="<?= htmlspecialchars($produit['description']); ?>">
          <input type="hidden" name="prix" value="<?= htmlspecialchars($produit['prix']); ?>">
          <button type="submit">Ajouter au panier</button>
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </main>
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
