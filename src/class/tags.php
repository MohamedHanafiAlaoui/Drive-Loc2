
<?php
require_once("connection_data.php"); 


class tags extends connection_db
{
    public $id_tag;
    public $nametags;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();

    }
    public function AJOTERtags($nametags)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO tags  (nametags) 
                                            VALUES (:nametags)");
    
            
            $stmt->bindParam(':nametags', $nametags);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }


    public function mdfthem($id_tag, $nametags)
    {
        try {
            
            $stmt = $this->dbcnx->prepare("UPDATE tags 
            SET nametags = :nametags
            WHERE id_tag = :id_tag");
        $stmt->bindParam(':id_tag', $id_tag);
        $stmt->bindParam(':nametags', $nametags);

    
            
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }
    public function viewtags()
    {
        try {
            
            $stmt = $this->dbcnx->prepare("SELECT * FROM tags");
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            
            error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
            return false;
        } 
    }
            


}



