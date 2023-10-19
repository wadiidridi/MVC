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

        table {
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
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        /* Style pour le bouton d'ajout de voiture */
        .add-button {
            background-color: #4CAF50;
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
        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<a class="home-button" href="views/acce.php">Home</a>

    <h1>Liste des voitures</h1>
    <a class="add-button" href="../index.php?action=createCar">Ajouter une voiture</a>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Statut</th>
                <th>action</th>

                <!-- Ajoutez d'autres colonnes si nécessaire -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) : ?>
                <tr>
                    <td><?php echo $car['id']; ?></td>
                    <td><?php echo $car['marque']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['description']; ?></td>
                    <td><?php echo $car['prix']; ?></td>
                    <td><?php echo $car['statut']; ?></td>
                    <!-- Ajoutez d'autres colonnes ici -->
                    <td><a class="delete-button" href="index.php?action=deleteCar&car_id=<?php echo $car['id']; ?>">Supprimer</a>
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
