<?php
session_start();



include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_FILES['image']['name'];
    $target = "img/produits/" . basename($image);

    $sql = "INSERT INTO produit (nom, description, prix, image) VALUES (?, ?, ?, ?)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $prix);
    $stmt->bindParam(4, $target);

    if ($stmt->execute()) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $message = "Le produit a été ajouté avec succès.";
        } else {
            $message = "L'ajout du produit a réussi, mais le téléchargement de l'image a échoué.";
        }
    } else {
        $message = "Erreur : " . $sql . "<br>" . $bdd->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les Anges - Ajouter Produit</title>
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
        body {
            background-color: #f8f9fa;
        }
        .con {
            margin-top: 5%;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
        }
    </style>
</head>
<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Les Anges</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="listeproduit.php">Liste des produits</a></li>
          <li><a href="nouveau_produit.php">Nouveau Produit</a></li>
          <li><a href="deconnexion.php">Déconnexion</a></li>
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
                <h2>Ajouter un nouveau Produit</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- #intro -->

  <div class="con">
    <div class="form-container">
        <h2>Ajouter un Nouveau Produit</h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info message"><?= htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form action="nouveau_produit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom du Produit</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="form-group">
                <label for="image">Image du Produit</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
        </form>
    </div>
  </div>

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
  <script src="contactform/contactform.js"></script>
  <script src="js/main.js"></script>

</body>
</html>

