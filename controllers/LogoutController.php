<?php
// Initialisation de la session
session_start();

// Détruire la session (déconnexion de l'utilisateur)
session_destroy();

// Rediriger l'utilisateur vers une page d'accueil ou une autre page de votre choix
header("Location: login.php"); // Remplacez "index.php" par l'URL de redirection souhaitée
exit();
