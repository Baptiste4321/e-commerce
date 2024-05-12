<?php



     session_start();
     include 'php/login.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['Mail'])) {
        header('Location: connexion.php');
        exit();
    }

    $Mail = $_SESSION['Mail'];
    $Prenom = $_SESSION['Prenom'];



    $recupPid = "SELECT ID_panier FROM Panier WHERE Mail = '$Mail'";
    $stmt = $pdo->prepare($recupPid);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $panierid = $row["ID_panier"];

    
}


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouterproduit"])) {
        $ajoutproduit = $_POST["ajouterproduit"];
        $Taille = $_SESSION["Type"];

        echo $Taille;
        
        $quantite = $_POST["quantite"];

        echo $quantite;

        // Vérifier si le produit existe déjà dans le panier
        $check_product_query = "SELECT Quantite FROM produit_dans_panier WHERE ID_produit = :ajoutproduit AND Taille = :taille AND ID_panier = :panierid";
        $stmt = $pdo->prepare($check_product_query);
        $stmt->bindParam(':ajoutproduit', $ajoutproduit, PDO::PARAM_INT);
        $stmt->bindParam(':taille', $Taille, PDO::PARAM_STR); // Supposons que $taille contienne la taille à vérifier
        $stmt->bindParam(':panierid', $panierid, PDO::PARAM_INT);
        $stmt->execute();
        $existing_product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existing_product) {
            // Le produit existe déjà dans le panier, augmenter la quantité
            $update_quantity_query = "UPDATE produit_dans_panier SET Quantite = Quantite + :quantite WHERE ID_produit = :ajoutproduit AND ID_panier = :panierid AND Taille = :Taille";
            $stmt = $pdo->prepare($update_quantity_query);
            $stmt->bindParam(':ajoutproduit', $ajoutproduit, PDO::PARAM_INT);
            $stmt->bindParam(':panierid', $panierid, PDO::PARAM_INT);
            $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            $stmt->bindParam(':Taille', $Taille, PDO::PARAM_STR);

            $stmt->execute();
        } else {
            // Le produit n'existe pas dans le panier, l'ajouter avec une quantité de 1
            $insert_product_query = "INSERT INTO produit_dans_panier (ID_produit, ID_panier, Quantite, Taille) VALUES (:ajoutproduit, :panierid, :quantite, :Taille)";
            $stmt = $pdo->prepare($insert_product_query);
            $stmt->bindParam(':ajoutproduit', $ajoutproduit, PDO::PARAM_INT);
            $stmt->bindParam(':panierid', $panierid, PDO::PARAM_INT);
            $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            $stmt->bindParam(':Taille', $Taille, PDO::PARAM_STR);

            $stmt->execute();
        }
    
        header("Refresh: 2");
    }
    ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/description.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/carroussel.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>
<body>

<?php
include "includes/header.php"
?>

<?php
include('php/login.php');

// Vérification si l'ID du produit est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupération de l'ID du produit depuis l'URL
    $id_produit = $_GET['id'];

    // Requête pour récupérer les informations du produit depuis la base de données
    $query = "SELECT * FROM Produit WHERE ID_produit = :id_produit";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
    $stmt->execute();

    // Récupération des données du produit
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si le produit existe
    if($produit) {
        // Définition des informations du produit
        $nom_produit = $produit['Nom'];
        $prix_produit = $produit['Prix'];
        $caracteristiques = explode(',', $produit['Description']); // Si les caractéristiques sont stockées sous forme de chaîne séparée par des virgules

        // Définition du chemin de l'image
        $imagePath = "image/image/" . $id_produit . "/0.jpg";
    } else {
        // Redirection vers une page d'erreur si le produit n'existe pas
        header('Location: erreur.php');
        exit();
    }
} else {
    // Redirection vers une page d'erreur si l'ID du produit n'est pas fourni dans l'URL
    header('Location: erreur.php');
    exit();
}

  

 
   

?>






<main class="product-main">
    <div class="product-image carroussel" >
        <button id="av-carroussel" class="boutton-defilement material-symbols-rounded">chevron_left</button>
        <img id="add_img" src="<?php echo $imagePath; ?>" alt="<?php echo $nom_produit; ?>">
        <button id="ap-carroussel" class="boutton-defilement material-symbols-rounded">chevron_right</button>
    </div>
    <div class="product-details">
        <h1><?php echo $nom_produit; ?></h1>
        <p>Prix : $<?php echo $prix_produit; ?></p>
       


        <form action="#" method="post" id="monFormulaire"> 
        <label for="size">Taille :</label>
        <select id="monSelect" name="taille" >
            <option value="0" selected>Choisir</option>
        <?php
            
            $recupinfoproduit = "SELECT t.Taille
            FROM Produit p
            JOIN Taille_produit t ON p.ID_produit = t.ID_produit
            WHERE p.ID_produit =:id_produit;";
            $action = $pdo->prepare($recupinfoproduit);
            $action->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
            
            $action->execute();
            $taille = $action->fetchAll(PDO::FETCH_ASSOC);






            $nbrtaille = count($taille);

                for ($i = 0; $i < $nbrtaille ; $i++) {
                    echo "<option value=\"{$taille[$i]['Taille']}\">{$taille[$i]['Taille']}</option>";            }
                ?>
            
        </select>
        </form>
     


        <form action="#" method="post"> 
        
        <label for="size">Nombre :</label>
        
                
   
        <select id="quantite" name="quantite">
            

        <?php
       
       if ($_SERVER["REQUEST_METHOD"] =="POST" && isset($_POST["taille"])) {
           $Taille = $_POST["taille"];
           

           $id = $_GET['id'];

           
       
       
           $stockdispo = "SELECT t.Stock_disponible
           FROM Produit p
           JOIN Taille_produit t ON p.ID_produit = t.ID_produit
           WHERE p.ID_produit = :id_produit AND t.Taille = :Taille";
           $go = $pdo->prepare($stockdispo);
           $go->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);

           $go->bindParam(':Taille', $Taille, PDO::PARAM_STR);

          
       
           $go->execute();
           $qt = $go->fetch(PDO::FETCH_ASSOC);
       
           
           
           echo $qt["Stock_disponible"];
           echo var_dump($Taille);

           $_SESSION["Type"] = $Taille;
              

              
               
           }
           
           for ($i = 1; $i <= $qt["Stock_disponible"] ; $i++) {
               echo "<option value=\"$i\">$i</option>";            }
           ?>
            
        </select>
        <h2>Caractéristiques :</h2>
        <ul>
            <?php foreach($caracteristiques as $caracteristique) : ?>
                <li><?php echo $caracteristique; ?></li>
            <?php endforeach; ?>
        </ul>

                
            <button type="submit" name="ajouterproduit" value="<?php echo $_GET['id']; ?>">Ajouter au panier</button>
        </form>
       
    </div>
</main>

<?php
include "includes/footer.php"
?>

<script>
// Fonction pour sauvegarder l'état de l'option sélectionnée dans le stockage local
function sauvegarderEtatSelect() {
    var select = document.getElementById('monSelect');
    var selectedValue = select.value;
    localStorage.setItem('selectedValue', selectedValue);
    }

    // Fonction pour restaurer l'état de l'option sélectionnée depuis le stockage local
    function restaurerEtatSelect() {
    var selectedValue = localStorage.getItem('selectedValue');
    if (selectedValue) {
        var select = document.getElementById('monSelect');
        select.value = selectedValue;
    }
    }

    // Appel de la fonction pour restaurer l'état de l'option sélectionnée lorsque la page est chargée
    document.addEventListener('DOMContentLoaded', restaurerEtatSelect);

    // Ajout d'un écouteur d'événements pour sauvegarder l'état de l'option sélectionnée avant la soumission du formulaire
    document.getElementById('monSelect').addEventListener('change', sauvegarderEtatSelect);



    document.getElementById('monSelect').addEventListener('change', function() {
    document.getElementById('monFormulaire').submit();
    });
</script>

</body>
<script src="/javascript/nav-bar.js"></script>
<script src="/javascript/description.js"></script>
</html>


