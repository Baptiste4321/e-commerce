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

// Récup le mot recherché depuis l'URL
$chaine = isset($_GET['mot_recherche']) ? $_GET['mot_recherche'] : '';
//separer les mots
$mots = explode(" ", $chaine);

$resultats = [];
$resultat_temp = []; // Initialiser les tableau pour stocker les résultats

foreach ($mots as $mot) {
    if($mot=="pontalon" or $mot=="patalon" or $mot=="ponttalon" or $mot=="pontallon" or $mot=="panttalon" or $mot=="pantallon" or $mot=="pentalon" or $mot=="trousers"){
        $mot="pantalon";
    }
    if($mot=="famme" or $mot=="feme" or $mot=="fame" or $mot=="phamme" or $mot=="woman"){
        $mot="femme";
    }
    if($mot=="tshirt" or $mot=="tishirt" or $mot=="tishert" or $mot=="t-shert" or $mot=="ticherte" or $mot=="ticheurt" or $mot=="t-chirt" or $mot=="tishort" or $mot=="t-short"){
        $mot="t-shirt";
    }
    if($mot=="chossure" or $mot=="chausure" or $mot=="chaucure" or $mot=="shosure" or $mot=="chassure" or $mot=="shoe" or $mot=="shoes"){
        $mot="chaussure";
    }
    if($mot=="Home" or $mot=="omme" or $mot=="ome" or $mot=="aume" or $mot=="haume" or $mot=="haumme" or $mot=="man"){
        $mot="Homme";
    }
    if($mot=="anfant" or $mot=="anfent" or $mot=="enphant" or $mot=="enphent" or $mot=="enffant" or $mot=="child" or $mot=="children"){
        $mot="enfant";
    }


    // Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
    $sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE Nom LIKE :mot_recherche OR Description LIKE :mot_recherche";

    // Préparer la requête SQL
    $stmt = $pdo->prepare($sql);

    // Lier le paramètre de recherche
    $mot_recherche_param = "%$mot%";
    $stmt->bindParam(':mot_recherche', $mot_recherche_param, PDO::PARAM_STR);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $nouveaux_resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fusionner les résultats de la recherche dans le tableau $resultat_temp
    $resultat_temp = array_merge($resultat_temp, $nouveaux_resultats);
}

// Compter le nombre d'occurrences de chaque élément
$occurrences = array_count_values(array_column($resultat_temp, 'ID_produit'));

// Trier le tableau par ordre décroissant en fonction du nombre d'occurrences
arsort($occurrences);

// Créer un tableau pour stocker les résultats triés
$resultats = [];

// Réorganiser les résultats en fonction du nombre d'occurrences
foreach ($occurrences as $id_produit => $occurrence) {
    foreach ($resultat_temp as $resultat) {
        if ($resultat['ID_produit'] == $id_produit) {
            $resultats[] = $resultat;
        }
    }
}

// Supprimer les doublons
$resultats = array_unique($resultats, SORT_REGULAR);
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
