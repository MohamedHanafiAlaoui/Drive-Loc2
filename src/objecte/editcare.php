<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../class/car.php';



if (isset($_POST['submit'])) {
    $id_car = $_POST['id_car'];
    $modele = $_POST['modele'];
    $id_color = $_POST['id_color'];
    $prix = $_POST['prix'];
    $disponibilite = $_POST['disponibilite'];
    $id_type = $_POST['id_type'];
    $lieu = $_POST['lieu'];
    $kilometrage = $_POST['kilometrage'];
    $description = $_POST['description'];
    $image=$_POST['image'];


    $cars = new Car();
    if ($cars ->mdfcar($id_car, $modele, $id_color, $prix, $disponibilite, $id_type, $lieu, $kilometrage)) {
        header("Location: /car-rent-website-template/index.php");
        exit;
    } else {
        $error = "Inscription échouée. Veuillez réessayer.";

        header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
        exit;
    }
}