<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
    <style>
        /* Styles CSS pour personnaliser la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 400px;
            text-align: center;
            margin: 0 auto;
            margin-top: 20px;
        }
        .profile-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: block;
        }
        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        a {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>    
</head>
<body>
<form method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <input type="file" id="image" name="image">
        <label class="upload-button" for="image"><span class="upload-icon">+</span>Changer l'image de profil</label>
      
      
        <div class="image-preview">
    <div class="container">
        <h1>Profil de l'Utilisateur</h1>

        <img class="profile-image" src="../public/<?php echo unserialize($_COOKIE['user'])['image']; ?>" alt="Image de profil">
        <p>Adresse e-mail : <?php echo unserialize($_COOKIE['user'])['mail']; ?></p>
        <p>name : <?php echo unserialize($_COOKIE['user'])['name']; ?></p>

        <a href="../index.php?action=read">Voir les utilisateurs</a>
        <a href="logout.php">Déconnexion</a>
    </div>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
    <!-- Autres éléments du tableau de bord -->
</body>
</html>
