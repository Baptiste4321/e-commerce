<?php
// Démarrer la sessionù
session_start();
// Inclusion du fichier de connexion à la base de données
include('login.php');

// ajout de PL si beug supprimer

if (!isset($_SESSION['Mail'])) {
    header('Location: connexion.php');
    exit();
}

$Mail = $_SESSION['Mail'];

if ($_SESSION['Type_utilisateur'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

//Fin de l'ajout PL


// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $images = $_FILES['image']; // Récupération des fichiers

    // Requête d'insertion dans la table "produit"
    $query_produit = "INSERT INTO produit (Nom, Prix, Description, Mail) VALUES (:nom, :prix, :description, :Mail)";
    $stmt_produit = $pdo->prepare($query_produit);
    $stmt_produit->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt_produit->bindParam(':prix', $prix, PDO::PARAM_STR);
    $stmt_produit->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt_produit->bindParam(':Mail', $Mail, PDO::PARAM_STR);

    // Exécution de la requête d'insertion dans la table "produit"
    if ($stmt_produit->execute()) {
        // Récupération de l'ID_produit nouvellement inséré
        $nouvel_id_produit = $pdo->lastInsertId();

        // Création du dossier pour les images
        $dossier_images = "../image/image/" . $nouvel_id_produit; // Chemin du dossier
        if (!is_dir($dossier_images)) { // Vérifie si le dossier n'existe pas déjà
            mkdir($dossier_images, 0777, true); // Crée le dossier avec les permissions nécessaires
        }

        // Parcours des fichiers téléchargés
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            $nom_fichier = $images['name'][$key];
            $extension = pathinfo($nom_fichier, PATHINFO_EXTENSION);
            $nouveau_nom_fichier = ($key + 1) . '.' . $extension;
            $chemin_fichier = $dossier_images . '/' . $nouveau_nom_fichier;
            move_uploaded_file($tmp_name, $chemin_fichier);
        }

        // Requête d'insertion dans la table "taille_produit"
        $query_taille = "INSERT INTO taille_produit (ID_produit, Stock_disponible) VALUES (:id_produit, :stock)";
        $stmt_taille = $pdo->prepare($query_taille);
        $stmt_taille->bindParam(':id_produit', $nouvel_id_produit, PDO::PARAM_INT);
        $stmt_taille->bindParam(':stock', $stock, PDO::PARAM_INT);

        // Exécution de la requête d'insertion dans la table "taille_produit"
        if ($stmt_taille->execute()) {
            // Redirection vers la page utilisateur après insertion réussie
            header('Location: ../article_en_vente.php');
            exit();
        } else {
            // En cas d'erreur lors de l'insertion dans la table "taille_produit"
            $error_message = 'Une erreur est survenue lors de l\'insertion dans la table "taille_produit".';
        }
    } else {
        // En cas d'erreur lors de l'insertion dans la table "produit"
        $error_message = 'Une erreur est survenue lors de l\'insertion dans la table "produit".';
    }
}
?>
