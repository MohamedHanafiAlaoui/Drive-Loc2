<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/ARTICLE.php';
require_once '../class/tagscommentaires.php';

if (isset($_POST['submit'])) {
    $ARTICLS = new ARTICLE();

    
        $Titer = $_POST['Titer'];
        $contenu = $_POST['contenu'];
        $id_user = $_POST['id_user'];
        $id_them = $_POST['id_them'];
        // $tags = $_POST['tags'];
        $image ="";



        // Appeler la méthode pour ajouter le véhicule
        $result = $ARTICLS->AJOTERARTICLE($Titer, $contenu, $id_user, $id_them,  $image,'Not Active');  

        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($Titer);

            exit;
            // header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
            // exit;
        }
 
        if (isset($_POST['tags']) && is_array($_POST['tags'])) {

            $ARTICLEs= $ARTICLS->OneclickARTICLE();
            $commentaire = new tagscommentaires();
            


            
            foreach ($_POST['tags'] as $tagID) {

            $commentaires = $commentaire->AJOTERtagscommentaires($tagID, ($ARTICLEs['id_ARTICLE']) );

            if (!$commentaires) {
                $error = "Failed to add vehicle: " . htmlspecialchars($tagID);
    
                var_dump($error);
                exit;
                // header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
                // exit;
            }
                // echo htmlspecialchars($tagID) . '<br>'; // Affiche chaque ID des tags sélectionnés
            }
        }

 
    header("Location: /car-rent-website-template/index.php");
    exit;
}

