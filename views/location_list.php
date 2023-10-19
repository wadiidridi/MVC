<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des Locations</title>
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
    </style>
</head>
<body>
    <h1>Liste des Locations</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voiture ID</th>
                    <th>Personne ID</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Créé le</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($locations as $location) : ?>
                    <tr>
                        <td><?php echo $location['id']; ?></td>
                        <td><?php echo $location['voiture_id']; ?></td>
                        <td><?php echo $location['personne_id']; ?></td>
                        <td><?php echo $location['date_debut']; ?></td>
                        <td><?php echo $location['date_fin']; ?></td>
                        <td><?php echo $location['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
