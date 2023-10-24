<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer une Location</title>
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

        input[type="text"] {
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
    <h1>Créer une Location</h1>
    <div class="container">
        <form method="POST" action="index.php?action=createLocation">
        <!-- <p>name : <?php echo unserialize($_COOKIE['user'])['id']; ?></p> -->

            <label for="voiture_id">ID de la personne :</label>

            <input type="text"  name="personne_id" id="personne_id" value="<?php echo unserialize($_COOKIE['user'])['id']; ?>" required>

            <label for="voiture_id">ID de la voiture :</label>
          
          <?php
           $voiture_id = null;

           if (isset($_GET['voiture_id'])) {
           $voiture_id = $_GET['voiture_id'];
}
?>

<input type="text"  name="voiture_id" id="voiture_id" required value="<?php echo $voiture_id; ?>">

<label for="date_debut date debut"></label>
<input type="date" name="date_debut" id="date_debut" >
            <!-- Ajoutez d'autres champs pour d'autres informations liées à la location si nécessaire -->

            <button type="submit">Créer</button>
        </form>
    </div>
</body>
</html>
