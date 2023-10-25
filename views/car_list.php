<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

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

        /* table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: grey;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        /* Style pour le bouton d'ajout de voiture */
        .add-button {
            background-color: grey;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px auto;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #45a049;
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
        .action-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: grey;
        }

        .update-button {
            background-color: blue;
        }
        .image-circle {
    width: 70px;
    height: 70px;
    overflow: hidden;
    border-radius: 50%; /* Applique un rayon de bordure pour obtenir une forme circulaire */
}

.image-circle img {
    max-width: 100%;
    max-height: 100%;
    display: block;
}

    </style>
</head>
<body>
    
<button class="home-button" onclick="goBack()">Retour</button>

<script>
function goBack() {
  window.history.back();
}
</script>

    <h1>Liste des voitures</h1>    
    <?php if(unserialize($_COOKIE[('user')])['Role'] === 'admin') {
    echo "<a class=\"add-button\" href=\"../index.php?action=createCar\">Ajouter une voiture</a>";
} ?>



    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>image</th>
                <th>Description</th>
                <th>Prix</th>

                <!-- Ajoutez d'autres colonnes si nécessaire -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) : ?>
                <tr>
                    <td><?php echo $car['voiture_id']; ?></td>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td>
                        <div class="image-preview image-circle">
                            <?php if (!empty($car['image'])) : ?>
                                <img src="public/<?php echo $car['image']; ?>?<?php echo time(); ?>"
                                     alt="Image de profil" style="max-width: 70px; max-height: 70px;">
                            <?php else : ?>
                                <p>Aucune image</p>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td><?php echo $car['description']; ?></td>
                    <td><?php echo $car['prix']; ?></td>
                    <!-- Ajoutez d'autres colonnes ici -->
                  
                    <td>
                    <!-- <a class="action-button update-button" href="index.php?action=updateCar&car_id=' . $car['voiture_id'] . '">image</a>;
                    <a class="action-button delete-button" href="index.php?action=deleteCar&car_id=' . $car['voiture_id'] . '">Supprimer</a> -->
    <?php
    // Vérifiez le rôle de l'utilisateur actuellement connecté (vous devez avoir un moyen de stocker le rôle de l'utilisateur)
    if (isset($_SESSION['user']) && $_SESSION['user']['Role'] === 'admin') {
        // L'utilisateur est un administrateur, affichez les boutons
        echo '<a class="action-button delete-button" href="index.php?action=deleteCar&car_id=' . $car['voiture_id'] . '">Supprimer</a>';
        echo '<a class="action-button update-button" href="index.php?action=updateCar&car_id=' . $car['voiture_id'] . '">Modifier</a>';
    }
    ?>
</td>
                <!-- <td>   <a class="action-button update-button" href="index.php?action=createLocation&voiture_id=<?php echo $car['voiture_id']; ?>">Réserver</a> -->
</td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
