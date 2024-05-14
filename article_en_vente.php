<?php
session_start();
include 'php/login.php';

if (!isset($_SESSION['Mail'])) {
    header('Location: connexion.php');
    exit();
}

$Mail = $_SESSION['Mail'];
$Prenom = $_SESSION['Prenom'];

// Vérifie si l'utilisateur est admin
if ($_SESSION['Type_utilisateur'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_produit"])) {
    $id_produit = $_POST["supprimer_produit"];

    $produit_dans_panier_query = "DELETE FROM Taille_produit WHERE ID_produit = :id_produit;
                                  DELETE FROM Produit WHERE ID_produit = :id_produit;";

    $stmt = $pdo->prepare($produit_dans_panier_query);
    $stmt->bindParam(':id_produit', $id_produit);
    $stmt->execute();
    header('Location: article_en_vente.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique Admin</title>
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="css/utilisateur.css">
</head>
<body>

<?php
include "includes/header.php";
?>

<main>
    <section id="content-hist">
        <div id="liste-hist">
            <div id="text-hist">
                <p style="font-size: 2.3rem;">Vos articles</p>
                <hr>
            </div>

            <p id="Séléction"></p>

            <?php
            $produits_admin_query = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE Mail = :Mail";

            $stmt = $pdo->prepare($produits_admin_query);
            $stmt->bindParam(':Mail', $Mail);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imagePath = "image/image/" . $row["ID_produit"] . "/0.jpg";
                ?>

                <!-- Affichage des produits ajoutés par l'admin -->
                <div class="liste_article">
                    <div class="article">
                        <div class="image">
                            <img src="<?php echo $imagePath; ?>" class="dans_le_block_noir" alt="">

                        </div>
                        <div class="info_article">
                            <table class="table">
                                <tr class="td_descritpion">
                                    <td><?php echo $row["Nom"]; ?></td>
                                    <td><?php echo $row["Prix"]; ?>€</td>
                                </tr>
                                <tr class="td_descritpion">
                                    <td class="sous_texte"><?php echo $row["Description"]; ?></td>
                                </tr>
                                <tr class="td_descritpion">
                                    <td>
                                        <!-- Formulaire pour supprimer un produit -->
                                        <form action="#" method="post">
                                            <input type="hidden" value="<?php echo $row["ID_produit"]; ?>" name="supprimer_produit">
                                            <button type="submit"><img src="assets/icon/delete.png" alt=""></button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </section>
    <div class="container-button-hist">
        <a href="ajouter.php" class="button-hist">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 20 20"><path fill="black" d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2zm-1 11a10 10 0 1 1 0-20a10 10 0 0 1 0 20m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16"/></svg>
        </a>
    </div>
</main>

<?php
include "includes/footer.php";
?>
<script src="javascript/nav-bar.js"></script>
<script src="javascript/carroussel.js"></script>

</body>
</html>
