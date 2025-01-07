<?php



error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/RESEVER.php';



if ( isset($_GET['id']) && isset($_GET['nm'])) {
    $id_Reserve = $_GET['id'];
    $statut = $_GET['nm'];



    $cars = new RESEVER();
    if ($cars -> mdfRE($id_Reserve,$statut)){
        header("Location: /car-rent-website-template/index.php");
        
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";

        header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
        exit;
    }
}