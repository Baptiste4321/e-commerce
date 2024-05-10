<?php
session_start();
include('login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Mail = $_POST['Mail'];
    $mot_de_passe = $_POST['mdp'];

    // Récupérer le mot de passe haché de l'utilisateur depuis la base de données
    $query = "SELECT * FROM Utilisateur WHERE Mail = :Mail";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($mot_de_passe, $user['Hash_mdp'])) {
        $Mail = $user['Mail'];
        include "../includes/SESSION.php";
        header('Location: ../'.$_SESSION['Type_utilisateur'].'.php');
        exit();
    } else {
        header('Location: ../connexion.php?error_message=Identifiants%20incorrects');
        exit();
    }
}
?>
