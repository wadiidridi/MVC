<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('views/voiture.png') no-repeat center center fixed;
            background-size: contain;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Couleur blanche semi-transparente */
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
        .success-message {
            color: #28a745;
            display: none;
            margin-top: 10px;
        }
        .error-message {
            color: #dc3545;
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <div class="success-message" id="success-message">Connexion réussie !</div>
        <div class="error-message" id="error-message">Adresse e-mail ou mot de passe incorrect.</div>
        <form method="post">
            <label for="mail">Adresse e-mail:</label>
            <input type="email" name="mail" value="" required>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" value="" required>
            <button type="submit">Se connecter</button>
            <br>        <a href="index.php?action=createUser">S'inscrire</a>
        </form>
    </div>
    <script>
        var successMessage = "<?php echo $success_message; ?>";
        var errorMessage = "<?php echo $error_message; ?>";

        if (errorMessage) {
            document.getElementById('error-message').style.display = 'block';
        } else if (successMessage) {
            document.getElementById('success-message').style.display = 'block';
        }
    </script>
</body>
</html>
