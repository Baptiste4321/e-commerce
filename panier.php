       
<?php
     session_start();
     include 'php/login.php';

    if (!isset($_SESSION['Mail'])) {
        header('Location: connexion.php');
        exit();
    }

    $Mail = $_SESSION['Mail'];
    $Prenom = $_SESSION['Prenom'];

    //echo $Prenom;


?>
 


 
 
 <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $byeproduit = $_POST["suprtache"];
    echo $byeproduit;

    $produit_dans_panier_query = "DELETE FROM `produit_dans_panier` WHERE `ID_produit_dans_panier`=:byeproduit"; 

    $stmt = $pdo->prepare($produit_dans_panier_query);
    $stmt->bindParam(':byeproduit', $byeproduit);
    $stmt->execute();
    header('Location: panier.php');
    exit();


}




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




</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <section id="contenu">
        <div id="liste">
            <div id="textpanier1">
                <p style="font-size: 2.3rem;">Panier</p>
                <br>
                <label for="checkbox1">

                    <input type="checkbox" id="checkbox1" name="checkbox1">
                    <label id="taille_pour_téléphone_car_trop_grand" for="checkbox1">Sélectionner Tous Les articles</label>
                </label>

            </div>
            <hr>
            <p id="Séléction"></p>

  
            <?php 
   

    

    $produit_dans_panier_query = "SELECT p.Nom, p.Prix, pdp.Quantite, p.ID_produit, pdp.ID_produit_dans_panier, pa.ID_panier,p.Description 
    FROM Produit 
    p JOIN Produit_dans_panier pdp 
    ON p.ID_produit = pdp.ID_produit 
    JOIN Panier pa ON pdp.ID_panier = pa.ID_panier 
    JOIN Utilisateur u ON pa.Mail = u.Mail 
    WHERE u.Mail = :Mail"; 

    $stmt = $pdo->prepare($produit_dans_panier_query);
    $stmt->bindParam(':Mail', $Mail);
    $stmt->execute();
    $totalPrix = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $imagePath = "image/image/" . $row["ID_produit"] . ".jpg";
       

        
       

        $totalPrix += $row["Prix"];

        

        ?>            
        <!-- Première article -->
        <div class="liste_article">
                    <div class="article">
                        <div class="image">
                            <img src="<?php echo $imagePath; ?>" class="dans_le_block_noir" alt="">

                        </div>
                        <div class="info_article">
                            <table class="table">
                                <tr class="td_descritpion">
                                    <td ><?php echo $row["Nom"]; ?></td>
                                    <td ><?php echo $row["Prix"]; ?>€</td>
                                </tr>
                                <tr class="td_descritpion">
                                    <td class="sous_texte"><p><?php echo $row["Description"]; ?></p></td>

                                </tr>

                                <tr class="td_descritpion">
                                    <td class="sous_texte">
                                        <label for="taille">Taille :</label>

                                        <select name="" id="taille">
                                            <option value="">XS</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>


                                        </select>
                                        <label for="quantite">Quantité : </label>
                                        <select name="" id="quantite">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>


                                        </select>

                                    </td>
                                </tr>
                                <tr class="td_descritpion">
                                    <td>


                                    </td>
                                </tr>
                                <tr class="td_descritpion">
                                    <td class="td_descritpion">
                                        <form action="#" method="post">
                                            <input type="hidden" value="<?php echo $row["ID_produit_dans_panier"]; ?>" name="suprtache">
                                            <button type="submit"><img src="assets/icon/delete.png" alt=""></button>
                                            <a href=""><img src="assets/icon/coeur sur toi.png" alt=""></a></td>
                                        </form>
                                       
                                    <td>                    
                                        <input type="checkbox" id="checkbox1" name="checkbox1">
                                    </td>
                                </tr>

                            </table>

                        </div>



                    </div>


                </div>
        <!-- fin du premier article -->

        
<?php }
$_SESSION["totalPrix"] = $totalPrix;

?>




            <div class="test">

            </div>
        </div>
        <div id="payement">
            <div id="textpanier">

                <table>
                    <td>
                        <tr ><p class="texte">prix sans livraison : <?php echo $_SESSION["totalPrix"]; ?></p></tr>
                    </td>
                    <td>
                        <tr><p class="texte">livraison : <?php echo $_SESSION["totalPrix"]; ?></p></tr>
                    </td>
                    <td>
                        <tr><p class="Total">Total : <?php echo $_SESSION["totalPrix"]; ?></p></tr>
                    </td>
                    <td>
                        <tr><a href="transaction.html" class="button-28" role="button">commander</a>
                        </tr>
                    </td>

                </table>

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
            $mot_recherche = 'un';

            // Préparer la requête SQL pour récupérer les produits correspondant au mot de recherche
            $sql = "SELECT ID_produit, Nom, Description, Prix FROM Produit WHERE sexe LIKE :mot_recherche OR Description LIKE :mot_recherche";

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
                    echo "<a href='$redirection'><img class='img_carrousell' src='image/image/$i.jpg' alt='Image $i'></a>";
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
<script src="javascript/nav-bar.js"></script>
<script src="javascript/carroussel.js"></script>
<script src="javascript/recherche.js" ></script>

</html>


