<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/carroussel.css">
    <!--<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <div class="container">
        <h1>Nous Contacter</h1>
        <form action="votre-script.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Votre email" required>

            <label for="sujet">Sujet :</label>
            <input type="text" id="sujet" name="sujet" placeholder="Sujet de votre message" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" placeholder="Votre message" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</main>

<?php
include "includes/header.php"
?>

</body>
<script src="javascript/nav-bar.js" ></script>
<script src="javascript/script1.js" ></script>
<script src="javascript/recherche.js" ></script>
<script src="javascript/carroussel.js" defer></script>
</html>
