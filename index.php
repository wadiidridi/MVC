<?php
require_once 'controllers/UserController.php';
require_once 'controllers/CarController.php';
require_once 'controllers/LocationController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$userController = new UserController($conn);
$carController = new CarController($conn);
$locationController = new LocationController($conn);

switch ($action) {
    case 'createUser':
        $userController->createUser();
        break;
    case 'read':
        $userController->read();
        break;
        case 'my_profile_read':
            $userController->my_profile_read();
            break;
        case 'updateUser':
            $userController->updateUser();
            break;    
            case 'updateUser':
                $userController->dashboard();
                break;   
        case 'login':
            $userController->login();
            break;
            case 'logout':
                $userController->logout();
                break;
                
            case 'deleteUser':
                // Assurez-vous de vérifier et de récupérer l'ID de l'utilisateur à supprimer
                $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
                if ($userId) {
                    $userController->deleteUser($userId);
                }
                break;
                case 'readcars':
                    $carController->readcars();
                    break;
                    case 'createCar':
                        $carController->createCar();
                        break;
                  case 'login':

               $userController->login();
            break;
            case 'updateCar':
                $carController->updateCar();
             break;
            case 'deleteCar':
                $carController->deleteCar($_GET['car_id']);
             break;
             case 'readLocations':
                $locationController->readLocations();
             break;

             case 'deleteLocation':
                $locationId = isset($_GET['location_id']) ? $_GET['location_id'] : null;
                if ($locationId) {
                    $locationController->deleteLocation($locationId);
                }            
                 break;
                 case 'searchFreecars':
                    $locationController->search();
                    break ;
                    case 'createLocation':
                        $locationController->createLocation();
                     break;
                         case 'photos':
                            $carController->getPhotos($_GET['car_id']);
                     break;  
               
                 
    // Ajoutez d'autres cas pour d'autres actions
    default:
        // Action par défaut si aucune action spécifique n'est fournie
        // Par exemple, rediriger vers une page d'accueil.
        // header("Location: index.php");
        // include 'views/acceuil.php' ;
        include 'index.html' ;
        break;
}
?>
