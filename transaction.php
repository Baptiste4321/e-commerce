<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Navbar</title>
    <link rel="stylesheet" href="css/transaction.css">
    <link rel="stylesheet" href="css/nav-bar.css">




</head>
<body>

<?php
include "includes/header.php"
?>

<main>
    <section id="infoclient">
        <div class="information">
            <div class="adress">
                <table class="test">
                    <td>
                        <tr>
                    <td> <p style="font-size: 2rem; padding: 1rem;">Livraison</p></td>
                    </tr>
                    <tr>
                        <td><p style="font-size: 1.1rem; margin-top: 20px; margin-left: 0.7rem;">Pays<span style="color: red;">*</span></p></td>
                    <tr>
                        <td  colspan="2"><select name="test" id="test" class="deroule">
                                <option>Afrique du Sud</option>
                                <option>Albanie</option>
                                <option>Algérie</option>
                            </select></td>

                    </tr>
                    </tr>
                    <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem; ">Nom <span style="color: red;">*</span></p></td>
                    <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem;">Prénom<span style="color: red;">*</span></p></td>
                    <tr>
                        <td> <input  class="unput gauche" type="text"></td>
                        <td> <input  class="unput" type="text"></td>
                    </tr>
                    <tr>
                        <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem;">Adress<span style="color: red;">*</span></p></td>


                    </tr>
                    <tr>
                        <td  colspan="2"> <input class="unput" type="text"></td>


                    </tr>
                    <tr>
                        <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem;">Ville<span style="color: red;">*</span></p></td>
                        <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem;">Code postal<span style="color: red;">*</span></p></td>
                    </tr>
                    <tr>
                        <td> <input class="unput gauche" type="text"></td>
                        <td> <input class="unput" type="text"></td>
                    </tr>
                    <tr>
                        <td> <p style="font-size: 1.1rem; margin-top: 0.7rem; margin-left: 0.7rem;">Numéro de téléphone<span style="color: red;">*</span></p></td>


                    </tr>
                    <tr>
                        <td  colspan="2"> <input class="unput " class="uninput" type="text"></td>


                    </tr>


                </table>
                <div class="pourcentrerleformulaire">
                    <table class="pour_telephone">
                        <tr>
                            <td><p style="font-size: 1.5rem; margin-bottom: 30px;">Livraison</p></td>
                        </tr>

                        <tr>
                            <td><select name="Pays" id="" placeholder="Pays">
                                    <option value="">France</option>

                                </select></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Nom*"></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Prénom"></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Adress*"></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Ville*"></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Code Postal*"></td>
                        </tr>

                        <tr>
                            <td><input class="unput" type="text" placeholder="Numéro de téléphone"></td>
                        </tr>

                    </table>
                </div>

            </div>
            <div id="paye">
                <div id="textpanier">

                    <table>
                        <td>
                            <tr ><p class="texte">prix sans livraison : </p></tr>
                        </td>
                        <td>
                            <tr><p class="texte">livraison : </p></tr>
                        </td>
                        <td>
                            <tr><p class="Total">Total :</p></tr>
                        </td>
                        <td>
                            <tr><a href="transaction.html" class="button-28" role="button">commander</a>
                            </tr>
                        </td>

                    </table>

                </div>

            </div>




    </section>


</main>

<?php
include "includes/footer.php"
?>

</body>
<script src="/javascript/nav-bar.js"></script>


</html>



