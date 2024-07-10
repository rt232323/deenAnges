
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Les Anges - Panier</title>
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
  


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="lib/jquery/jquery.min.js"></script>

<!-- Script JavaScript personnalisé -->
<script>
$(document).ready(function() {
    // Fonction pour mettre à jour la quantité et recalculer le total
    $('.input-number').on('input', function() {
        var quantity = $(this).val();
        var price = $(this).closest('.product-cart').find('.price').data('price');
        var total = quantity * price;
        $(this).closest('.product-cart').find('.total-price').text(total.toFixed(2) + ' CFA');
        updateTotal();
    });

    // Fonction pour recalculer le montant total
    function updateTotal() {
        var grandTotal = 0;
        $('.product-cart').each(function() {
            var total = $(this).find('.total-price').text();
            total = parseFloat(total.replace(' CFA', ''));
            grandTotal += isNaN(total) ? 0 : total;
        });
        $('#grand-total').text(grandTotal.toFixed(2) + ' CFA');
    }

    // Calculer le total initial
    $('.input-number').each(function() {
        var quantity = $(this).val();
        var price = $(this).closest('.product-cart').find('.price').data('price');
        var total = quantity * price;
        $(this).closest('.product-cart').find('.total-price').text(total.toFixed(2) + ' CFA');
    });

    // Initial call to updateTotal to set the initial grand total
    updateTotal();
});
</script>


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
                        <div class="carousel-background"><img src="img/produits/depositphotos_80867790-stock-photo-basket-of-organic-fresh-produce.jpg" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Produits Frais de Notre Ferme Agro-Pastorale</h2>
                                <p>Finalisez votre commande pour profiter de nos produits frais et naturels, directement issus de notre ferme.</p>
                                <a href="#panier"> <button class="btn btn-success">Valider le Panier</button></a>
                                <a href="contact.php"> <button class="btn btn-danger">En Savoir Plus</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #intro -->

    <div class="section-header" id="panier" style="margin-top: 10%;">
        <h3 class="section-title">Votre panier</h3>
    </div>

    <div class="colorlib-product">
        <div class="cont">
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left">
                            <span>Produits</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Prix</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Quantité</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Total</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Supprimer</span>
                        </div>
                    </div>
                    <?php
                    // Vérifier si le panier existe dans la session et s'il n'est pas vide
                    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        foreach ($_SESSION['panier'] as $key => $product) {
                            // Vérifier si la clé 'image' existe dans le produit
                            $image = isset($product['image']) ? htmlspecialchars($product['image']) : 'placeholder.jpg';
                            // Affichage du produit dans le panier
                            echo '<div class="product-cart d-flex">
                                <div class="one-forth">
                                    <div class="product-img" style="background-image: url(' . $image . ');">
                                    </div>
                                    <div class="display-tc">
                                        <h3>' . htmlspecialchars($product['nom']) . '</h3>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price" data-price="' . htmlspecialchars($product['prix']) . '">' . htmlspecialchars($product['prix']) . ' €</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <input type="number" id="quantity_' . $key . '" name="quantity_' . $key . '" class="form-control input-number text-center" value="' . htmlspecialchars($product['quantite']) . '" min="1" max="100">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="total-price">' . ($product['prix'] * $product['quantite']) . ' €</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="supprimer.php?id=' . $product['id'] . '" class="closed"></a>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<p>Votre panier est vide.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="total-wrap">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div class="total">
                <div class="grand-total">
                    <p><span><strong>Montant Total :</strong></span> <span id="grand-total">0 CFA</span></p>
                </div>
                <form action="validerpanier.php" method="POST">
                <button class="btn-validate" type="submit" name="valider">Valider</button>
                </form>
                
            </div>
        </div>
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
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <!--  Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>


