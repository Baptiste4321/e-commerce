<?php
// Démarrer la session
session_start();

// Inclusion du fichier de connexion à la base de données
include('login.php');

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $Prenom = $_POST['Prenom'];
    $Nom = $_POST['Nom'];
    $Date_de_naissance = $_POST['naissance'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $mdp_confirm = $_POST['mdp_confirm'];
    $Mail = $_SESSION['Mail'];

    // Vérification si les mots de passe correspondent
    if ($mot_de_passe !== $mdp_confirm) {
        // Mots de passe non identiques
        header('Location: ../infos.php?error_message2=Les%20mots%20de%20passe%20ne%20correspondent%20pas');
        exit();
    }

    // Si le champ mot de passe est vide, utiliser l'ancien mot de passe
    if (empty($mot_de_passe)) {
        $Hash_mdp = $_SESSION['Hash_mdp'];
    } else {
        // Hachage du mot de passe
        $Hash_mdp = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }

    // Insertion des données dans la base de données
    $query = "UPDATE Utilisateur SET Prenom = :Prenom, Nom = :Nom, Date_de_naissance = :Date_de_naissance, Hash_mdp = :Hash_mdp WHERE Mail = :Mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Prenom', $Prenom, PDO::PARAM_STR);
    $stmt->bindParam(':Nom', $Nom, PDO::PARAM_STR);
    $stmt->bindParam(':Date_de_naissance', $Date_de_naissance, PDO::PARAM_STR);
    $stmt->bindParam(':Hash_mdp', $Hash_mdp, PDO::PARAM_STR);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);

    // Exécution de la requête de mise à jour
    if ($stmt->execute()) {
        // Redirection vers la page utilisateur après mise à jour réussie
        $_SESSION['Prenom'] = $Prenom;
        $_SESSION['Hash_mdp'] = $Hash_mdp;
        $_SESSION['Nom'] = $Nom;
        $_SESSION['Date_de_naissance'] = $Date_de_naissance;
        header('Location: ../infos.php');
        exit();
    } else {
        // En cas d'erreur lors de la mise à jour, afficher un message d'erreur
        $error_message = 'Une erreur est survenue lors de la mise à jour.';
    }
}
?>
