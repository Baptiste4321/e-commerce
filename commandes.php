 



<?php
     session_start();
     include 'php/login.php';

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
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="css/carroussel.css">
    <link rel="stylesheet" href="css/commandes.css">




</head>
<body>

<?php
include "includes/header.php"
?>

<main>
<section class="fond"> 
    <?php 
        $Mail = $_SESSION['Mail'];

        $montrercommander = "SELECT F.*, CF.*, P.Nom AS Nom_produit, P.Prix AS Prix_produit
                            FROM Facture F
                            INNER JOIN Contenu_Facture CF ON F.ID_facture = CF.ID_facture
                            INNER JOIN Produit P ON CF.ID_produit = P.ID_produit
                            WHERE F.Mail = :Mail"; 

        $stmt = $pdo->prepare($montrercommander);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->execute();
    
        // Initialisation de la variable pour stocker la valeur de ID_facture précédente
        $previousID_facture = null;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Vérifier si la valeur de ID_facture a changé
            if ($previousID_facture !== $row["ID_facture"]) {
                // Afficher ID_facture seulement si c'est différent de la précédente
                echo "<hr style='width: 50%;'>";
                echo "Id de la facture : ".$row["ID_facture"];
                echo "<br>";
                echo "Prix total : ".$row["Prixtotal"]."€";
                echo "<br>";
                echo "<hr style='width: 50%;'>";
                
                // Mettre à jour la valeur de ID_facture précédente
                $previousID_facture = $row["ID_facture"];
            }
            
            if (isset($row["ID_produit"])) {
                $imagePath = "image/image/" . $row["ID_produit"] . ".jpg";
    ?>

            <!-- Article -->
            
            <div class="liste_article">
                <div class="article">
                    <div class="image">
                        <img src="<?php echo $imagePath; ?>" class="dans_le_block_noir" alt="">
                    </div>
                    <div class="info_article">
                        <table class="table">
                            <tr class="td_descritpion">
                                <td>Prix : <?php echo $row["Prix_produit"]?></td>
                                
                                
                            </tr>
                            <tr class="td_descritpion">
                                <td>produit : <?php echo $row["Nom_produit"]?></td>
                                
                                
                            </tr>
                            <tr class="td_descritpion">
                                <td>Taille : <?php echo $row["Taille"]?></td>
                                
                                
                            </tr>
                            <tr>
                                <td>Quantité : x<?php echo $row["Quantité"]?></td>

                            </tr>
                               
                
                        </table>
                    </div>
                </div>
            </div>
    <?php 
            }
        }
    ?>

</section>

</main>







            
        




<?php
include "includes/footer.php"
?>

</body>
<script src="javascript/nav-bar.js"></script>
<script src="javascript/carroussel.js"></script>

</html>









<!-- 
