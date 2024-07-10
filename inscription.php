<?php
include("connexion.php");
if(isset($_POST['valider'])){

                            
                            $mdp =$_POST['password'];
                            $co =$_POST['confirme'];
                            if($mdp!=$co){
                                echo "<script>alert('mot de passe incorrecte')</script>";
                            }
                            else{
                                $n =$_POST['nom'];
                                $p =$_POST['prenom'];
                                $v =$_POST['telephone'];
                                $e =$_POST['email'];
                                $md =$_POST['password'];
                                $conf =$_POST['confirme'];
                                // inertion des donnees 
                            $req1 = "INSERT into utilisateurs values('','$n','$p','$e','$v','$md','Client')";
                            //Execution requete 
                          
                                if($bdd->query($req1)==true)
                                {
                                    header("Location: login.php");
                                
                                }
                                else
                                {
                                    header("Location: error.html");
                                }
                           
                            
                        }
                    }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Les Anges Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="css/inscription.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/logo.PNG" alt="">
                    <span class="d-none d-lg-block">Inscription</span>
                </a>
            </div><!-- End Logo -->
            <form action="inscription.php" method="POST">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Votre numéro de téléphone</label>
                <input type="text" id="telephone" name="telephone" required>
            

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>

                <label for="confirme">Confirmer mot de passe</label>
                <input type="password" id="confirme" name="confirme" required>
                
                <button type="submit" name="valider">S'inscrire</button>

                <div class="checkbox-container">
                    <label for="age-confirmation">Vous avez de compte ? <a href="login.php">Connectez-vous</a></label>
                </div>
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
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>
    <!-- Main Javascript File -->
    <script src="js/main.js"></script>
</body>
</html>

