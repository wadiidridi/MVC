<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de l'utilisateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #dff0d8;
            border: 1px solid #3c763d;
            color: #3c763d;
        }
        .alert-danger {
            background-color: #f2dede;
            border: 1px solid #a94442;
            color: #a94442;
        }
        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="file"] {
            display: none; /* Hide the file input */
        }
        .upload-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .upload-icon {
            font-size: 20px;
            margin-right: 10px;
        }
        .image-preview {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 0 auto;
        }
        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }
        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .home-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<a class="home-button" href="views/acce.php">Home</a>

<div class="container">
    <h1>Mise à jour de l'utilisateur</h1>

    <?php if (!empty($successMessage)) : ?>
        <div class="alert alert-success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <!-- <?php echo unserialize($_COOKIE['user'])['image']; ?> -->
    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
    <input type="hidden" name="old_image" value="<?php echo unserialize($_COOKIE['user'])['image']; ?>>">
    <p id="image-name">Aucune image sélectionnée</p>
    <input type="file" id="image" name="image" accept="image/*">
    <label class="upload-button" for="image"><span class="upload-icon">+</span>Changer l'image de profil</label>
    <div class="image-preview">
        <img src="public/<?php echo unserialize($_COOKIE['user'])['image']; ?>" alt="Image de profil">
    </div>
    <label for="name">Nom :
    <input type="text" id="name" name="name" placeholder="<?php echo unserialize($_COOKIE['user'])['name']; ?>" >
    <label for="mail">Adresse e-mail :</label>
    <input type="email" id="mail" name="mail" placeholder="<?php echo unserialize($_COOKIE['user'])['mail']; ?>">
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password">
    <button type="submit">Enregistrer</button>
</form>

<script>
    // Sélectionnez l'élément d'entrée de type fichier par son ID
    const imageInput = document.getElementById('image');
    // Sélectionnez l'élément <p> pour afficher le nom du fichier
    const imageNameParagraph = document.getElementById('image-name');

    // Écoutez l'événement "change" sur l'élément d'entrée de type fichier
    imageInput.addEventListener('change', function () {
        // Vérifiez s'il y a un fichier sélectionné
        if (imageInput.files && imageInput.files[0]) {
            // Mettez à jour le texte de l'élément <p> avec le nom du fichier
            imageNameParagraph.textContent = 'Nom du fichier : ' + imageInput.files[0].name;
        } else {
            // Si aucun fichier n'est sélectionné, affichez "Aucune image sélectionnée"
            imageNameParagraph.textContent = 'Aucune image sélectionnée';
        }
    });
</script>
</body>
</html>
