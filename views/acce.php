<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            overflow-x: hidden;
        }
        .sidebar a {
            padding: 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #007BFF;
        }
        .content {
            margin-left: 250px;
            padding: 16px;
        }
    </style>
</head>
<body>   
<div class="sidebar">
    <a href="../index.php?action=updateUser">Profil</a>
    <a href="../index.php?action=read">users</a>
    <a href="../index.php?action=readcars">Cars</a>
    <a href="../index.php?action=readLocations">Location</a>
    <a href="../index.php?action=createLocation">new Location</a>
    <a href="../index.php?action=createCar">new Cars</a>
    <!-- <button class="action-button update-button" data-user-id="<?php echo $user['id']; ?>">Modifier</button> -->
    <a href="../index.php?action=logout">Déconnexion</a>
    <!-- ... Autres éléments de votre tableau de bord ... -->
</div>

    <div class="content">
        <!-- Contenu de la page d'accueil -->
    </div>
</body>
</html>
