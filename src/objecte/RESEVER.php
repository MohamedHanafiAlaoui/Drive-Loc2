
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/RESEVER.php';

if (isset($_POST['submit'])) {
    
    $adresse = $_POST['address'];
    $times = $_POST['times'];
    $id_user = $_POST['id_user'];
    $id_car = $_POST['id_car'];
    



    $cars = new RESEVER();
    if ($cars ->AJOTERCARRESEVER($adresse, $times, $id_user, $id_car)) {
        header("Location: /car-rent-website-template/index.php");
        exit;
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";

        header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
        exit;
    }
}