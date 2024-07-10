
<?php
session_start();
include ("connexion.php");
if(isset($_POST['valider'])){

                //récupération des donées
                $e=$_POST['email'];
                $p=$_POST['password'];
            // insertion de la requète
            $req1="SELECT * FROM utilisateurs WHERE email='$e' AND password='$p' ";  
            $reponse = $bdd->query($req1);
            $resultat = $reponse->fetchAll();
             //verification de la requete
            if( !$resultat ){ 
                header("Location: error.html");
           
            }
            else
            {
              $_SESSION['utilisateurs_id'] = $utilisateurs['id'];
                foreach($resultat as $utilisateurs)
                {
                    if($utilisateurs['profil']== 'Client')
                    {
                        header("Location: panier.php");
                    }
                    else{
                        header("Location: listeproduit.php");
                    }
                }
                
            }
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Les Anges - Connexion</title>
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

<style>
    
header {
    background-color: #343a40;
    color: #fff;

}
@media (max-width: 768px) {
.media-login  img {
  width: 100%;
  height: 100%;
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
          <li class="menu-active"><a href="#intro">Accueil</a></li>
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
    <div class="authincation h-100">
        <div class="cont h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-12">
					<div class="row align-items-center ">
						<div class="card login-card" style="margin-top: 8%; margin-left: 8%;">
							<div class="card-body" >
								<div class="row">
									<div class="col-xl-6">
										
										<div class="media-login">
											<img src="img/produits/prod.jpg" class="w-50" alt="">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="auth-form">
											<h3 class="text-start mb-4 font-w600">Connexion </h3>
											<form action="login.php" method="POST">

												<div class="form-group">
													<label class="mb-1 text-black">Email<span class="required"></span></label>
													<input type="email" name="email" class="form-control" >
												</div>
												<div class="form-group">
													<label class="mb-1 text-black">Mot de passe<span class="required"></span></label>
													<input type="password" name="password" class="form-control" >
												</div>
												<div class="form-row d-flex justify-content-between mt-4 mb-2">
													<div class="form-group">
													 
														
													</div>
												</div>
												<div class="text-center">
													<button  type="submit" name="valider" class="btn btn-success btn-block">Se connecter</button>
												</div>
											</form>
											<div class="new-account mt-3 d-flex align-items-center justify-content-between flex-wrap">
												<small class="mb-0">Vous n'avez pas de compte? <a class="text-success" href="inscription.php">S'inscrire'</a></small>
												<small href="page-forgot-password.html">Mot de passe oublié?</small>
											</div>
													
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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


</body>

</html>