
<?php
require_once("connection_data.php"); 


class commentaires extends connection_db
{
    public $id_commentaires;
    public $contenu;
    public $id_Article;
    public $id_user;
    public $c_date;

    protected $dbcnx;
    public function __construct()
    {
        
        $this->dbcnx = $this->connect();

    }
    public function AJOTERcommentaires($contenu, $id_Article, $id_user )
    {
        try {
            
            $stmt = $this->dbcnx->prepare("INSERT INTO commentaires (contenu, id_Article, id_user) 
            VALUES (:contenu, :id_Article, :id_user)");

    
            
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':id_Article', $id_Article);
            $stmt->bindParam(':id_user', $id_user);
                   
            return $stmt->execute();
        } catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

    public function viewcommentaires($id_Article)
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT commentaires.*, user.FullName as Name FROM `commentaires` JOIN user ON commentaires.id_user = user.id_user WHERE s_status = 'active' and  id_Article =:id_Article;");
                $stmt->bindParam("id_Article", $id_Article);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
            
        }
    public function suprimcommentaires($id_commentaires, $id_user,$id)
    {
        try {
            $stmt = $this ->dbcnx->prepare("UPDATE `commentaires` SET `s_status` = 'Not Active' WHERE commentaires.id_commentaires = :id_commentaires and (commentaires.id_user = :id_user or 1 = :id)  ;");
            $stmt->bindParam(':id_commentaires', $id_commentaires);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();

        }catch (PDOException $e) {
            
            error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
            return false;
        }
    }

}



