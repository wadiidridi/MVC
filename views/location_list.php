<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Locations</title>
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
        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .delete-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
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
<a class="home-button" href="../views/acce.php">Retour</a>

    <h1>Liste des Locations</h1>
    <div class="container">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Durée par jour</th>
                    <th>Prix par jour</th>
                    <th>Prix Total</th>
                    <th>Créé le</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($locations as $location) : ?>
                <tr>
                    <td><?php echo $location['voiture_id']; ?></td>
                    <td><?php echo $location['date_debut']; ?></td>
                    <td><?php echo $location['date_fin']; ?></td>
                    <td>
                        <?php
                        $dateDebut = new DateTime($location['date_debut']);
                        $dateFin = new DateTime($location['date_fin']);
                        $duree = $dateDebut->diff($dateFin);
                        echo $duree->format('%d jours');
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $location['prix'];
                        ?>
                    </td>
                    <td>
                        <?php
                        $dailyPrice = $location['prix'];
                        $durationInDays = $duree->days;
                        $totalPrice = $dailyPrice * $durationInDays;
                        echo $totalPrice;
                        ?>
                    </td>
                    <td><?php echo $location['created_at']; ?></td>
                    <td>
                        <!-- Ajoutez ici des liens pour des actions comme la suppression -->
                        <!-- <a class="delete-button" href="index.php?action=deleteLocation&location_id=<?php echo $location['id']; ?>">Supprimer</a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
