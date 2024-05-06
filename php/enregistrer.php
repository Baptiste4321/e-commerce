<?php
session_start();
include('login.php'); // Inclusion du fichier de connexion à la base de données

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $Prenom = $_POST['Prenom'];
    $Mail = $_POST['Mail'];
    $Hash_mdp = $_POST['Hash_mdp'];
    $Hash_mdp_confirm = $_POST['Hash_mdp_confirm'];
    $Type_utilisateur = 'client';

    // Vérification si le Mail est déjà utilisé
    $query = "SELECT * FROM Utilisateur WHERE Mail = :Mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Mail déjà utilisé
        header('Location: ../connexion.php?error_message2=Vous%20avez%20deja%20un%20compte.&reg-log=checked');
        exit();
    } elseif ($Hash_mdp !== $Hash_mdp_confirm) {
        // Mots de passe non identiques
        header('Location: ../connexion.php?error_message2=Les%20mots%20de%20passe%20ne%20correspondent%20pas.&reg-log=checked');
        exit();
    } else {
        // Insertion des données dans la base de données
        $query = "INSERT INTO Utilisateur (Prenom, Mail, Hash_mdp, Type_utilisateur) VALUES (:Prenom, :Mail, :Hash_mdp, :Type_utilisateur)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':Prenom', $Prenom, PDO::PARAM_STR);
        $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
        $stmt->bindParam(':Hash_mdp', $Hash_mdp, PDO::PARAM_STR);
        $stmt->bindParam(':Type_utilisateur', $Type_utilisateur, PDO::PARAM_STR);

        // Exécution de la requête d'insertion
        if ($stmt->execute()) {
            // Redirection vers la page utilisateur après inscription réussie
            $_SESSION['Prenom'] = $Prenom;
            $_SESSION['Mail'] = $Mail;
            $_SESSION['Type_utilisateur'] = $Type_utilisateur;
            header('Location: ../'.$Type_utilisateur.'.php');
            exit();
        } else {
            // En cas d'erreur lors de l'inscription, afficher un message d'erreur
            $error_message = 'Une erreur est survenue lors de l\'inscription.';
        }
    }
}
?>
