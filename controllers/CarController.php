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
    
// CarController.php

// CarController.php

public function updateCar() {
    $successMessage = "";
    $errorMessage = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $carId = isset($_POST['car_id']) ? $_POST['car_id'] : null;
        $marque = isset($_POST['marque']) ? $_POST['marque'] : null;
        $model = isset($_POST['model']) ? $_POST['model'] : null;
        $prix = isset($_POST['prix']) ? $_POST['prix'] : null;

        if ($carId && $marque && $model && $prix) {
            $carModel = new CarModel($this->conn);

            // Gérez également la mise à jour de l'image ici
            if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
                $image = $_FILES["image"]["name"];
                $image_tmp = $_FILES["image"]["tmp_name"];

                if (is_uploaded_file($image_tmp)) {
                    move_uploaded_file($image_tmp, 'public/' . $image);
                    // Assurez-vous que le chemin du fichier image est enregistré dans la base de données
                } else {
                    $errorMessage = "Erreur lors du téléchargement de l'image.";
                }
            }

            $success = $carModel->updateCar($carId, $marque, $model, $prix, $image);

            if ($success) {
                header("Location: ../index.php?action=readcars");
                exit();
            } else {
                $errorMessage = "Erreur lors de la mise à jour de la voiture.";
            }
        }
    }

    $carId = isset($_GET['car_id']) ? $_GET['car_id'] : null;
    $carModel = new CarModel($this->conn);
    $car = $carModel->getCarById($carId);

    require 'views/update_car.php';
}

    
 // Partie de votre code dans la méthode createCar
 public function createCar() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["marque"]) && isset($_POST["model"])) {
            $marque = $_POST["marque"];
            $model = $_POST["model"];
            $description = $_POST["description"];
            $prix = $_POST["prix"];


            $carModel = new CarModel($this->conn);

            try{ 


                $car_id=$carModel->createCar($marque, $model, $description, $prix); 
               
               
                $imageNames = array();

                // Vérifiez si des fichiers image ont été téléchargés
                if (isset($_FILES["image"]) && is_array($_FILES["image"]["tmp_name"])) {
                    foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                        if (!empty($tmp_name)) {
                            $image_name = $_FILES["image"]["name"][$key];
                            $image_tmp = $_FILES["image"]["tmp_name"][$key];
    
                            // Vérifiez si le fichier a été téléchargé avec succès
                            if (is_uploaded_file($image_tmp)) {
                                // Générez un nom de fichier unique pour éviter les conflits
                                $unique_name = uniqid() . "_" . $image_name;
                               
    
                                // Déplacez le fichier téléchargé vers l'emplacement souhaité
                                move_uploaded_file($image_tmp, 'public/car_photos/' . $unique_name);
                                $carModel->createImage($unique_name,$car_id);
                            } else {
                                // Gérez les erreurs de téléchargement d'image
                                echo "Erreur lors du téléchargement de l'image $image_name.";
                                return; // Sortez de la méthode en cas d'erreur
                            }
                        }
                    }
                }
    
               
               
               
               
               
                header("Location: index.php?action=readcars");
                exit();
            } catch (Exception) {
                $errorMessage = "Erreur lors de la création d'un voiture : " . $this->conn->error;
                echo $errorMessage;
                die($errorMessage);
            }

            // Créez un tableau pour stocker les noms des fichiers téléchargés
   
            // Maintenant, $imageNames contient les noms des fichiers téléchargés, que vous pouvez stocker en base de données

           
        }
    } else {
        include 'views/create_car.php';
    }
}

public function createImage() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["voiture_id"]) && isset($_POST["model"])) {
            $marque = $_POST["marque"];
            $model = $_POST["model"];
            $description = $_POST["description"];
            $prix = $_POST["prix"];

            // Créez un tableau pour stocker les noms des fichiers téléchargés
            $imageNames = array();

            // Vérifiez si des fichiers image ont été téléchargés
            if (isset($_FILES["image"]) && is_array($_FILES["image"]["tmp_name"])) {
                foreach ($_FILES["image"]["tmp_name"] as $key => $tmp_name) {
                    if (!empty($tmp_name)) {
                        $image_name = $_FILES["image"]["name"][$key];
                        $image_tmp = $_FILES["image"]["tmp_name"][$key];

                        // Vérifiez si le fichier a été téléchargé avec succès
                        if (is_uploaded_file($image_tmp)) {
                            // Générez un nom de fichier unique pour éviter les conflits
                            $unique_name = uniqid() . "_" . $image_name;
                            $imageNames[] = $unique_name;

                            // Déplacez le fichier téléchargé vers l'emplacement souhaité
                            move_uploaded_file($image_tmp, 'public/' . $unique_name);
                        } else {
                            // Gérez les erreurs de téléchargement d'image
                            echo "Erreur lors du téléchargement de l'image $image_name.";
                            return; // Sortez de la méthode en cas d'erreur
                        }
                    }
                }
            }

            // Maintenant, $imageNames contient les noms des fichiers téléchargés, que vous pouvez stocker en base de données

            $carModel = new CarModel($this->conn);

            if ($carModel->createCar($marque, $model, $description, $prix, $imageNames)) {
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
