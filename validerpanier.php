<?php
session_start();

// Vérifier si l'utilisateur a cliqué sur le bouton Valider
if (isset($_POST['valider'])) {
    // Récupérer les produits du panier depuis la session
    $panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

    if (empty($panier)) {
        // Si le panier est vide, afficher un message
        $message = "Votre panier est vide.";
        echo "<script>alert('$message'); window.location.href='panier.php';</script>";
        exit();
    } else {
        // Construire le message pour WhatsApp avec la liste des produits
        $message = "Bonjour!! Je souhaiterais passer une commande avec les produits suivants:\n";
        foreach ($panier as $product) {
            $nomProduit = htmlspecialchars($product['nom']);
            $quantite = htmlspecialchars($product['quantite']);
            $message .= "$nomProduit - Quantité: $quantite\n";
        }

        // Numéro WhatsApp de l'administrateur
        $numeroWhatsApp = "+22997138955"; // Remplacez par le numéro de l'administrateur

        // URL pour ouvrir WhatsApp avec le message prérempli
        $whatsappURL = "https://api.whatsapp.com/send?phone=$numeroWhatsApp&text=" . urlencode($message);

        // Redirection vers WhatsApp
        header("Location: $whatsappURL");

        // Vider le panier après la validation
        unset($_SESSION['panier']);
        exit();
    }
} else {
    // Redirection si l'utilisateur accède directement à ce fichier sans valider le formulaire
    header("Location: panier.php");
    exit();
}
?>

