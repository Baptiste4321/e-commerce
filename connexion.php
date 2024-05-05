<?php
session_start();
include('php/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Mail = $_POST['Mail'];
    $Hash_mdp = $_POST['Hash_mdp'];

    // Vérifiez les informations d'identification dans la base de données
    $query = "SELECT * FROM Utilisateur WHERE Mail = :Mail AND Hash_mdp = :Hash_mdp";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Mail', $Mail, PDO::PARAM_STR);
    $stmt->bindParam(':Hash_mdp', $Hash_mdp, PDO::PARAM_STR);
    $stmt->execute();

    if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['Mail'] = $user['Mail'];
        header('Location: php/dashboard.php');
        exit();
    } else {
        $error_message = 'Identifiants incorrects';
    }
}
?>
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
        <img class="logo" src="assets/aigle2.png" >
    </a>
</header>
<body>
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3 colortitre"><span>Connexion</span><span>Créer compte</span></h6>
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                    <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Connexion</h4>
                                        <?php if (isset($error_message)) : ?>
                                            <p style="color: red;"><?php echo $error_message; ?></p>
                                        <?php endif; ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input id="Mail" type="email" class="form-style" placeholder="Email">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="Hash_mdp" type="password" class="form-style" placeholder="Mot de passe">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <a href="" type="submit" class="btn mt-4">Connecter</a>

                                        </form>
                                        <p class="mb-0 mt-4 text-center"><a href="index.php" class="link">mot de passe oublié?</a></p>
                                    </div>

                                </div>
                            </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-3 pb-3">Créer compte</h4>
                                        <?php if (isset($error_message)) : ?>
                                            <p style="color: red;"><?php echo $error_message; ?></p>
                                        <?php endif; ?>
                                        <form action="insertion.php" method="post">
                                            <div class="form-group">
                                                <input id="Prenom" type="text" class="form-style" placeholder="Prenom">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="Mail" type="email" class="form-style" placeholder="Email">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input id="Hash_mdp" type="password" class="form-style" placeholder="Mot de passe">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" class="form-style" placeholder="Entrer a nouveau">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <a href="" type="submit" class="btn mt-4">Enregistrer</a>
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
