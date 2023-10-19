<?php
// Démarrez la session si ce n'est pas déjà fait
session_start();

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
} else {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: login.php"); // Remplacez 'login.php' par le chemin de votre page de connexion
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
    <!-- Vous pouvez ajouter des styles CSS ici si nécessaire -->
    <style></style>
</head>
<body>
<img class="profile-image" src="public/<?php echo unserialize($_COOKIE['user'])['image']; ?>" alt="Image de profil" width="150">

    <h1>Mon Profil</h1>
    <p>Adresse e-mail : <?php echo $user_email; ?></p>

    <!-- Ajoutez d'autres informations de profil ici si nécessaire -->

    <a href="logout.php">Déconnexion</a> <!-- Ajoutez un lien de déconnexion vers votre page de déconnexion -->
</body>
</html>
