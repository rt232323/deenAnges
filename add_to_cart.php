
<?php
session_start();

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les détails du produit depuis le formulaire
    $product_id = $_POST['id'];
    $product_name = $_POST['nom'];
    $product_image = $_POST['image'];
    $product_description = $_POST['description'];
    $product_price = $_POST['prix'];
    
    // Ajouter le produit au panier (utilisation de sessions pour stocker le panier)
    $item = array(
        'id' => $product_id,
        'image' => $product_image,
        'nom' => $product_name,
        'description' => $product_description,
        'prix' => $product_price,
        'quantite' => 1  // On peut ajouter la quantité si nécessaire
    );

    // Vérifier si le panier existe dans la session, sinon le créer
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    // Vérifier si le produit est déjà dans le panier
    if (array_key_exists($product_id, $_SESSION['panier'])) {
        // Si oui, augmenter la quantité
        $_SESSION['panier'][$product_id]['quantite']++;
    } else {
        // Sinon, ajouter le produit au panier
        $_SESSION['panier'][$product_id] = $item;
    }

    // Rediriger vers la page précédente ou vers une page de confirmation
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>