
<?php
session_start();

// Vérifier si l'ID du produit est passé en paramètre
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si le panier existe dans la session et s'il n'est pas vide
    if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        // Parcourir le panier pour trouver le produit à supprimer
        foreach ($_SESSION['panier'] as $key => $product) {
            if($product['id'] == $id) {
                // Supprimer le produit du panier en utilisant son ID
                unset($_SESSION['panier'][$key]);
                break; // Sortir de la boucle après la suppression
            }
        }
    }
}

// Rediriger vers la page du panier après la suppression
header('Location: panier.php');
exit;
?>
