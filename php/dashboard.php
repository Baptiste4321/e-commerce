<?php
session_start();
include('login.php');


if (!isset($_SESSION['user_id'])) {
    header('Location: ../utilisateur.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];





// Récupération de la liste des utilisateurs depuis la base de données
$query_users = "SELECT id, username FROM users";
$stmt_users = $pdo->query($query_users);
$users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome, <?php echo $username; ?>!</h2>
<p>This is your dashboard. You are logged in.</p>


<!-- Ajout du select avec la liste des utilisateurs -->
<label>
    <i>Choisir un utilisateur existant (optionnel)</i>
</label>
<select name="existing_user">
    <option value="">-- Choisir un utilisateur --</option>
    <?php foreach ($users as $user) : ?>
        <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
    <?php endforeach; ?>
</select>





<!-- Tableau HTML pour afficher les utilisateurs -->
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom d'Utilisateur</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>





<a href="logout.php">Logout</a>
</body>
</html>
