
<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    // Appel de la fonction de déconnexion
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
