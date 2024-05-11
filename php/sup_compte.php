<?php
session_start();

// Inclusion du fichier de connexion à la base de données
include('login.php');

// Vérification si un utilisateur est connecté
if(isset($_SESSION['Mail'])) {
    // Récupération de l'adresse e-mail de l'utilisateur à supprimer
    $mail_utilisateur = $_SESSION['Mail'];

    // Suppression des enregistrements liés à l'utilisateur dans la table "panier"
    $query_panier = "DELETE FROM panier WHERE Mail = :mail_utilisateur";
    $stmt_panier = $pdo->prepare($query_panier);
    $stmt_panier->bindParam(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR);
    $stmt_panier->execute();

    // Requête de suppression dans la table "utilisateur"
    $query_utilisateur = "DELETE FROM utilisateur WHERE Mail = :mail_utilisateur";
    $stmt_utilisateur = $pdo->prepare($query_utilisateur);
    $stmt_utilisateur->bindParam(':mail_utilisateur', $mail_utilisateur, PDO::PARAM_STR);

    // Exécution de la requête de suppression
    if($stmt_utilisateur->execute()) {
        // Redirection vers la page d'accueil après suppression réussie
        header('Location: ../index.php');
        exit();
    } else {
        // En cas d'erreur lors de la suppression, afficher un message d'erreur
        echo "Une erreur est survenue lors de la suppression du compte.";
    }
} else {
    // Redirection vers la page d'accueil si aucun utilisateur n'est connecté
    header('Location: ../index.php');
    exit();
}

// Détruire la session existante
session_unset();
session_destroy();

?>
