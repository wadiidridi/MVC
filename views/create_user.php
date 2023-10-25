<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un utilisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('views/voiture.png') no-repeat center center fixed; /* Remplacez 'votre-image.jpg' par le chemin de votre image de fond */
            background-size: contain;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .container input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .container button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .container button:hover {
            background-color: #0056b3;
        }
        .success {
            color: #28a745;
            display: none;
            margin-top: 10px;
        }
        .error {
            color: #dc3545;
            display: none;
            margin-top: 10px;
        }
        .container {
    background-color: rgba(255, 255, 255, 0.7); /* Couleur blanche semi-transparente */
    /* ... Autres styles ... */
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Créer un utilisateur</h1>

        <div class="success" id="success-alert">Création réussie !</div>
        <div class="error" id="error-alert">Erreur de création !</div>
        <form method="post" action="index.php?action=createUser" enctype="multipart/form-data">
    <input type="hidden" name="action" value="createUser">
    <label for="name">Name:</label>
    <input type="name" name="name" required>
    <br>
    <label for="mail">Adresse e-mail:</label>
    <input type="email" name="mail" required>
    <br>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>
    <br>
    <label for="image">Image:</label>
<input type="file" name="image" accept="image/*">

    <br>
    <button type="submit">Créer l'utilisateur</button><br><a href="index.php?action=login">Connect</a>
</form>

    </div>

    <script>
        // JavaScript pour afficher les alertes
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success') === 'true') {
            document.getElementById('success-alert').style.display = 'block';
        } else if (urlParams.get('success') === 'false') {
            document.getElementById('error-alert').style.display = 'block';
        }
    </script>
</body>
</html>
