 



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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commander"])) {
    $date = date("Y-m-d"); 
    echo $date. "<br>";
    $Mail = $_SESSION['Mail'];
    echo $Mail. "<br>";
    $PrixTotal = $_SESSION["totalPrix"];
    echo $PrixTotal. "<br>";


    
    $commande = "  INSERT INTO facture (Mail, Date_facturation, Prixtotal) VALUES (:Mail, :Date, :Prixtotal)"; 

    $stmt = $pdo->prepare($commande);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->bindParam(':Date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':Prixtotal', $PrixTotal, PDO::PARAM_INT);

    $stmt->execute();



    $contenu_fac = "SELECT LAST_INSERT_ID() AS last_id";
    $go = $pdo->prepare($contenu_fac);
    $go->execute();
    $resultat = $go->fetch(PDO::FETCH_ASSOC);
    $IDfac = $resultat['last_id'];
    echo $IDfac."REPOND FDP";





    $ajoutfactureproduit = "SELECT ID_produit, Taille, Quantite  FROM Produit_dans_panier"; 

   $action = $pdo->prepare($ajoutfactureproduit);
   
   $action->execute();
  

   while ($listeP = $action->fetch(PDO::FETCH_ASSOC)) {
        echo $listeP['ID_produit'] ."<br>";
        echo $listeP['Taille']."<br>";
        echo $listeP['Quantite']."<br>";

        $remplir = "INSERT INTO contenu_facture (ID_facture, ID_produit, Taille, Quantité) VALUES (:ID_facture, :ID_produit, :Taille, :Quantite)"; 

        $action2 = $pdo->prepare($remplir); // Utilisation d'une nouvelle variable pour la deuxième préparation de requête
        $action2->bindParam(':ID_facture', $IDfac, PDO::PARAM_INT);
        $action2->bindParam(':ID_produit', $listeP['ID_produit'], PDO::PARAM_INT);
        $action2->bindParam(':Taille', $listeP['Taille'], PDO::PARAM_STR);
        $action2->bindParam(':Quantite', $listeP['Quantite'], PDO::PARAM_INT);
        $action2->execute();


   }



   $vider = "DELETE FROM produit_dans_panier;"; 

   $action3 = $pdo->prepare($vider); // Utilisation d'une nouvelle variable pour la deuxième préparation de requête
 
   $action3->execute();



    


    header('Location: panier.php');








    exit(); 


    
}

?>


 
 
 <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["suprtache"])) {

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
   

    

   $produit_dans_panier_query = "SELECT p.Nom, p.Prix, pdp.Quantite, p.ID_produit, pdp.ID_produit_dans_panier, pa.ID_panier,p.Description,pdp.Taille
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
 
       
      

       $totalPrix += $row["Prix"]*$row["Quantite"];

       

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
                                            <option value="<?php   echo $row["Taille"]; ?>" selected><?php   echo $row["Taille"]; ?></option>

                                            <option value="">XS</option>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                            <option value="">XXL</option>


                                        </select>
                                        <label for="quantite">Quantité : </label>
                                        <select name="" id="quantite">
                                            <option value="<?php   echo $row["Quantite"]; ?>" selected><?php   echo $row["Quantite"]; ?></option>

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
<!--                         <tr><a href="transaction.html" class="button-28" role="button">commander</a>   -->
                            <form action="#" method="post"> 
                                <td><button class="button-28" type="submit" name="commander" value="1">commander</button></td>
                            </form>

                        </tr>
                    </td>

                </table>

            </div>

        </div>




    </section>
    <section id="LePlusAcheté">
        <h2>Le plus acheté</h2>
        <br>
        <div class='carroussel'>
            <button id="av-carroussel" class="boutton-defilement material-symbols-rounded">chevron_left</button>
            <div class='liste-img'>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/1.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/12.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/15.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/16.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/19.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/7.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/8.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/9.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/10.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
                <button class='element-carroussel'>
                    <div class="img-element-carroussel">
                        <img class='img_carrousell' src="image/image/11.jpg" alt="">
                    </div>
                    <div class="text-element-carroussel">
                        <p><b>Description produit</b></p>
                        <p>Prix : 39,97$</p>
                    </div>
                </button>
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

</html>


