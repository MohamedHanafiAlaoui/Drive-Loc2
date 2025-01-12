<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/ARTICLE.php';



if ( isset($_GET['id']) && isset($_GET['nm'])) {
    $id_ARTICLE = $_GET['id']*1;
    $s_status = $_GET['nm'];


    // var_dump($s_status);
    // exit;


    $ARTICL = new ARTICLE();

    if (!$ARTICL -> mdfRTICLE($id_ARTICLE, $s_status)){
       
        $error = "Échec de la mise à jour de l'article. Veuillez réessayer.";
        // header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
    } 

        header("Location: /pluto-1.0.0/ARTICLE.php");
        exit;
    
}