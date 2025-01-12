<?php


require_once("connection_data.php"); 


class tagscommentaires extends connection_db
{
    public $id_tag;
    public $id_article;

    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();
    }


 public function AJOTERtagscommentaires($id_tag, $id_article )
        {
            try {
                
                $stmt = $this->dbcnx->prepare("INSERT INTO tagscommentaires (id_tag, id_article) 
                                                VALUES (:id_tag, :id_article)");
        
                
                $stmt->bindParam(':id_tag', $id_tag);
                $stmt->bindParam(':id_article', $id_article);

        
               
                return $stmt->execute();
            } catch (PDOException $e) {
                
                error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
                return false;
            }
        }


            
      
}




