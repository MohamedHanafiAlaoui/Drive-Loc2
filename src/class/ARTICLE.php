<?php


require_once("connection_data.php"); 


class ARTICLE extends connection_db
{
    public $id_ARTICLE;
    public $Titer;
    public $contenu;

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
 public function AJOTERARTICLE($Titer, $contenu, $id_user, $id_them,  $image,$s_status )
        {
            try {
                
                $stmt = $this->dbcnx->prepare("INSERT INTO ARTICLE (Titer, contenu, id_user, s_status, id_them,image) 
                                                VALUES (:Titer, :contenu, :id_user, :s_status, :id_them,:image)");
        
                
                $stmt->bindParam(':Titer', $Titer);
                $stmt->bindParam(':contenu', $contenu);
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

        private $lignes_par_page = 5;

        public function getLinesParPage($lines)
        {
            return $this->lignes_par_page =$lines ;
        }

        public function Nbr_ARTICLE()
        {
            $query = $this->dbcnx->prepare("SELECT count(*) AS total FROM ARTICLE where  ARTICLE.s_status = 'active' ");
            $query->execute();
            $result = $query->fetch();
            return $result['total'];
    
        }

        public function GetARTICLE($page = 1, $search , $nametags )
        {
            $offset = ($page - 1) * $this->lignes_par_page;
        
            
            $queryStr = "SELECT ARTICLE.* ,tags.nametags,user.id_user,user.FullName as f_name ,user.id_role FROM ARTICLE JOIN tagscommentaires ON tagscommentaires.id_ARTICLE = ARTICLE.id_article JOIN tags on tagscommentaires.id_tag = tags.id_tag JOIN user on user.id_user =ARTICLE.id_user
                         WHERE ARTICLE.s_status = 'active'";
        
            if ($search) {
                $queryStr .= " AND ARTICLE.Titer LIKE :search";
            }
            if ($nametags) {
                $queryStr .= " AND tags.nametags LIKE :nametags";
            }
        
            $queryStr .= " LIMIT :offset, :limit";
        
            $query = $this->dbcnx->prepare($queryStr);
            
            
            if ($search) {
                $searchTerm = "%$search%"; 
                $query->bindParam(':search', $searchTerm);
            }
            if ($nametags) {
                $nametagsTerm = "%$nametags%"; 
                $query->bindParam(':nametags', $nametagsTerm);
            }
        
            
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':limit', $this->lignes_par_page, PDO::PARAM_INT);
        
            $query->execute();
            return $query->fetchAll();
        }
        

        public function OneviewARTICLE($id_ARTICLE)
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT ARTICLE.* ,
                them.namethem AS thems, 
                user.FullName AS f_name from ARTICLE 
                JOIN them on ARTICLE.id_them= them.id_them 
                join user on ARTICLE.id_user = user.id_user 
                WHERE id_ARTICLE = :id;
                ");
                $stmt->bindParam(':id', $id_ARTICLE);

        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }

        public function OneviewTags($id_ARTICLE)
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT ARTICLE.* ,tags.nametags FROM ARTICLE JOIN tagscommentaires ON tagscommentaires.id_ARTICLE = ARTICLE.id_article JOIN tags on tagscommentaires.id_tag = tags.id_tag WHERE ARTICLE.id_ARTICLE = :id;
                ");
                $stmt->bindParam(':id', $id_ARTICLE);

        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }
        public function OneclickARTICLE()
        {
            try {
                    $stmt = $this->dbcnx->prepare("SELECT id_ARTICLE FROM `ARTICLE` ORDER BY `ARTICLE`.`id_ARTICLE` DESC LIMIT 1;");
                    $stmt->execute();
                    return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $e) {
                    
                error_log("Erreur lors de la suppression d'une voiture : " . $e->getMessage());
                return false;
            }
        }

        public function viewARTICLE()
        {
            try {
            
                $stmt = $this->dbcnx->prepare("SELECT ARTICLE.* , them.namethem AS thems, user.FullName AS f_name from ARTICLE JOIN them on ARTICLE.id_them= them.id_them join user on ARTICLE.id_user = user.id_user ORDER BY s_status DESC");
        
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {

                error_log("Erreur lors de la récupération des articles: " . $e->getMessage());
                return $e->errorInfo;
            }
            
        }

        public function mdfRTICLE($id_ARTICLE, $s_status)
        {
            try {
                
                $stmt = $this->dbcnx->prepare("UPDATE ARTICLE SET s_status=:s_status WHERE id_ARTICLE = :id_ARTICLE");
            $stmt->bindParam(':id_ARTICLE', $id_ARTICLE);
            $stmt->bindParam(':s_status', $s_status);

                
                return $stmt->execute();
            } catch (PDOException $e) {
                
                error_log("Erreur lors de la mise à jour de l'article : " . $e->getMessage());
                return false;
            }
        }
            
      
}




