<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/ajouter.css">
</head>

<body>

<?php
include "includes/header.php"
?>

<main>
    <div class="container">
        <h1>Ajouter un article</h1>
        <form action="php/ajout.php" method="post" enctype="multipart/form-data">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom de l'article" required>

            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" placeholder="Prix de l'article" required min="0" step="0.01">

            <label for="stock">Stock :</label>
            <input type="number" id="stock" name="stock" placeholder="Quantité en stock" required min="0">

            <label for="description">Description :</label>
            <textarea id="description" name="description" placeholder="Description de l'article" required></textarea>

            <label for="tarif-livraison">Tarif de livraison :</label>
            <input type="number" id="tarif-livraison" name="tarif-livraison" placeholder="Tarif de livraison" required min="0" step="0.01">

            <label for="image">Image :</label>
            <input type="file" id="image" name="image[]" accept="image/*" multiple required>

            <button type="submit">Ajouter l'article</button>
        </form>
    </div>
</main>

<?php
include "includes/footer.php"
?>

</body>

</html>
