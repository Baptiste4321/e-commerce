<?php session_start(); ?>
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
</head>
<body>

<?php
include "includes/header.php"
?>


<main>
    <section id="banderole">
        <div id="block-image">

            <img class="slideimage fade mySlides" src="image/image/0/1.jpg" alt="">
            <img class="slideimage fade mySlides" src="image/image/0/2.jpg" alt="">
            <img class="slideimage fade mySlides" src="image/image/0/3.jpg" alt="">
        </div>
        <div id="Slogan">
            Style et confort, à portée de clic avec StoreHack !
            <br>
        </div>
        <div id="lien"></div>
    </section>
    <section id="versionmobile"> <!-- cette section est pour la version mobile-->
        <div id="contenu_dessous_image">
            <div id="Slogantel">
                Style et confort, à portée de clic avec StoreHack !
            </div>
            <div id="lientel">
                <a class="deslienstel" href="">promotion</a>
                <a class="deslienstel" href="">Homme</a>
                <a class="deslienstel" href="">Femme</a>
                <a class="deslienstel" href="">Nouveaux</a>
            </div>
        </div>
    </section>
    <!--  <section class="product">
         <img src="product1.jpg" alt="Produit 1">
         <h2>Nom du Produit 1</h2>
         <p>Description du Produit 1</p>
         <span class="price"><del>29.99€</del> <ins>40.89€</ins></span>
         <button>Ajouter au Panier</button>
     </section>

     <section class="product">
         <img src="product2.jpg" alt="Produit 2">
         <h2>Nom du Produit 2</h2>
         <p>Description du Produit 2</p>
         <span class="price">19.99€</span>
         <button>Ajouter au Panier</button>
     </section> -->


    <!-- Ajouter plus de sections pour plus de produits -->
    <section id="LePlusAcheté">
        <h2>Le plus acheté</h2>
        <br>
        <div class='carroussel'>
            <button id="av-carroussel" class="boutton-defilement material-symbols-rounded">chevron_left</button>
            <?php
            // Inclure le fichier login.php pour établir la connexion à la base de données
            include 'php/login.php';

            // Récupérer le mot de recherche depuis l'URL
            $mot_recherche = 'femme';

            // Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
            $sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE sexe LIKE :mot_recherche OR Description LIKE :mot_recherche LIMIT 10";

            // Préparer la requête SQL
            $stmt = $pdo->prepare($sql);

            // Lié le paramètre de recherche
            $mot_recherche_param = "%$mot_recherche%";
            $stmt->bindParam(':mot_recherche', $mot_recherche_param, PDO::PARAM_STR);

            // Exécuter la requête
            $stmt->execute();

            // Récupérer les résultats de la requête
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class='liste-img'>

                <?php
                // Boucle PHP pour générer les éléments du carrousel
                foreach ($resultats as $produit) {
                    $redirection= "description.php?id=" . $produit['ID_produit'];
                    if($produit['ID_produit'] == 1){
                        $redirection= "personnaliser.php?id=" . $produit['ID_produit'];
                    }
                    $i = $produit['ID_produit'];
                    echo '<button class="element-carroussel">';
                    echo '<div class="img-element-carroussel">';
                    echo "<a href='$redirection'><img class='img_carrousell' src='image/image/$i/0.jpg' alt='Image $i'></a>";
                    echo '</div>';
                    echo '<div class="text-element-carroussel">';
                    echo '<a  href='. $redirection .'>' . $produit['Nom'] . '</a>';
                    echo '<p>Prix : €' . number_format($produit['Prix'], 2) . '</p>';
                    echo '</div>';
                    echo '</button>';
                }
                ?>
            </div>
            <button id="ap-carroussel" class="boutton-defilement material-symbols-rounded">chevron_right</button>
            <div class="scrollbar-carroussel">
                <div class="scrollbar-container">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="PourVous">
        <h2>Pour vous</h2>
        <br>
        <div class='carroussel'>
            <button id="av-carroussel" class="boutton-defilement material-symbols-rounded">chevron_left</button>
            <?php
            // Inclure le fichier login.php pour établir la connexion à la base de données
            include 'php/login.php';

            // Récupérer le mot de recherche depuis l'URL
            $mot_recherche = 'homme';

            // Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
            $sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE sexe LIKE :mot_recherche OR Description LIKE :mot_recherche LIMIT 10";

            // Préparer la requête SQL
            $stmt = $pdo->prepare($sql);

            // Lié le paramètre de recherche
            $mot_recherche_param = "%$mot_recherche%";
            $stmt->bindParam(':mot_recherche', $mot_recherche_param, PDO::PARAM_STR);

            // Exécuter la requête
            $stmt->execute();

            // Récupérer les résultats de la requête
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class='liste-img'>

                <?php
                // Boucle PHP pour générer les éléments du carrousel
                foreach ($resultats as $produit) {
                    $redirection= "description.php?id=" . $produit['ID_produit'];
                    if($produit['ID_produit'] == 1){
                        $redirection= "personnaliser.php?id=" . $produit['ID_produit'];
                    }
                    $i = $produit['ID_produit'];
                    echo '<button class="element-carroussel">';
                    echo '<div class="img-element-carroussel">';
                    echo "<a href='$redirection'><img class='img_carrousell' src='image/image/$i/0.jpg' alt='Image $i'></a>";
                    echo '</div>';
                    echo '<div class="text-element-carroussel">';
                    echo '<a  href='. $redirection .'>' . $produit['Nom'] . '</a>';
                    echo '<p>Prix : €' . number_format($produit['Prix'], 2) . '</p>';
                    echo '</div>';
                    echo '</button>';
                }
                ?>
            </div>
            <button id="ap-carroussel" class="boutton-defilement material-symbols-rounded">chevron_right</button>
            <div class="scrollbar-carroussel">
                <div class="scrollbar-container">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
    </section>
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
