


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/car.php';



if (isset($_GET['id'])) {
    $id_car = $_GET['id']*1;



    $cars = new Car();
    if ($cars ->SUprimerCar($id_car)) {
        header("Location: /pluto-1.0.0/viw.php");
        exit;
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";
        echo $error;
        // exit;
        // header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
        // exit;
    }
}