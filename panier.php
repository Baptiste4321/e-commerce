 



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
        $Mail = $_SESSION['Mail'];
        $PrixTotal = $_SESSION["totalPrixaveclivr"];
        $nbrproduit = " SELECT COUNT(*) AS nombre_de_lignes
                        FROM Produit_dans_panier pdp
                        JOIN Panier p ON pdp.ID_panier = p.ID_panier
                        JOIN Utilisateur u ON p.Mail = u.Mail
                        WHERE u.Mail = :Mail"; 

        $action4 = $pdo->prepare($nbrproduit);
        $action4->bindParam(':Mail', $Mail, PDO::PARAM_STR);
        
        

        $action4->execute();

        $resu_nbr_produit = $action4->fetch(PDO::FETCH_ASSOC);
        





  $siutili_remplie_lieu = " SELECT COUNT(*) AS Nombre_de_lignes_remplies
                    FROM Utilisateur
                    WHERE Mail = :Mail
                        AND Pays IS NOT NULL 
                        AND Code_postal IS NOT NULL 
                        AND Ville IS NOT NULL 
                        AND Rue IS NOT NULL 
                        AND Num_rue IS NOT NULL 
                        AND Info_sup IS NOT NULL;
                    "; 

$action5 = $pdo->prepare($siutili_remplie_lieu);
$action5->bindParam(':Mail', $Mail, PDO::PARAM_STR);
$action5->execute();

$valeurlieu = $action5->fetch(PDO::FETCH_ASSOC);

    if ($valeurlieu["Nombre_de_lignes_remplies"] != 1) {

        ?>
            <script>
                alert("Veuillez remplir vos info svp");
            </script>
            

        <?php
                    header('Location: infos.php');

    }


    



 
     if ($resu_nbr_produit["nombre_de_lignes"] > 0) {
            
        
    
        

        
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


                $moinsdeproduit = "UPDATE Taille_produit
                SET Stock_disponible = Stock_disponible - :quantite
                WHERE ID_produit = :ID_produit;"; 

                $action7 = $pdo->prepare($moinsdeproduit);
                $action7->bindParam(':quantite', $listeP['Quantite'], PDO::PARAM_INT);
                $action7->bindParam(':ID_produit', $listeP['ID_produit'], PDO::PARAM_INT);
                $action7->execute();


        }



        $vider = "DELETE FROM produit_dans_panier;"; 

        $action3 = $pdo->prepare($vider); // Utilisation d'une nouvelle variable pour la deuxième préparation de requête
        
        $action3->execute();


           


            


        
        
        
        header('Location: panier.php');








            exit(); 


        
    }
    else{
        ?>
        <script>
            // Code JavaScript pour afficher une alerte
            alert("Vous avez aucun produit séléctionner");
        </script>
            

        <?php 
     

    }
 
} 

?>


 
 
 <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["suprtache"])) {

    $byeproduit = $_POST["suprtache"];

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

       $imagePath = "image/image/" . $row["ID_produit"] . "/0.jpg";
    
       
      

       $totalPrix += $row["Prix"]*$row["Quantite"];

       

       ?>            
        <!-- Première article -->
        <div class="liste_article">
                    <div class="article">
                        <div class="image">
                        <a href="description.php?id=<?php echo $row['ID_produit'];?>"><img src="<?php echo $imagePath; ?>" class="dans_le_block_noir" alt=""></a>

                        </div>
                        <div class="info_article">
                            <table class="table">
                                <tr class="td_descritpion">
                                    <td ><?php echo $row["Nom"]; ?></td>
                                    <td ><?php echo $row["Prix"]; ?>€</td>
                                </tr>
                                <!-- <tr class="td_descritpion">
                                    <td class="sous_texte"><p><?php echo $row["Description"]; ?></p></td>

                                </tr> -->

                                <tr class="td_descritpion">
                                    <td class="sous_texte">
                                        <label for="taille">Taille : <?php echo $row["Taille"]?></label>

                                        <label for="taille">Quantité : <?php echo $row["Quantite"]?></label>

                                        <!-- <form action="#" method="post" id="monFormulaire"> 

                                        
                                        <select id="monSelect" name="taille" >
                                                    <option value="<?php echo $row["Taille"]?>" selected><?php echo $row["Taille"]?></option>
                                                <?php
                                                    
                                                    $recupinfoproduit = "SELECT t.Taille
                                                                        FROM Produit p
                                                                        JOIN Taille_produit t ON p.ID_produit = t.ID_produit
                                                                        WHERE p.ID_produit =:id_produit;";
                                                    $action = $pdo->prepare($recupinfoproduit);
                                                    $action->bindParam(':id_produit', $row["ID_produit"], PDO::PARAM_INT);
                                                    
                                                    $action->execute();
                                                    $taille = $action->fetchAll(PDO::FETCH_ASSOC);






                                                    $nbrtaille = count($taille);

                                                        for ($i = 0; $i < $nbrtaille ; $i++) {
                                                            echo "<option value=\"{$taille[$i]['Taille']}\">{$taille[$i]['Taille']}</option>";            }
                                                        ?>
                                                    
                                                </select> -->
                                               <!--  </form>
                                   
                                                <select id="quantite" name="quantite">
                                                <option value="<?php echo $row["Quantite"]?>" selected><?php echo $row["Quantite"]?></option>

            

                                                        <?php
                                                    
                                                    if ($_SERVER["REQUEST_METHOD"] =="POST" && isset($_POST["taille"])) {
                                                        $Taille = $_POST["taille"];
                                                        
                                                
                                                       
                                                
                                                        
                                                    
                                                    
                                                        $stockdispo = "SELECT t.Stock_disponible
                                                        FROM Produit p
                                                        JOIN Taille_produit t ON p.ID_produit = t.ID_produit
                                                        WHERE p.ID_produit = :id_produit AND t.Taille = :Taille";
                                                        $go = $pdo->prepare($stockdispo);
                                                        $go->bindParam(':id_produit', $row["ID_produit"], PDO::PARAM_INT);
                                                
                                                        $go->bindParam(':Taille', $Taille, PDO::PARAM_STR);
                                                
                                                        
                                                    
                                                        $go->execute();
                                                        $qt = $go->fetch(PDO::FETCH_ASSOC);
                                                    
                                                        
                                                        
                                                        echo $qt["Stock_disponible"];
                                                        
                                                
                                                        $_SESSION["Type"] = $Taille;
                                                            
                                                
                                                            
                                                            
                                                        }
                                                        
                                                        for ($i = 1; $i <= $qt["Stock_disponible"] ; $i++) {
                                                            echo "<option value=\"$i\">$i</option>";            }
                                                        ?>
                                                            
                                                        </select> -->

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
                                            <button class="boutonsupr"  type="submit"><img src="assets/icon/delete.png" alt=""></button>
                                            </td>
                                        </form>
                                       
                                   
                                </tr>

                            </table>

                        </div>



                    </div>


                </div>
        <!-- fin du premier article -->

        
<?php }


$_SESSION["totalPrix"] = $totalPrix;
        if ($totalPrix<100) {
            $Livraison = 3.99;
            $totalPrixaveclivr = $Livraison+$totalPrix;
        }
        else{
            $Livraison = 0;
            $totalPrixaveclivr = $totalPrix;
        }

        $_SESSION["totalPrixaveclivr"] = $totalPrixaveclivr;
        $_SESSION["livraison"] = $Livraison;
?>




            <div class="test">

            </div>
        </div>
        <div id="payement">
            <div id="textpanier">

                <table>
                    <td>
                        <tr ><p class="texte">prix sans livraison : <?php echo $_SESSION["totalPrix"]."€"; ?> </p></tr>
                    </td>
                    <td>
                        <tr><p class="texte">livraison : <?php echo $_SESSION["livraison"]."€"; ?> </p></tr>
                    </td>
                    <td>
                        <tr><p class="Total">Total : <?php echo $_SESSION["totalPrixaveclivr"]."€"; ?></p></tr>
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
            <?php
            // Inclure le fichier login.php pour établir la connexion à la base de données
            include 'php/login.php';

            // Récupérer le mot de recherche depuis l'URL
            $mot_recherche = 'femme';

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
<script>
function sauvegarderEtatSelect() {
    var select = document.getElementById('monSelect');
    var selectedValue = select.value;
    localStorage.setItem('selectedValue', selectedValue);
    }

    function restaurerEtatSelect() {
    var selectedValue = localStorage.getItem('selectedValue');
    if (selectedValue) {
        var select = document.getElementById('monSelect');
        select.value = selectedValue;
    }
    }

    document.addEventListener('DOMContentLoaded', restaurerEtatSelect);

    document.getElementById('monSelect').addEventListener('change', sauvegarderEtatSelect);



    document.getElementById('monSelect').addEventListener('change', function() {
    document.getElementById('monFormulaire').submit();
    });
</script>











</body>
<script src="javascript/nav-bar.js"></script>
<script src="javascript/carroussel.js"></script>

</html>


