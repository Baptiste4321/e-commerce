<?php
session_start();
include('php/login.php');


if (!isset($_SESSION['Mail'])) {
    header('Location: connexion.php');
    exit();
}

$Mail = $_SESSION['Mail'];
$Prenom = $_SESSION['Prenom'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/carroussel.css">
    <!--<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/utilisateur.css">
</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <div class="container">
        <h1>Bonjour <?php echo $Prenom?>,</h1>
        <br><br><br><br><br><br>
        <div class="button-group">
            <a href="panier.php"><i class="fas fa-shopping-cart"></i> Mon Panier</a>
            <a href="favoris.php"><i class="fas fa-heart"></i> Mes Favoris</a>
            <a href="commandes.php"><i class="fas fa-box"></i> Mes Commandes</a>
            <a href="infos.php"><i class="fas fa-info"></i> Mes infos</a>
            <a href="historique_article.php"><i class="fas fa-barcode"></i> Ajouter des articles</a>
            <a href="contact.php"><i class="fas fa-envelope"></i> Nous Contacter</a>
            <a href="php/sup_compte.php"><i class="fas fa-remove"></i> Supprimer son compte</a>
        </div>
        <br><br><br><br><br><br><br>
    </div>
</main>

<?php
include "includes/footer.php"
?>

</body>
<script src="javascript/nav-bar.js" ></script>
<script src="javascript/script1.js" ></script>
<script src="javascript/recherche.js" ></script>
<script src="javascript/carroussel.js" defer></script>
</html>
