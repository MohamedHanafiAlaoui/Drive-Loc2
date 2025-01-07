<?php


require_once("connection_data.php"); 


class colorType extends connection_db
{
    public $id_color;
    public $nameColor;
    public $id_type;
    public $nameType;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();
    }
    public function viewColor()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT * FROM color");
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }


        }
    public function viewType()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT * FROM type");
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
            
        }
}