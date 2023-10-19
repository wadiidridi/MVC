<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            margin: 100px auto;
            max-width: 400px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur notre site</h1>
        <p>Que souhaitez-vous faire ?</p>
        <a href="index.php?action=login">Se connecter</a>
        <p>ou</p>
        <a href="index.php?action=createUser">S'inscrire</a>
    </div>
</body>
</html>
