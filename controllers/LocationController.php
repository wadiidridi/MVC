<?php
require 'config/database.php'; // Inclure le fichier de configuration
require 'models/LocationModel.php'; // Inclure le modèle

class LocationController {
    private $model;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->model = new LocationModel($this->conn); // Initialiser le modèle avec la connexion
    }


//     public function login() {
//         $error_message = ""; // Initialisation du message d'erreur vide
//         $success_message = ""; // Initialisation du message de succès vide
    
//         if ($_SERVER["REQUEST_METHOD"] === "POST") {
//             if (isset($_POST["mail"]) && isset($_POST["password"])) {
//                 $mail = $_POST["mail"];
//                 $password = $_POST["password"];
    
//                 $user = $this->model->getUserByEmail($mail);
//       if ($user && password_verify($password, $user["password"])) {
//                     $_SESSION['user_id'] = $user['id'];
//                    setcookie('user',serialize($user),time()+'3600','/');
//                     $success_message = "Connexion réussie !";
//                     header("Location: views/acce.php");
//                 //  header("Location: index.php?action=my_profile_read");

//                     exit();
//                 } else {
                    
//                     $error_message = "Adresse e-mail ou mot de passe incorrect.";
//                 }
//             }
//         }
    
//         require 'views/login.php';
//     }
    public function deleteLocation($locationId) {
        // Vérifiez ici si l'utilisateur actuel a les autorisations pour supprimer un utilisateur
    
        if ($this->model->deleteLocation($locationId)) {
            // Suppression réussie, redirigez vers la liste des utilisateurs
            header("Location: index.php?action=readLocations");
            exit();
        } else {
            // Erreur lors de la suppression
            $errorMessage = "Erreur lors de la suppression de l'utilisateur.";
            echo $errorMessage;
            die($errorMessage);
        }
    }
    
public function readLocations() {
    $locationModel = new LocationModel($this->conn);
    $locations = $locationModel->getLocations();

    require 'views/location_list.php'; 
}

//     public function my_profile_read() {
//     //      if (!isset($_SESSION['user_id'])) {
//     //    header("Location: login.php");
//     //     //     exit();
//     //      }
    
//         // Récupérez l'e-mail de l'utilisateur actuellement connecté depuis la session
//      //   $userEmail = $_SESSION['user_email'];
    
//         // Appelez la méthode du modèle pour récupérer l'utilisateur par e-mail
//         require 'views/dashboard.php'; 
//     }
    
//     public function updateUser() {
//         $successMessage = "";
//         $errorMessage = "";
    
//         if ($_SERVER["REQUEST_METHOD"] === "POST") {
//             $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
//             $name = isset($_POST['name']) ? $_POST['name'] : null;
//             $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
//             $image = isset($_POST['image']) ? $_POST['image'] : null;

//             $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
    
//             // Traitement de l'image
//             $image = null;
//             if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
//                 $image = basename($_FILES['image']['name']);
//                 move_uploaded_file($_FILES['image']['tmp_name'], 'public/' . $image);
//             }
    
//             if ($userId && $name && $mail) {
//                 $userModel = new UserModel($this->conn);
//                 $success = $userModel->updateUser($userId, $name, $mail, $password, $image);
    
//                 if ($success) {
//                     $successMessage = "Utilisateur mis à jour avec succès.";
//                 } else {
//                     $errorMessage = "Erreur lors de la mise à jour de l'utilisateur.";
//                 }
//             }
//         }
    
//         $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
//         $userModel = new UserModel($this->conn);
//         $user = $userModel->getUserById($userId);
    
//         require 'views/update_user.php';
//     }
    
    
public function createLocation() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["voiture_id"]) && isset($_POST["personne_id"])) {
            $voiture_id = $_POST["voiture_id"];
            $personne_id = $_POST["personne_id"];
            $date_debut = $_POST["date_debut"];
            $date_fin = $_POST["date_fin"];

            // Vérifiez si un fichier image a été téléchargé
            // if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
            //     $image = $_FILES["image"]["name"]; // Nom du fichier
            //     $image_tmp = $_FILES["image"]["tmp_name"]; // Emplacement temporaire du fichier

            //     // Vérifiez si le fichier a été téléchargé avec succès
            //     if (is_uploaded_file($image_tmp)) {
            //         // Déplacez le fichier téléchargé vers l'emplacement souhaité
            //         move_uploaded_file($image_tmp, 'public/' . $image);
            //     } else {
            //         // Gérez les erreurs de téléchargement d'image
            //         echo "Erreur lors du téléchargement de l'image.";
            //         return; // Sortez de la méthode en cas d'erreur
            //     }
            // } else {
            //     $image = null; // Aucune image n'a été téléchargée
            // }

            $locationModel = new LocationModel($this->conn);

            if ($locationModel->createLocation($voiture_id, $personne_id ,$date_debut,$date_fin)) {
                header("Location: index.php?action=readLocations");
                exit();
            } else {
                $errorMessage = "Erreur lors de la création d'un location : " . $this->conn->error;
                echo $errorMessage;
                die($errorMessage);
            }
        }
    } else {
        include 'views/create_location.php';
    }
}

//     public function dashboard() {
//         if (!isset($_SESSION['user_id'])) {
//             header("Location: login.php");
//             exit();
//         }

//         // Autres actions à effectuer sur le tableau de bord
//         require 'views/dashboard.php';
//     }

//     public function logout() {
//         session_destroy();
//         header("Location: index.php?action=login");
//         exit();
//     }
}
?>
