<?php
require 'config/database.php'; // Inclure le fichier de configuration
require 'models/UserModel.php'; // Inclure le modèle

class UserController {
    private $model;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->model = new UserModel($this->conn); // Initialiser le modèle avec la connexion
    }


    public function login() {
        $error_message = ""; // Initialisation du message d'erreur vide
        $success_message = ""; // Initialisation du message de succès vide
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["mail"]) && isset($_POST["password"])) {
                $mail = $_POST["mail"];
                $password = $_POST["password"];
    
                $user = $this->model->getUserByEmail($mail);
      if ($user && password_verify($password, $user["password"])) {
                    $_SESSION['user_id'] = $user['id'];
                   setcookie('user',serialize($user),time()+'3600','/');
                    $success_message = "Connexion réussie !";
                    if ($user['Role'] == 'admin') {
                        // Redirigez l'administrateur vers la page d'accueil de l'admin
                    header("Location: views/acce.php");
                } else {
                        // Redirigez l'utilisateur normal vers la page d'accueil de l'utilisateur
                        header("Location: views/user_acceuil.php");
                    }
                    // header("Location: views/acce.php");
                //  header("Location: index.php?action=my_profile_read");

                    exit();
                } else {
                    
                    $error_message = "Adresse e-mail ou mot de passe incorrect.";
                }
            }
        }
    
        require 'views/login.php';
    }
    public function deleteUser($userId) {
        // Vérifiez ici si l'utilisateur actuel a les autorisations pour supprimer un utilisateur
    
        if ($this->model->deleteUser($userId)) {
            // Suppression réussie, redirigez vers la liste des utilisateurs
            header("Location: index.php?action=read");
            exit();
        } else {
            // Erreur lors de la suppression
            $errorMessage = "Erreur lors de la suppression de l'utilisateur.";
            echo $errorMessage;
            die($errorMessage);
        }
    }
    
    public function read() {
        // if (!isset($_SESSION['user_id'])) {
        //     header("Location: login.php");
        //     exit();
        // }
    
        // Vous pouvez appeler la méthode de votre modèle pour récupérer la liste des utilisateurs
        $userModel = new UserModel($this->conn);
        $users = $userModel->getUsers();
    
        require 'views/user_list.php'; 
        // require 'views/dashboard.php'; // Passer la liste des utilisateurs à la vue
        // Passer la liste des utilisateurs à la vue
    }  
    public function my_profile_read() {
    //      if (!isset($_SESSION['user_id'])) {
    //    header("Location: login.php");
    //     //     exit();
    //      }
    
        // Récupérez l'e-mail de l'utilisateur actuellement connecté depuis la session
     //   $userEmail = $_SESSION['user_email'];
    
        // Appelez la méthode du modèle pour récupérer l'utilisateur par e-mail
        require 'views/dashboard.php'; 
    }
    
    public function updateUser() {
        $successMessage = "";
        $errorMessage = "";
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
            $oldImage = isset($_POST['old_image']) ? $_POST['old_image'] : null;
    
            $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
    
            // Traitement de la nouvelle image
            $newImage = null;
            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $newImage = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], 'public/' . $newImage);
            }
    
            if ($userId && $name && $mail) {
                $userModel = new UserModel($this->conn);
                // Supprimez l'ancienne image s'il y en avait une
                if ($oldImage) {
                    unlink('public/' . $oldImage);
                }
                $success = $userModel->updateUser($userId, $name, $mail, $password, $newImage);
    
                if ($success) {
                    $successMessage = "Utilisateur mis à jour avec succès.";
                } else {
                    $errorMessage = "Erreur lors de la mise à jour de l'utilisateur.";
                }
            }
        }
    
        $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
        $userModel = new UserModel($this->conn);
        $user = $userModel->getUserById($userId);
    
        require 'views/update_user.php';
    }
    
    
    
    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["mail"]) && isset($_POST["password"])) {
                $name = $_POST["name"];
                $mail = $_POST["mail"];
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
                // Initialisez $image à null
                $image = null;
    
                // Vérifiez si un fichier image a été téléchargé
                if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                    $image = basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/' . $image);
                }
    
                $userModel = new UserModel($this->conn);
    
                if ($userModel->createUser($name, $mail, $password, $image)) {
                    header("Location: index.php?action=login");
                    exit();
                } else {
                    $errorMessage = "Erreur lors de la création de l'utilisateur : " . $this->conn->error;
                    echo $errorMessage;
                    die($errorMessage);
                }
            }
        } else {
            include 'views/create_user.php';
        }
    }
    

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        // Autres actions à effectuer sur le tableau de bord
        require 'views/dashboard.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>
