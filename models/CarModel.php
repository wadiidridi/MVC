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
public function createCar($marque, $model, $description, $prix, $image) {
    $sql = "INSERT INTO voiture (marque, model, description, prix, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    if ($stmt) {
        // Utilisez NULL si $image est NULL, sinon, utilisez la valeur de $image
        $imageValue = $image ? $image : NULL;

        $stmt->bind_param("ssssb", $marque, $model, $description, $prix, $image);

        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de la création de la voiture : " . $stmt->error);
        }
    } else {
        die("Erreur de préparation de la requête : " . $this->conn->error);
    }
}




  
//     public function updateUser($userId, $mail) {
//         $query = "UPDATE personne SET mail = ? WHERE id = ?";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bind_param("si", $mail, $userId);

//         if ($stmt->execute()) {
//             return true; // Mise à jour réussie
//         } else {
//             return false; // Échec de la mise à jour
//         }
//     }
    
    public function deleteCar($carId) {
        $sql = "DELETE FROM voiture WHERE id = ?";
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
