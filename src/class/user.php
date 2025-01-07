
<?php


require_once('connection_data.php');
 
class User extends connection_db
{
    public $id_user;
    public $FullName;
    public $email;
    public $password;
    public $id_role;
    public $image_user;
    protected $conx;
    public function __construct()
    {
        $this->conx = $this->connect();

    }

    public function Signup( $id_role, $email, $password,$FullName)
    {
        try {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $stmt = $this->conx->prepare("INSERT INTO user (FullName,Password ,email  ,id_role) VALUES ( :FullName ,:Password ,:email,:id_role)");
            $stmt->bindParam(':id_role', $id_role);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':Password', $hashedPassword);
            $stmt->bindParam(':FullName', $FullName);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'inscription : " . $e->getMessage());
            return false;
        }
    }

    public function Login( $email,  $password)
    {
        
        try {
            
            $stmt = $this->conx->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['Password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['user_email'] = $user['Email'];
                $_SESSION['user_role'] = $user['id_role'];
                $_SESSION['FullName'] = $user['FullName'];


                return true;
            } else {
             
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erreur lors de la connexion : " . $e->getMessage());
            return false;
        }
    }
    public function Nbr_user()
    {
        $query = $this->conx->prepare("SELECT count(*) AS total FROM user");
        $query->execute();
        $result = $query->fetch();
        return $result['total'];

    }

}
