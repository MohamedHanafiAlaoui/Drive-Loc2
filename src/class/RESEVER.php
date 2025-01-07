
<?php
require_once("connection_data.php"); 


class RESEVER extends connection_db
{
    public $id_Reserve;
    public $adresse;
    public $times;
    public $id_user;
    public $id_car;
    public $statut;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();

    }
    public function AJOTERCARRESEVER($adresse, $times, $id_user, $id_car)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO RESEVER (adresse, times, id_user, id_car,statut) 
                                            VALUES (:adresse, :times, :id_user, :id_car,'en_attente')");
    
            
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':times', $times);
            $stmt->bindParam(':id_car', $id_car);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

    public function viewRESEVER()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT RESEVER.id_Reserve,RESEVER.adresse,RESEVER.times, user.FullName AS USERNAME ,Car.modele AS CARNAME FROM RESEVER JOIN user ON RESEVER.id_user = user.id_user JOIN Car ON RESEVER.id_car = Car.id_car;
");
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }

    public function OneviewCar($id_car)
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT RESEVER.id_Reserve,RESEVER.adresse,RESEVER.times, user.FullName AS USERNAME ,Car.modele AS CARNAME FROM RESEVER JOIN user ON RESEVER.id_user = user.id_user JOIN Car ON RESEVER.id_car = Car.id_car WHERE user.id_user = :id;
                ");
                $stmt->bindParam(':id', $id_car);

        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }

    public function mdfRE($id_Reserve,$statut)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("UPDATE RESEVER 
            SET  statut = :statut WHERE RESEVER.id_Reserve = :id;");
        $stmt->bindParam(':id', $id_Reserve);
        $stmt->bindParam(':statut', $statut);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

    public function RECont($statut)
    {
        try {
            
            $query = $this->dbcnx->prepare("SELECT COUNT(*) AS total FROM `RESEVER` WHERE statut =:statut;");

            $query->bindParam(':statut', $statut);
            $query->execute();

            $result = $query->fetch();
            return $result['total'];
    
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

            


}



