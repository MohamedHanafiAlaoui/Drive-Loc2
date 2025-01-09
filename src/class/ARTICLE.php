<?php


require_once("connection_data.php"); 


class ARTICLE extends connection_db
{
    public $id_ARTICLE;
    public $Titer;
    public $contenu;
    public $tags;
    public $id_user;
    public $s_status;
    public $id_them;
    public $D_date;
    protected $dbcnx;
    public function __construct()
    {
        $this->dbcnx = $this->connect();
    }

    public function viewType()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT ARTICLE.* ,
                them.namethem AS thems, 
                user.FullName AS f_name from ARTICLE 
                JOIN them on ARTICLE.id_them= them.id_them 
                join user on ARTICLE.id_user = user.id_user 
                WHERE ARTICLE.s_status = 'active' ");
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
            
        }
    public function AJOTERARTICLE($Titer, $contenu, $tags, $id_user, $id_them,  $image,$s_status )
        {
            try {
                
                $stmt = $this->dbcnx->prepare("INSERT INTO ARTICLE (Titer, contenu, tags, id_user, s_status, id_them,image) 
                                                VALUES (:Titer, :contenu, :tags, :id_user, :s_status, :id_them,:image)");
        
                
                $stmt->bindParam(':Titer', $Titer);
                $stmt->bindParam(':contenu', $contenu);
                $stmt->bindParam(':tags', $tags);
                $stmt->bindParam(':id_user', $id_user);
                $stmt->bindParam(':s_status', $s_status);
                $stmt->bindParam(':id_them', $id_them);
                $stmt->bindParam(':image', $image);

        
               
                return $stmt->execute();
            } catch (PDOException $e) {
                
                error_log("Erreur lors de l'ajout d'une voiture : " . $e->getMessage());
                return false;
            }
        }

        private $lignes_par_page = 1;

        public function getLinesParPage()
        {
            return $this->lignes_par_page;
        }

        public function Nbr_ARTICLE()
        {
            $query = $this->dbcnx->prepare("SELECT count(*) AS total FROM ARTICLE where  ARTICLE.s_status = 'active' ");
            $query->execute();
            $result = $query->fetch();
            return $result['total'];
    
        }

        public function GetARTICLE($page = 1)
        {
    
            $offset = ($page - 1) * $this->lignes_par_page;
            $query = $this->conx->prepare("SELECT ARTICLE.* ,
                them.namethem AS thems, 
                user.FullName AS f_name from ARTICLE 
                JOIN them on ARTICLE.id_them= them.id_them 
                join user on ARTICLE.id_user = user.id_user 
                WHERE ARTICLE.s_status = 'active' 
                LIMIT :offset, :limit");
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':limit', var: $this->lignes_par_page, type: PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll();
        }
            
      
}




