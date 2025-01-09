<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/commentaires.php';

if (isset($_POST['submit']))
{
    $commentaire  = new commentaires();

   
        $contenu  = $_POST['contenu'];
        $id_Article  = $_POST['id_Article']*1;
        $id_user  = $_POST['id_user']*1 ;
        // $c_date  = date(format: 'Y-m-d H:i:s');





        
        $result = $commentaire ->AJOTERcommentaires($contenu, $id_Article, $id_user);
 
        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($contenu );
            echo $error;

           exit;
        }

    // Redirection après le succès
    header("Location: /pluto-1.0.0/them.php");
    
}

?>
