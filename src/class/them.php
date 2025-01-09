
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
    // public function SUprimerCar($id_caid_themr)
    // {
    //     try {
            
    //         $stmt = $this->dbcnx->prepare("DELETE FROM Car WHERE id_car = :id");
    
            
    //         $stmt->bindParam(':id', $id_car);

    
            
    //         return $stmt->execute();
    //     } catch (PDOException $e) {
            
    //         error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
    //         return false;
    //     }
    // }

    public function mdfthem($id_them, $namethem)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("UPDATE them 
            SET namethem = :namethem
            WHERE id_them = :id_them");
        $stmt->bindParam(':id_them', $id_them);
        $stmt->bindParam(':namethem', $namethem);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }
    public function viewthem()
    {
        try {
            
            $stmt = $this->dbcnx->prepare("SELECT * FROM them");
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
            return false;
        } 
    }
            


}



