<?php session_start(); ?>
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
        <form action="script.php" method="post">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="Billel" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="Mezaour" required>

            <label for="naissance">Date de naissance :</label>
            <input type="date" id="naissance" name="naissance" value="" required>

            <label for="pays">Pays :</label>
            <input type="text" id="pays" name="pays" value="France" required>

            <label for="numero_rue">Numéro de rue :</label>
            <input type="number" id="numero_rue" name="numero_rue" value="12" required>

            <label for="adresse">Nom de rue :</label>
            <input type="text" id="adresse" name="adresse" value="Rue d'E-commerce" required>

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" value="Paris" required>

            <label for="code_postal">Code postal :</label>
            <input type="number" id="code_postal" name="code_postal" value="75012" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="billel.mezaour@gmail.com" required>

            <label for="num-carte">Numéro de carte :</label>
            <input type="text" id="num-carte" name="num-carte" placeholder="XXXX-XXXX-XXXX-XXXX" required pattern="\d{4}-\d{4}-\d{4}-\d{4}" title="Le format doit être XXXX-XXXX-XXXX-XXXX">

            <label for="titulaire-carte">Titulaire de la carte :</label>
            <input type="text" id="titulaire-carte" name="titulaire-carte" placeholder="Nom complet" required>

            <label for="date-expiration">Date d'expiration :</label>
            <input type="month" id="date-expiration" name="date-expiration">

            <label for="cvv">CVV :</label>
            <input type="text" id="cvv" name="cvv" placeholder="XXX" required pattern="\d{3}" title="Le CVV doit comporter 3 chiffres">

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</main>

<?php
include "includes/footer.php"
?>

</body>
</html>
