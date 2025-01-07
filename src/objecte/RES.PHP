<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/ratin.php';

var_dump('fffffffffffff');

if (isset($_POST['submit'])) {
    $id_car = $_POST['idcar'];
    $iduser = $_POST['iduser'];
    $id_ratin = $_POST['id_ratin'];



    $cars = new RatinUser();
    if ($cars ->AJOTERRatin($id_car, $iduser, $id_ratin)) {
        header("Location: /car-rent-website-template/index.php");
        exit;
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";

        header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
        exit;
    }
}