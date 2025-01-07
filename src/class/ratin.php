
<?php
require_once("connection_data.php"); 


class RatinUser extends connection_db
{
    public $id_car;
    public $id_user;
    public $id_ratin;
    public $id_ratinuser;

    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();

    }
    public function AJOTERRatin($id_car, $id_user, $id_ratin)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO RatinUser (id_car, id_user, id_ratin) 
                                            VALUES (:id_car, :id_user, :id_ratin)");
    
            
            $stmt->bindParam(':id_car', $id_car);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_ratin', $id_ratin);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

    public function mdfratin($id_ratinuser, $id_user, $id_ratin)
    {
        try {
            $stmt = $this->dbcnx->prepare("UPDATE RatinUser 
                                            SET  id_ratin = :id_ratin 
                                            WHERE id_ratinuser = :id_ratinuser");
            
            $stmt->bindParam(':id_ratinuser', $id_ratinuser);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id_ratin', $id_ratin);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de la modification du rating : " . $e->getMessage());
            return false;
        }
    }

    public function viewRatinUser($id_car)
    {
        try {
        
            $stmt = $this->dbcnx->prepare("SELECT  RatinUser.id_ratinuser,user.FullName AS name,Ratin.ratin AS NUBER FROM RatinUser JOIN user ON RatinUser.id_user = user.id_user JOIN Ratin ON RatinUser.id_ratin = Ratin.id_ratin WHERE id_car=:id_car;");
            $stmt->bindParam(':id_car', $id_car);
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
            return false;
        }
    }
            


}


