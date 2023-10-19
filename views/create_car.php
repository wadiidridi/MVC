<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer une voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Créer une voiture</h1>
    <div class="container">
        <form method="POST" action="index.php?action=createCar" enctype="multipart/form-data">
            <label for="marque">Marque :</label>
            <input type="text" name="marque" id="marque" required>

            <label for="model">Modèle :</label>
            <input type="text" name="model" id="model" required>
            <label for="description">description :</label>
            <input type="text" name="description" id="description" required>
            <label for="prix">prix :</label>
            <input type="text" name="prix" id="prix" required>
            <label for="image">Image:</label>
            <input type="file" name="image">

            <!-- Ajoutez d'autres champs pour les informations de la voiture -->

            <button type="submit">Créer</button>
        </form>
    </div>
</body>
</html>
