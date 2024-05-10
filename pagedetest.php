<?php
// Inclure le fichier login.php pour établir la connexion à la base de données
include 'php/login.php';

// Récupérer le mot de recherche depuis l'URL
$chaine = isset($_GET['mot_recherche']) ? $_GET['mot_recherche'] : '';
$mots = [];
$mots = explode(" ", $chaine);
$resultats = [];
foreach ($mots as $mot) {
    $mot_recherche= $mot;
    // Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
    $sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE Nom LIKE :mot_recherche OR Description LIKE :mot_recherche";

    // Préparer la requête SQL
    $stmt = $pdo->prepare($sql);

    // Lié le paramètre de recherche
    $mot_recherche_param = "%$mot_recherche%";
    $stmt->bindParam(':mot_recherche', $mot_recherche_param, PDO::PARAM_STR);

    // Exécuter la requête
    $stmt->execute();

    $nouveaux_resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resultats = array_merge($resultats, $nouveaux_resultats);

}
?>