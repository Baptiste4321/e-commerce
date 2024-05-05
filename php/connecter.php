<?php
session_start();
include('login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Mail = $_POST['Mail'];
    $Hash_mdp = $_POST['Hash_mdp'];

    // Vérifiez les informations d'identification dans la base de données
    $query = "SELECT * FROM Utilisateur WHERE Mail = :Mail AND Hash_mdp = :Hash_mdp";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->bindParam(':Hash_mdp', $Hash_mdp, PDO::PARAM_STR);
    $stmt->execute();

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['Mail'] = $user['Mail'];
        header('Location: ../utilisateur.php');
        exit();
    } else {
        header('Location: ../connexion.php?error_message=Identifiants%20incorrects');
        exit();
    }
}
?>