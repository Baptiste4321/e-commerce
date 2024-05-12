<?php
session_start();
include 'php/login.php';
$Mail = $_SESSION['Mail'];
include 'includes/SESSION.php';
$Prenom = $_SESSION['Prenom'];
$Nom = $_SESSION['Nom'];
$Hash_mdp = $_SESSION['Hash_mdp'];
$Date_de_naissance = $_SESSION['Date_de_naissance'];
$Pays = $_SESSION['Pays'];
$Ville = $_SESSION['Ville'];
$Code_postal = $_SESSION['Code_postal'];
$Rue = $_SESSION['Rue'];
$Num_rue = $_SESSION['Num_rue'];
$Info_sup = $_SESSION['Info_sup'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Infos</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/infos.css">
</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <div class="container">
        <h1>Mes Infos</h1>
        <form action="php/modif_info.php" method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="Prenom" name="Prenom" value="<?php echo $Prenom?>" required>

            <label for="nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" value="<?php echo $Nom?>" required>

            <label for="naissance">Date de naissance :</label>
            <input type="date" id="naissance" name="naissance" value="<?php echo $Date_de_naissance?>" required>

            <label for="pays">Pays :</label>
            <input type="text" id="pays" name="pays" value="<?php echo $Pays?>" required>

            <label for="code_postal">Code postal :</label>
            <input type="number" id="code_postal" name="code_postal" value="<?php echo $Code_postal?>" required>

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" value="<?php echo $Ville?>" required>

            <label for="rue">Nom de rue :</label>
            <input type="text" id="rue" name="rue" value="<?php echo $Rue?>" required>

            <label for="num_rue">Numéro de rue :</label>
            <input type="number" id="num_rue" name="num_rue" value="<?php echo $Num_rue?>" required>

            <label for="info_sup">Info complémentaire :</label>
            <input type="text" id="info_sup" name="info_sup" value="<?php echo $Info_sup?>">

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" value="" >

            <label for="mdp_confirm">Confirmer le mot de passe :</label>
            <input type="password" id="mdp_confirm" name="mdp_confirm" value="" >

            <!--<label for="num-carte">Numéro de carte :</label>
            <input type="text" id="num-carte" name="num-carte" placeholder="XXXX-XXXX-XXXX-XXXX" required pattern="\d{4}-\d{4}-\d{4}-\d{4}" title="Le format doit être XXXX-XXXX-XXXX-XXXX">

            <label for="titulaire-carte">Titulaire de la carte :</label>
            <input type="text" id="titulaire-carte" name="titulaire-carte" placeholder="Nom complet" required>

            <label for="date-expiration">Date d'expiration :</label>
            <input type="month" id="date-expiration" name="date-expiration">

            <label for="cvv">CVV :</label>
            <input type="text" id="cvv" name="cvv" placeholder="XXX" required pattern="\d{3}" title="Le CVV doit comporter 3 chiffres">-->
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</main>

<?php
include "includes/footer.php"
?>

</body>
</html>
