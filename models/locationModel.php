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
    public function createLocation($voiture_id, $personne_id,$date_debut,$date_fin) {
        $sql = "INSERT INTO location ( voiture_id , personne_id, date_debut, date_fin) VALUES (?, ? ,?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Mettez à jour la chaîne de type pour inclure "b" pour le champ BLOB
        $stmt->bind_param("ssdd",$voiture_id, $personne_id,$date_debut, $date_fin);
    
        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de l'insertion : " . $stmt->error);
        }
    }
//     public function updateUser($userId, $name, $mail, $password, $newImage) {
//         // Récupérez l'ancienne image
//         $oldImage = $this->getUserImageById($userId);
    
//         if ($newImage !== null) {
//             // Une nouvelle image a été téléchargée, gérez le téléchargement de la nouvelle image ici
//             // Assurez-vous de supprimer l'ancienne image si elle existe
//             if ($oldImage !== null) {
//                 unlink('public/' . $oldImage); // Supprimez l'ancienne image du répertoire
//             }
    
//             // Enregistrez la nouvelle image
//             move_uploaded_file($newImage, 'public/' . $newImage);
//         }
    
//         $sql = "UPDATE personne SET name = ?, mail = ?, password = ?, image = ? WHERE id = ?";
//         $stmt = $this->conn->prepare($sql);
    
//         // Bind les paramètres à mettre à jour, y compris la nouvelle image
//         $stmt->bind_param("ssssi", $name, $mail, $password, $newImage, $userId);
    
//         if ($stmt->execute()) {
//             return true;
//         } else {
//             die("Erreur lors de la mise à jour de l'utilisateur : " . $stmt->error);
//         }
//     }
    
    
//     public function getUserImageById($userId) {
//         $sql = "SELECT image FROM personne WHERE id = ?";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bind_param("i", $userId);
//         $stmt->execute();
//         $result = $stmt->get_result();
    
//         if ($result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             return $row['image'];
//         } else {
//             return null; // Aucune image trouvée pour cet utilisateur
//         }
//     }
    

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
