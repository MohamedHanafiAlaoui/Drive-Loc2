
<?php
require_once("connection_data.php"); 


class Car extends connection_db
{
    public $id_car;
    public $modele;
    public $id_color;
    public $prix;
    public $disponibilite;
    public $id_type;
    public $anneefabrication;
    public $lieu;
    public $kilometrage;
    public $image;
    public $Description;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();

    }
    public function AJOTERCAR($modele, $id_color, $prix, $disponibilite, $id_type, $lieu, $kilometrage, $image, $description)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO Car (modele, id_color, prix, disponibilite, id_type, lieu, kilometrage,image,Description) 
                                            VALUES (:modele, :id_color, :prix, :disponibilite, :id_type, :lieu, :kilometrage,:image,:Description)");
    
            
            $stmt->bindParam(':modele', $modele);
            $stmt->bindParam(':id_color', $id_color);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':disponibilite', $disponibilite);
            $stmt->bindParam(':id_type', $id_type);
            $stmt->bindParam(':lieu', $lieu);
            $stmt->bindParam(':kilometrage', $kilometrage);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':Description', $description);
    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }
    public function SUprimerCar($id_car)
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

    public function mdfcar($id_car, $modele, $id_color, $prix, $disponibilite, $id_type, $lieu, $kilometrage)
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
    public function viewCar()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT Car.id_car,Car.modele,Car.prix,Car.disponibilite,Car.lieu,Car.kilometrage,Car.image,Car.Description ,color.nameColor AS colorName,type.nameType AS TypeName FROM Car JOIN color ON Car.id_color = color.id_color JOIN type ON Car.id_type = type.id_type;
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
            
                $stmt = $this->dbcnx->prepare("SELECT Car.id_car,Car.modele,Car.prix,Car.disponibilite,Car.lieu,Car.kilometrage,Car.image,Car.Description ,color.nameColor AS colorName,type.nameType AS TypeName FROM Car JOIN color ON Car.id_color = color.id_color JOIN type ON Car.id_type = type.id_type WHERE id_car = :id;
                ");
                $stmt->bindParam(':id', $id_car);

        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }

        private $lignes_par_page = 4;

        public function getLinesParPage()
        {
            return $this->lignes_par_page;
        }
    
        public function Nbr_Car()
        {
            $query = $this->dbcnx->prepare("SELECT count(*) AS total FROM Car");
            $query->execute();
            $result = $query->fetch();
            return $result['total'];
    
        }
    
        public function GetCar($page = 1)
        {
    
            $offset = ($page - 1) * $this->lignes_par_page;
            $query = $this->conx->prepare("SELECT Car.id_car,Car.modele,Car.prix,Car.disponibilite,Car.lieu,Car.kilometrage,Car.image,Car.Description ,color.nameColor AS colorName,type.nameType AS TypeName FROM Car JOIN color ON Car.id_color = color.id_color JOIN type ON Car.id_type = type.id_type  LIMIT :offset, :limit");
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':limit', var: $this->lignes_par_page, type: PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll();
        }
            


}



