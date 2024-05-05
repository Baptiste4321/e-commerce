<?php
session_start();
include('login.php');

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $Prenom = $_POST['Prenom'];
    $Mail = $_POST['Mail'];
    $Hash_mdp = $_POST['Hash_mdp'];
    $Hash_mdp_confirm = $_POST['Hash_mdp_confirm'];

    // Vérification si le Mail est déjà utilisé
    $query = "SELECT * FROM Utilisateur WHERE Mail = :Mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Mail déjà utilisé
        header('Location: ../connexion.php?error_message2=Vous%20avez%20deja%20un%20compte.' . '&reg-log=checked');
        exit();

        exit();
    } elseif ($Hash_mdp !== $Hash_mdp_confirm) {
        // Mots de passe non identiques
        header('Location: ../connexion.php?error_message2=Les%20mots%20de%20passe%20ne%20correspondent%20pas.' . '&reg-log=checked');
        exit();
    } else {
        // Redirection vers enregistrer.php si les conditions sont validées
        header('Location: enregistrer.php?Prenom=' . urlencode($Prenom) . '&Mail=' . urlencode($Mail) . '&Hash_mdp=' . urlencode($Hash_mdp));
        exit();
    }

}
?>
