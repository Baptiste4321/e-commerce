<?php
$query = "SELECT Nom, Prenom, Mail, Type_utilisateur, Hash_mdp, Date_de_naissance FROM Utilisateur WHERE Mail = :Mail";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['Nom'] = $userData['Nom'];
$_SESSION['Prenom'] = $userData['Prenom'];
$_SESSION['Mail'] = $userData['Mail'];
$_SESSION['Type_utilisateur'] = $userData['Type_utilisateur'];
$_SESSION['Hash_mdp'] = $userData['Hash_mdp'];
$_SESSION['Date_de_naissance'] = $userData['Date_de_naissance'];
?>