<!doctype html>
<html lang="en">
<head>
    <title>Webleb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<header>
    <a href="index.php">
        <img class="logo" src="assets/logo_aigle.png" >
    </a>
</header>
<body>
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3 colortitre"><span>Connexion</span><span>Créer compte</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" <?php echo isset($_GET['reg-log']) ? 'checked' : ''; ?>>

                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Connexion</h4>
                                        <?php
                                        // Récupérer le message d'erreur depuis l'URL s'il existe
                                        $error_message = isset($_GET['error_message']) ? $_GET['error_message'] : '';

                                        // Afficher le message d'erreur s'il existe
                                        if (!empty($error_message)) {
                                            echo '<p style="color: red;">' . $error_message . '</p>';
                                        }
                                        ?>
                                        <form method="post" action="php/connecter.php">
                                            <div class="form-group">
                                                <input id="Mail" type="email" name="Mail" class="form-style" placeholder="Email"> <!-- Ajout de l'attribut name -->
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="mdp" type="password" name="mdp" class="form-style" placeholder="Mot de passe"> <!-- Ajout de l'attribut name -->
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">Connecter</button>
                                        </form>

                                        <p class="mb-0 mt-4 text-center"><a href="index.php" class="link">mot de passe oublié?</a></p>
                                    </div>

                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-3 pb-3">Créer compte</h4>
                                        <?php
                                        // Récupérer le message d'erreur depuis l'URL s'il existe
                                        $error_message = isset($_GET['error_message2']) ? $_GET['error_message2'] : '';

                                        // Afficher le message d'erreur s'il existe
                                        if (!empty($error_message)) {
                                            echo '<p style="color: red;">' . $error_message . '</p>';
                                        }
                                        ?>
                                        <form method="post" action="php/enregistrer.php">
                                            <div class="form-group">
                                                <input id="Prenom" name="Prenom" type="text" class="form-style" placeholder="Prenom">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="Mail" name="Mail" type="email" class="form-style" placeholder="Email">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="mot_de_passe" name="mot_de_passe" type="password" class="form-style" placeholder="Mot de passe">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="mdp_confirm" name="mdp_confirm" type="password" class="form-style" placeholder="Entrer a nouveau">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" class="btn mt-4">Enregistrer</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
