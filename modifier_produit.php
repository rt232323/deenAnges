<?php
session_start();


include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produit WHERE id = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produit) {
        $message = "Produit non trouvé.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_FILES['image']['name'];
    $target = "img/produits/" . basename($image);

    if (empty($image)) {
        $target = $produit['image'];
    } else {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $sql = "UPDATE produit SET nom = ?, description = ?, prix = ?, image = ? WHERE id = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $prix);
    $stmt->bindParam(4, $target);
    $stmt->bindParam(5, $id);

    if ($stmt->execute()) {
        $message = "Le produit a été modifié avec succès.";
        header("Location: listeproduit.php");
        exit;
    } else {
        $message = "Erreur lors de la modification du produit.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les Anges - Modifier Produit</title>
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
            margin-top: 10%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
           
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
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
        .product-image {
            max-width: 100px;
            margin-bottom: 10px;
            display: block;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }
            .container{
                margin-top: 30%;
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
          <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <div class="container">
      <div class="form-container">
          <h2>Modifier Produit</h2>
          <?php if (!empty($message)): ?>
              <div class="alert alert-info message"><?= htmlspecialchars($message); ?></div>
          <?php endif; ?>
          <form action="modifier_produit.php?id=<?= htmlspecialchars($id); ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= htmlspecialchars($produit['id']); ?>">
              <div class="form-group">
                  <label for="nom">Nom du Produit</label>
                  <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($produit['nom']); ?>" required>
              </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($produit['description']); ?></textarea>
              </div>
              <div class="form-group">
                  <label for="prix">Prix</label>
                  <input type="text" class="form-control" id="prix" name="prix" value="<?= htmlspecialchars($produit['prix']); ?>" required>
              </div>
              <div class="form-group">
                  <label for="image">Image du Produit</label>
                  <img src="<?= htmlspecialchars($produit['image']); ?>" alt="<?= htmlspecialchars($produit['nom']); ?>" class="product-image">
                  <input type="file" class="form-control-file" id="image" name="image">
              </div>
              <button type="submit" class="btn btn-primary">Modifier le Produit</button>
          </form>
      </div>
  </div>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

