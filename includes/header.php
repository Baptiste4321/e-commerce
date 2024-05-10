<header>
    <nav class="navbar">
        <!--<a href="#" class="logo"><img src="/assets/aigle.png" id="logo"></a>-->
        <a href="index.php" class="logo"><img src="assets/aigle2.png" id="logo" alt=""></a>
        <div class="nav-links">
            <ul class="standard-ul ma-liste">
                <li class="deroulant nav-li marge-li"><a href="#" id="cat">Catégories</a>
                    <div class="menu-deroulant">
                        <ul>
                            <li>
                                <a href="recherche.php?mot_recherche=<?= urlencode('homme') ?>">Homme</a>
                                <div class="menu-deroulant-1">
                                    <ul>
                                        <li><a href="recherche.php?mot_recherche=<?= urlencode('homme pantalon') ?>">Pantalons</a></li>
                                        <li><a href="recherche.php?mot_recherche=<?= urlencode('homme t-shirt') ?>">T-shirts</a></li>
                                        <li><a href="recherche.php?mot_recherche=<?= urlencode('homme chaussure') ?>">Chaussures</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="recherche.php?mot_recherche=<?= urlencode('femme') ?>">Femme</a>
                                <div class="menu-deroulant-1">
                                    <ul>
                                        <li><a href="#">Pantalons</a></li>
                                        <li><a href="#">T-shirts</a></li>
                                        <li><a href="#">Chaussures</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">Enfant</a>
                                <div class="menu-deroulant-1">
                                    <ul>
                                        <li><a href="#">Pantalons</a></li>
                                        <li><a href="#">T-shirts</a></li>
                                        <li><a href="#">Chaussures</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="form">
                    <button id="submitButton">
                        <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-labelledby="search">
                            <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9" stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <input class="input" id="textInput" placeholder="rechercher un produit" required="" type="text">
                    <button class="reset" id="resetButton" type="reset">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </li>
                <?php if (isset($_SESSION['Mail']))
                {
                    if ($_SESSION['Type_utilisateur'] === "admin")
                    {
                        echo "
                        <li class=\"nav-li marge-li \"><a href=\"panier.php\"><img class='icone' src=\"assets/icon/panier.png\" id=\"panier\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"favoris.php\"><img class='icone' src=\"assets/icon/coeur.png\" id=\"coeur\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"admin.php\"><img class='icone' src=\"assets/icon/user.png\" id=\"user\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"php/logout.php\"><img class='icone' src=\"assets/icon/logout.png\" id=\"user\" alt=\"\"></a></li>
                        "
                    ;}
                    elseif ($_SESSION['Type_utilisateur'] === "client")
                    {
                        echo "
                        <li class=\"nav-li marge-li \"><a href=\"panier.php\"><img class='icone' src=\"assets/icon/panier.png\" id=\"panier\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"favoris.php\"><img class='icone' src=\"assets/icon/coeur.png\" id=\"coeur\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"utilisateur.php\"><img class='icone' src=\"assets/icon/user.png\" id=\"user\" alt=\"\"></a></li>
                        <li class=\"nav-li marge-li \"><a href=\"php/logout.php\"><img class='icone' src=\"assets/icon/logout.png\" id=\"user\" alt=\"\"></a></li>
                        "
                    ;}
                }
                else echo "
                <li class=\"nav-li marge-li \"><a href=\"connexion.php\"><img class='icone' src=\"assets/icon/user.png\" id=\"user\" alt=\"\"></a></li>
                ";?>
    

<?php
/*
    <li class="nav-li marge-li "><a href="panier.php"><img class='icone' src="assets/icon/panier.png" id="panier" alt=""></a></li>
                <li class="nav-li marge-li "><a href="favoris.php"><img class='icone' src="assets/icon/coeur.png" id="coeur" alt=""></a></li>
                <li class="nav-li marge-li "><a href="
                <?php if (isset($_SESSION['Mail']))
                {echo "utilisateur.php";}
                else echo "connexion.php";?>
    "><img class='icone' src="assets/icon/user.png" id="user" alt=""></a></li>
*/
?>
                
            </ul>
        </div>
        <img src="assets/icon/burger-bar.png" alt="menu barre" class="menu-barre">
    </nav>
</header>