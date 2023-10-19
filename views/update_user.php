<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de l'utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
        }
        .upload-icon {
            font-size: 24px;
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
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <input type="file" id="image" name="image">
        <label class="upload-button" for="image"><span class="upload-icon">+</span>Changer l'image de profil</label>
      
      
        <div class="image-preview">
    <?php if (!empty($user['image'])) : ?>
        <img src="public/<?php echo $user['image']; ?>?<?php echo time(); ?>" alt="Image de profil">
    <?php else : ?>
        <p>Aucune image</p>
    <?php endif; ?>
</div>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>">
        <label for="mail">Adresse e-mail :</label>
        <input type="email" id="mail" name="mail" value="<?php echo $user['mail']; ?>">
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" id="password" name="password">
        
        <!-- Add an image input -->
        
        
        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
