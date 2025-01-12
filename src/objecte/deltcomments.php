


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/commentaires.php';

// var_dump($_GET);
// exit;

 var_dump($_GET);
if (isset($_GET['id']) && isset($_GET['id_commentaires'])  && isset($_GET['id']) ) {
    $id = $_GET['id']*1;
    $id_commentaires = $_GET['id_commentaires']*1;
    $id_user = $_GET['id_user']*1;


   

    $commentaire = new commentaires();
    if ($commentaire ->suprimcommentaires($id_commentaires, $id_user,$id)) {
        header("Location: /pluto-1.0.0/viw.php");
        exit;
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";
        echo $error;

    }
}