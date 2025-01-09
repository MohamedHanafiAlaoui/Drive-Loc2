<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/ARTICLE.php';

if (isset($_POST['submit'])) {
    $ARTICLS = new ARTICLE();

    
        $Titer = $_POST['Titer'];
        $contenu = $_POST['contenu'];
        $tags = $_POST['tags'];
        $id_user = $_POST['id_user'];
        $id_them = $_POST['id_them'];
        $image ="";
    var_dump($_POST);

        // Appeler la méthode pour ajouter le véhicule
        $result = $ARTICLS->AJOTERARTICLE($Titer, $contenu, $tags, $id_user, $id_them,  $image,'Not Active');  

        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($Titer);

            
            header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
            exit;
        }
 

 
    header("Location: /car-rent-website-template/index.php");
    exit;
}

