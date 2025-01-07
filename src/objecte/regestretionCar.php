<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/car.php';

if (isset($_POST['submit'])) {
    $cars = new Car();

    foreach ($_POST['vehicles'] as $vehicle) {
        $modele = $vehicle['modele'];
        $id_color = $vehicle['id_color'];
        $prix = $vehicle['prix'];
        $disponibilite = $vehicle['disponibilite'];
        $id_type = $vehicle['id_type'];
        $lieu = $vehicle['lieu'];
        $kilometrage = $vehicle['kilometrage'];
        $description = $vehicle['description'];
        $image = $vehicle['image'];

        // Appeler la méthode pour ajouter le véhicule
        $result = $cars->AJOTERCAR($modele, $id_color, $prix, $disponibilite, $id_type, $lieu, $kilometrage, $image, $description);

        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($modele);
            header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
            exit;
        }
    }

    // Redirection après le succès
    header("Location: /car-rent-website-template/index.php");
    exit;
}
?>
