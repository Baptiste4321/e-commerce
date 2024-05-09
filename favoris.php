       
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/favoris.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/carroussel.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">





</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <section id="contenu">
        <div id="liste">
            <div id="textpanier1">
                <p style="font-size: 2.3rem;">Mes favoris</p>



            </div>
            <hr>
            <p id="Séléction"></p>

            <!--Première article-->
            <div class="liste_article">
                <div class="article">
                    <div class="image">
                        <img src="image/image/9.jpg" class="dans_le_block_noir" alt="">


                    </div>
                    <div class="info_article">
                        <table class="table">
                            <tr class="td_descritpion">
                                <td >t-shirt blanc</td>
                                <td >100€</td>
                            </tr>
                            <tr class="td_descritpion">
                                <td class="sous_texte"><p>blanc</p></td>

                            </tr>


                            <tr class="td_descritpion">
                                <td>


                                </td>
                            </tr>
                            <tr class="td_descritpion">
                                <td class="td_descritpion"><a href=""><img src="assets/icon/delete.png" alt=""></a>
                                    <a href=""><img src="assets/icon/coeur sur toi.png" alt=""></a>
                                </td>

                            </tr>

                        </table>

                    </div>



                </div>


            </div>
            <!--ddeuxième article-->

            <div class="liste_article">
                <div class="article">
                    <div class="image">
                        <img src="image/image/9.jpg" class="dans_le_block_noir" alt="">


                    </div>
                    <div class="info_article">
                        <table class="table">
                            <tr class="td_descritpion">
                                <td >t-shirt blanc</td>
                                <td >100€</td>
                            </tr>
                            <tr class="td_descritpion">
                                <td class="sous_texte"><p>blanc</p></td>

                            </tr>


                            <tr class="td_descritpion">
                                <td>


                                </td>
                            </tr>
                            <tr class="td_descritpion">
                                <td class="td_descritpion"><a href=""><img src="assets/icon/delete.png" alt=""></a>
                                    <a href=""><img src="assets/icon/coeur sur toi.png" alt=""></a></td>

                            </tr>

                        </table>

                    </div>



                </div>


            </div>


            <div class="test">

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


