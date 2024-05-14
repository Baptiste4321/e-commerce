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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<?php include "includes/header.php" ?>

<main>
    <div class="container">
        <h1>Session admin</h1>
        <div class="button-group">
            <a href="infos.php"><i class="fas fa-info"></i> Mes infos</a>
            <a href="article_en_vente.php"><i class="fas fa-barcode"></i> Mes articles</a>
        </div>
    </div>
</main>

<?php include "includes/footer.php" ?>
</body>
<script src="javascript/nav-bar.js"></script>
<script src="javascript/script1.js"></script>
<script src="javascript/recherche.js"></script>
<script src="javascript/carroussel.js" defer></script>
</html>