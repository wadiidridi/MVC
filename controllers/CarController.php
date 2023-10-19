<?php
require 'config/database.php'; // Inclure le fichier de configuration
require 'models/CarModel.php'; // Inclure le modèle

class CarController {
    private $model;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->model = new CarModel($this->conn); // Initialiser le modèle avec la connexion
    }


    // public function login() {
    //     $error_message = ""; // Initialisation du message d'erreur vide
    //     $success_message = ""; // Initialisation du message de succès vide
    
    //     if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //         if (isset($_POST["mail"]) && isset($_POST["password"])) {
    //             $mail = $_POST["mail"];
    //             $password = $_POST["password"];
    
    //             $user = $this->model->getUserByEmail($mail);
    //   if ($user && password_verify($password, $user["password"])) {
    //                 $_SESSION['user_id'] = $user['id'];
    //                setcookie('user',serialize($user),time()+'3600','/');
    //                 $success_message = "Connexion réussie !";
    //                 header("Location: views/acce.php");
    //             //  header("Location: index.php?action=my_profile_read");

    //                 exit();
    //             } else {
                    
    //                 $error_message = "Adresse e-mail ou mot de passe incorrect.";
    //             }
    //         }
    //     }
    
    //     require 'views/login.php';
    // }
    public function deleteCar($carId) {
        // Vérifiez ici si l'utilisateur actuel a les autorisations pour supprimer un utilisateur
    
        if ($this->model->deleteCar($carId)) {
            // Suppression réussie, redirigez vers la liste des utilisateurs
            header("Location: index.php?action=readcars");
            exit();
        } else {
            // Erreur lors de la suppression
            $errorMessage = "Erreur lors de la suppression de voiture.";
            echo $errorMessage;
            die($errorMessage);
        }
    }
    
    public function readcars() {
        // if (!isset($_SESSION['user_id'])) {
        //     header("Location: login.php");
        //     exit();
        // }
    
        // Vous pouvez appeler la méthode de votre modèle pour récupérer la liste des utilisateurs
        $carModel = new CarModel($this->conn);
        $cars = $carModel->getCars();
    
        require 'views/car_list.php'; 
        // require 'views/dashboard.php'; // Passer la liste des utilisateurs à la vue
        // Passer la liste des utilisateurs à la vue
    }  
    // public function my_profile_read() {
    // //      if (!isset($_SESSION['user_id'])) {
    // //    header("Location: login.php");
    // //     //     exit();
    // //      }
    
    //     // Récupérez l'e-mail de l'utilisateur actuellement connecté depuis la session
    //  //   $userEmail = $_SESSION['user_email'];
    
    //     // Appelez la méthode du modèle pour récupérer l'utilisateur par e-mail
    //     require 'views/dashboard.php'; 
    // }
    
    // public function updateUser() {
    //     $successMessage = "";
    //     $errorMessage = "";
    
    //     if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //         $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    //         $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
    
    //         if ($userId && $mail) {
    //             $userModel = new UserModel($this->conn);
    //             $success = $userModel->updateUser($userId, $mail); // Mettez à jour l'utilisateur ici
    
    //             if ($success) {

    //                 header("Location: ../index.php?action=read");
    //                 exit(); // Assurez-vous de quitter le script après la redirection

    //                 // $successMessage = "Utilisateur mis à jour avec succès.";
    //             } else {
    //                 $errorMessage = "Erreur lors de la mise à jour de l'utilisateur.";
    //             }
    //         }
    //     }
    //     // header("loacation : ../index.php?action=read");

    //     $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    //     $userModel = new UserModel($this->conn);
    //     $user = $userModel->getUserById($userId);
    
    //     require 'views/update_user.php';
    // }
    
    
    
 // Partie de votre code dans la méthode createCar
public function createCar() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["marque"]) && isset($_POST["model"])) {
            $marque = $_POST["marque"];
            $model = $_POST["model"];
            $description = $_POST["description"];
            $prix = $_POST["prix"];

            // Vérifiez si un fichier image a été téléchargé
            if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
                $image = $_FILES["image"]["name"]; // Nom du fichier
                $image_tmp = $_FILES["image"]["tmp_name"]; // Emplacement temporaire du fichier

                // Vérifiez si le fichier a été téléchargé avec succès
                if (is_uploaded_file($image_tmp)) {
                    // Déplacez le fichier téléchargé vers l'emplacement souhaité
                    move_uploaded_file($image_tmp, 'public/' . $image);
                } else {
                    // Gérez les erreurs de téléchargement d'image
                    echo "Erreur lors du téléchargement de l'image.";
                    return; // Sortez de la méthode en cas d'erreur
                }
            } else {
                $image = null; // Aucune image n'a été téléchargée
            }

            $carModel = new CarModel($this->conn);

            if ($carModel->createCar($marque, $model, $description, $prix, $image)) {
                header("Location: index.php?action=readcars");
                exit();
            } else {
                $errorMessage = "Erreur lors de la création d'un voiture : " . $this->conn->error;
                echo $errorMessage;
                die($errorMessage);
            }
        }
    } else {
        include 'views/create_car.php';
    }
}

// Votre code pour la gestion du téléchargement d'image continue ici...


    

    // public function dashboard() {
    //     if (!isset($_SESSION['user_id'])) {
    //         header("Location: login.php");
    //         exit();
    //     }

    //     // Autres actions à effectuer sur le tableau de bord
    //     require 'views/dashboard.php';
    // }

    // public function logout() {
    //     session_destroy();
    //     header("Location: index.php?action=login");
    //     exit();
    // }
}
?>
