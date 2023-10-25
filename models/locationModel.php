<?php
require 'config/database.php';

class LocationModel {
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
    public function createLocation($voiture_id, $personne_id,$date_debut,$date_fin,$prix) {
        $sql = "INSERT INTO location ( voiture_id , personne_id, date_debut, date_fin,prix) VALUES (?, ? ,?, ?,?)";
        $stmt = $this->conn->prepare($sql);
    
        // Mettez à jour la chaîne de type pour inclure "b" pour le champ BLOB
        $stmt->bind_param("ssssd",$voiture_id, $personne_id,$date_debut, $date_fin,$prix);
    
        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de l'insertion : " . $stmt->error);
        }
    }
    public function search($date_debut,$date_fin) {
       $sql= "SELECT voiture.* FROM voiture

        LEFT JOIN location ON voiture.voiture_id = location.voiture_id

        WHERE location.voiture_id IS NULL OR location.date_fin < ? OR location.date_debut > ? 

        OR voiture.voiture_id NOT IN (SELECT voiture_id FROM location )"; 
        
        
        $stmt = $this->conn->prepare($sql);
    
        // Mettez à jour la chaîne de type pour inclure "b" pour le champ BLOB
        $stmt->bind_param("ss",$date_debut, $date_fin);
        $stmt->execute();
          $result = $stmt->get_result();
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
    public function deletelocation($userId) {
        $sql = "DELETE FROM location WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $locationId);
    
        if ($stmt->execute()) {
            return true; // Suppression réussie
        } else {
            return false; // Erreur lors de la suppression
        }
    }
//     public function getUserById($userId) {
//         $sql = "SELECT * FROM personne WHERE id = ?";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bind_param("i", $userId);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         if ($result->num_rows > 0) {
//             return $result->fetch_assoc();
//         } else {
//             return null; // Aucun utilisateur trouvé
//         }
//     }
    
   public function getLocations() {
        $sql = "SELECT * FROM location";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $locations = array();
            while ($row = $result->fetch_assoc()) {
                $locations[] = $row;
            }
            return $locations;
        } else {
            return array(); // Aucun utilisateur trouvé
        }
    } 
   

}
?>
