
<?php
session_start();


include 'connexion.php';
$sql = "SELECT * FROM produit";
$stmt = $bdd->query($sql);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM produit WHERE id = ?";
    $delete_stmt = $bdd->prepare($delete_sql);
    $delete_stmt->bindParam(1, $delete_id);
    if ($delete_stmt->execute()) {
        header("Location: listeproduit.php");
        exit;
    } else {
        $message = "Erreur lors de la suppression du produit.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BizPage Bootstrap Template</title>
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
        .container {
            margin-top: 50px;
        }
        .product-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-container h2 {
            margin-bottom: 20px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table th, .product-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .btn {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .product-table th, .product-table td {
                padding: 2px;
                font-size: 10px;
            }
            .product-container {
                padding: 10px;
            }
            .btn {
              font-size: 7px;
            margin-bottom: 5px;
        }
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
          <li><a href="deconnexion.php">Deconnexion</a></li>
          
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
                <h2>Liste des produits Frais de Notre Ferme Agro-Pastorale</h2>
              </div>
            </div>
          </div>



      </div>
    </div>
  </section><!-- #intro -->
 
        <div class="product-container">
            <h2>Liste des Produits</h2>
            <?php if (!empty($message)): ?>
                <div class="alert alert-info"><?= htmlspecialchars($message); ?></div>
            <?php endif; ?>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td><?= htmlspecialchars($produit['id']); ?></td>
                            <td><?= htmlspecialchars($produit['nom']); ?></td>
                            <td><?= htmlspecialchars($produit['description']); ?></td>
                            <td><?= htmlspecialchars($produit['prix']); ?> CFA</td>
                            <td><img src="<?= htmlspecialchars($produit['image']); ?>" alt="<?= htmlspecialchars($produit['nom']); ?>" width="50"></td>
                            <td>
                                <a href="modifier_produit.php?id=<?= $produit['id']; ?>" class="btn btn-primary">Modifier</a>
                                <a href="listeproduit.php?delete_id=<?= $produit['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
