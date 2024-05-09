<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Image Grid</title>
    <link rel="stylesheet" href="css/recherche.css">
    <link rel="stylesheet" href="css/nav-bar.css">
</head>
<body>

<?php
include "includes/header.php"
?>

<?php
// Inclure le fichier login.php pour établir la connexion à la base de données
include 'php/login.php';

// Récupérer le mot de recherche depuis l'URL
$mot_recherche = isset($_GET['mot_recherche']) ? $_GET['mot_recherche'] : '';

// Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
$sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE Nom LIKE :mot_recherche OR Description LIKE :mot_recherche";

// Préparer la requête SQL
$stmt = $pdo->prepare($sql);

// Lié le paramètre de recherche
$mot_recherche_param = "%$mot_recherche%";
$stmt->bindParam(':mot_recherche', $mot_recherche_param, PDO::PARAM_STR);

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats de la requête
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Intégration du code PHP généré dans le HTML -->


<div id="image-grid">
    <?php
    // Parcourir les résultats et générer le contenu HTML pour chaque produit
    foreach ($resultats as $produit) {
        $redirection= "description.php?id=" . $produit['ID_produit'];
        if($produit['ID_produit'] == 1){
            $redirection= "personnaliser.php?id=" . $produit['ID_produit'];
        }
        echo '<div class="image-container">';
        echo '<a href='. $redirection .'><img src="image/image/' . $produit['ID_produit'] . '.jpg" alt="' . $produit['Nom'] . '"></a>';
        echo '<div>Prix : €' . number_format($produit['Prix'], 2) . '</div>';
        echo '<a href='. $redirection .'>' . $produit['Nom'] . '</a>';
        echo '</div>';
    }
    ?>
</div>
<script src="javascript/nav-bar.js"></script>

<?php
include "includes/footer.php"
?>

</body>
</html>
