<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/nav-bar.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php
include "includes/header.php"
?>

<?php
include('php/login.php');

// Vérification si l'ID du produit est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupération de l'ID du produit depuis l'URL
    $id_produit = $_GET['id'];

    // Requête pour récupérer les informations du produit depuis la base de données
    $query = "SELECT * FROM Produit WHERE ID_produit = :id_produit";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
    $stmt->execute();

    // Récupération des données du produit
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si le produit existe
    if($produit) {
        // Définition des informations du produit
        $nom_produit = $produit['Nom'];
        $prix_produit = $produit['Prix'];
        $caracteristiques = explode(',', $produit['Description']); // Si les caractéristiques sont stockées sous forme de chaîne séparée par des virgules

        // Définition du chemin de l'image
        $imagePath = "image/image/" . $id_produit . ".jpg";
    } else {
        // Redirection vers une page d'erreur si le produit n'existe pas
        header('Location: erreur.php');
        exit();
    }
} else {
    // Redirection vers une page d'erreur si l'ID du produit n'est pas fourni dans l'URL
    header('Location: erreur.php');
    exit();
}
?>

<main class="product-main">
    <div class="product-image2">
        <img id="add_img" src="<?php echo $imagePath; ?>" alt="<?php echo $nom_produit; ?>">
    </div>
    <div class="product-details">
        <h1><?php echo $nom_produit; ?></h1>
        <p>Prix : $<?php echo $prix_produit; ?></p>
        <label for="size">Taille :</label>
        <select id="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select>
        <h2>Caractéristiques :</h2>
        <ul>
            <?php foreach($caracteristiques as $caracteristique) : ?>
                <li><?php echo $caracteristique; ?></li>
            <?php endforeach; ?>
        </ul>
        <button>Ajouter au panier</button>
    </div>
</main>

<?php
include "includes/footer.php"
?>

</body>
<script src="/javascript/nav-bar.js"></script>
<script src="/javascript/description.js"></script>
</html>


