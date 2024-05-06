<?php
// Importer la connexion à la base de données depuis login.php
require_once('login.php');

// Récupérer le terme de recherche de la requête AJAX
$searchTerm = $_POST['searchTerm'];

// Initialiser un tableau pour stocker les IDs des produits correspondants
$productIds = array();

// Requête pour rechercher dans la table produit
$sql = "SELECT id_produit FROM produit WHERE description LIKE :searchTerm OR titre LIKE :searchTerm";

try {
    // Préparer la requête SQL
    $stmt = $pdo->prepare($sql);
    // Lier le paramètre :searchTerm
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    // Exécuter la requête
    $stmt->execute();

    // Si des résultats sont trouvés, stocker les IDs des produits correspondants dans le tableau
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productIds[] = $row['id_produit'];
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur lors de l'exécution de la requête
    die("Erreur lors de la recherche dans la base de données: " . $e->getMessage());
}

// Renvoyer les IDs des produits correspondants au format JSON
echo json_encode($productIds);
?>
