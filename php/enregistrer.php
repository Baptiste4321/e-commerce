<?php
session_start();
include('login.php'); // Inclusion du fichier de connexion à la base de données

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $Prenom = $_POST['Prenom'];
    $Mail = $_POST['Mail'];
    $Hash_mdp = $_POST['Hash_mdp'];
    $Type_utilisateur = 'client';

    // Insertion des données dans la base de données
    $query = "INSERT INTO Utilisateur (Prenom, Mail, Hash_mdp,Type_utilisateur) VALUES (:Prenom, :Mail, :Hash_mdp, :Type_utilisateur)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Prenom', $Prenom, PDO::PARAM_STR);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->bindParam(':Hash_mdp', $Hash_mdp, PDO::PARAM_STR);

    // Exécution de la requête d'insertion
    if ($stmt->execute()) {
        // Redirection vers la page utilisateur après inscription réussie
        $_SESSION['Prenom'] = $Prenom;
        $_SESSION['Mail'] = $Mail;
        header('Location: ../utilisateur.php');
        exit();
    } else {
        // En cas d'erreur lors de l'inscription, afficher un message d'erreur
        $error_message = 'Une erreur est survenue lors de l\'inscription.';
    }
}
?>