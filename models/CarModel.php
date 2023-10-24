<?php
require 'config/database.php';

class CarModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
//     public function getUserByEmail($email) {
//         $sql = "SELECT * FROM personne WHERE mail = ?";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bind_param("s", $email);
//         $stmt->execute();
//         $result = $stmt->get_result();
    
//         if ($result->num_rows > 0) {
//             return $result->fetch_assoc();
//         } else {
//             return null; // Aucun utilisateur trouvé
//         }
//     }
public function createCar($marque, $model, $description, $prix) {
    $sql = "INSERT INTO voiture (marque, model, description, prix) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt) {
        // Utilisez NULL si $image est NULL, sinon, utilisez la valeur de $image
    

        $stmt->bind_param("ssss", $marque, $model, $description, $prix);

        if ($stmt->execute()) {
            return $this->conn->insert_id ;;
        } else {
            die("Erreur lors de la création de la voiture : " . $stmt->error);
        }
    } else {
        die("Erreur de préparation de la requête : " . $this->conn->error);
    }
}
//     }
public function createImage($image,$voiture_id) {
    $sql = "INSERT INTO image_voiture ( image , voiture_id) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt) {
        // Utilisez NULL si $image est NULL, sinon, utilisez la valeur de $image
        $imageValue = $image ? $image : NULL;

        $stmt->bind_param("ss",  $image,$voiture_id);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de la création de la voiture : " . $stmt->error);
        }
    } else {
        die("Erreur de préparation de la requête : " . $this->conn->error);
    }
}




  
// CarModel.php

public function updateCar($carId, $marque, $model, $prix, $image) {
    // Assurez-vous de valider les données ici pour des raisons de sécurité

    $query = "UPDATE voiture SET marque = ?, model = ?, prix = ?, image = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssdsi", $marque, $model, $prix, $image, $carId);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

public function getCarById($carId) {
    $query = "SELECT * FROM voiture WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $carId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }

    return null; // Retournez null si la voiture n'est pas trouvée
}

    public function deleteCar($carId) {
        $sql = "DELETE FROM voiture WHERE voiture_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $carId);
    
        if ($stmt->execute()) {
            return true; // Suppression réussie
        } else {
            return false; // Erreur lors de la suppression
        }
    }
    // public function getUserById($userId) {
    //     $sql = "SELECT * FROM personne WHERE id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("i", $userId);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     if ($result->num_rows > 0) {
    //         return $result->fetch_assoc();
    //     } else {
    //         return null; // Aucun utilisateur trouvé
    //     }
    // }
    
   public function getCars() {
        $sql = "SELECT * FROM voiture";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $cars = array();
            while ($row = $result->fetch_assoc()) {
                $cars[] = $row;
            }
            return $cars;
        } else {
            return array(); // Aucun utilisateur trouvé
        }
    } 
   

}
?>
