<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            color: #fff;
            overflow-x: hidden;
        }

        .sidebar a {
            padding: 20px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #007BFF;
        }

        .content {
            margin-left: 250px;
            padding: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Ajout de la marge pour afficher le tableau correctement */
        }

        table, th, td {
            border: 1px solid black;
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

        .update-button {
            background-color: blue;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Style pour le bouton de retour à la page d'accueil */
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
<div class="sidebar">
    <a href="../views/dashboard.php">Profil</a>
    <a href="../index.php?action=read">users</a>
    <a href="../index.php?action=readcars">Cars</a>
    <a href="../index.php?action=createCar">new Cars</a>
    <a href="../index.php?action=logout">Déconnexion</a>
</div>
<div class="content">
    <!-- <a class="home-button" href="views/acce.php">Home</a> -->
    <h1>Liste des utilisateurs</h1>
    <br><br><br><br><br>
    <?php if (isset($users) && is_array($users)) : ?>
        <table id="myTable" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse e-mail</th>
                <th>Date</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['mail']; ?></td>
                    <td><?php echo $user['date']; ?></td>
                    <td>
                    

                        <button class="delete-button" data-user-id="<?php echo $user['id']; ?>">Supprimer</button>
                    </td>
                    <td>
                        <button class="update-button" data-user-id="<?php echo $user['id']; ?>">Modifier</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>
</div>
<script>
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userId = button.getAttribute('data-user-id');
            window.location.href = `index.php?action=deleteUser&user_id=${userId}`;
        });
    });
</script>
<script>
    const updateButtons = document.querySelectorAll('.update-button');

    updateButtons.forEach(button => {
        button.addEventListener('click', () => {
            const userId = button.getAttribute('data-user-id');
            window.location.href = `index.php?action=updateUser&user_id=${userId}`;
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
