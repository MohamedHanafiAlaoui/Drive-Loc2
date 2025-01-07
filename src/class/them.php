
<?php
require_once("connection_data.php"); 


class them extends connection_db
{
    public $id_them;
    public $namethem;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();

    }
    public function AJOTERthem($namethem)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO them  (namethem) 
                                            VALUES (:namethem)");
    
            
            $stmt->bindParam(':namethem', $namethem);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }
    public function SUprimerCar($id_caid_themr)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("DELETE FROM Car WHERE id_car = :id");
    
            
            $stmt->bindParam(':id', $id_car);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
            return false;
        }
    }

    public function mdfthem($id_car, $modele, $id_color, $prix, $disponibilite, $id_type, $lieu, $kilometrage)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("UPDATE Car 
            SET modele = :modele, id_color = :id_color, prix = :prix, 
                disponibilite = :disponibilite, id_type = :id_type, 
                lieu = :lieu, kilometrage = :kilometrage 
            WHERE id_car = :id_car");
        $stmt->bindParam(':id_car', $id_car);
        $stmt->bindParam(':modele', $modele);
        $stmt->bindParam(':id_color', $id_color);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':disponibilite', $disponibilite);
        $stmt->bindParam(':id_type', $id_type);
        $stmt->bindParam(':lieu', $lieu);
        $stmt->bindParam(':kilometrage', $kilometrage);
    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }
    public function viewthem($id_car, $id_type)
    {
        
    }
            


}



