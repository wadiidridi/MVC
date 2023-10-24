<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de voiture</title>
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

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
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
        <h1>Mise à jour de la voiture</h1>

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
        <!-- <img class="profile-image" src="../public/<?php echo unserialize($_COOKIE['user'])['image']; ?>" alt="Image de profil"  style="max-width: 70px; max-height: 70px;"> -->

            <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
            
            <label for="marque">Marque :</label>
            <input type="text" id="marque" name="marque" value="<?php echo $car['marque']; ?>">
            
            <label for="model">Modèle :</label>
            <input type="text" id="model" name="model" value="<?php echo $car['model']; ?>">
            
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="<?php echo $car['prix']; ?>">
            
            <p id="image-name">Aucune image sélectionnée</p>
            <input type="file" id="image" name="image" accept="image/*">
            <label class="upload-button" for="image"><span class="upload-icon">+</span>Changer l'image de la voiture</label>

            <div class="image-preview">
                <?php if (!empty($car['image'])) : ?>
                    <img src="public/<?php echo $car['image']; ?>?<?php echo time(); ?>" alt="Image de la voiture" >
                <?php else : ?>
                    <p>Aucune image</p>
                <?php endif; ?>
            </div>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>
