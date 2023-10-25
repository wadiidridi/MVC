<?php
require 'config/database.php';

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM personne WHERE mail = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // Aucun utilisateur trouvé
        }
    }
    public function createUser($name, $mail, $password, $image) {
        $sql = "INSERT INTO personne (name, mail, password, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
    
        // Mettez à jour la chaîne de type pour inclure "b" pour le champ BLOB
        $stmt->bind_param("ssss", $name, $mail, $password, $image);
    
        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de l'insertion : " . $stmt->error);
        }
    }
    public function updateUser($userId, $name, $mail, $password, $newImage) {
        // Récupérez l'ancienne image
      
    
        $sql = "UPDATE personne SET name = ?, mail = ?, password = ?, image = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
    
        // Bind les paramètres à mettre à jour, y compris la nouvelle image
        $stmt->bind_param("ssssi", $name, $mail, $password, $newImage, $userId);
    
        if ($stmt->execute()) {
            return true;
        } else {
            die("Erreur lors de la mise à jour de l'utilisateur : " . $stmt->error);
        }
    }
    
    
    public function getUserImageById($userId) {
        $sql = "SELECT image FROM personne WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['image'];
        } else {
            return null; // Aucune image trouvée pour cet utilisateur
        }
    }
    

    public function deleteUser($userId) {
        $sql = "DELETE FROM personne WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
    
        if ($stmt->execute()) {
            return true; // Suppression réussie
        } else {
            return false; // Erreur lors de la suppression
        }
    }
    public function getUserById($userId) {
        $sql = "SELECT * FROM personne WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // Aucun utilisateur trouvé
        }
    }
    
   public function getUsers() {
        $sql = "SELECT * FROM personne";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $users = array();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return array(); // Aucun utilisateur trouvé
        }
    } 
   

}
?>
