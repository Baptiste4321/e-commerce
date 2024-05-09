<?php session_start(); ?>
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





</head>
<body>

<?php
include "includes/header.php"
?>


<main>
    <section id="contenu">
        <div id="liste">
            <div id="textpanier1">
                <p style="font-size: 2.3rem;">Mes commandes</p>
                <br>
                <label for="checkbox1">

                    <input type="checkbox" id="checkbox1" name="checkbox1">
                    <label id="taille_pour_téléphone_car_trop_grand" for="checkbox1">Sélectionner Tous Les articles</label>
                </label>

            </div>
            <hr>
            <p id="Séléction"></p>

            <!--Première article-->
            <div class="liste_article">
                <div class="article">
                    <div class="image">


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
                                <td class="td_descritpion"><a href=""><img src="assets/icon/delete.png" alt=""></a>
                                    <a href=""><img src="assets/icon/coeur sur toi.png" alt=""></a>
                                </td>
                                <td>                    <input type="checkbox" id="checkbox1" name="checkbox1">
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
                                <td class="td_descritpion"><a href=""><img src="assets/icon/delete.png" alt=""></a>
                                    <a href=""><img src="assets/icon/coeur sur toi.png" alt=""></a></td>
                                <td>                    <input type="checkbox" id="checkbox1" name="checkbox1">
                                </td>
                            </tr>

                        </table>

                    </div>



                </div>


            </div>


            <div class="test">

            </div>
        </div>



    </section>
    <section id="pub">


    </section>
</main>

<?php
include "includes/footer.php"
?>
</body>

<script src="/javascript/nav-bar.js"></script>


</html>


