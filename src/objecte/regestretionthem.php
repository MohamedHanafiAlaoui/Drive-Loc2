<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/them.php';

if (isset($_POST['submit'])) {
    $thems  = new them();

    foreach ($_POST['vehicles'] as $vehicle) {
        $them  = $vehicle['modele'];
        var_dump($them);


        // Appeler la méthode pour ajouter le véhicule
        $result = $thems ->AJOTERthem($them );

        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($them );
            header("Location: /pluto-1.0.0/addcar.php?msg=" . urlencode($error));
            exit;
        }
    }

    // Redirection après le succès
    header("Location: /pluto-1.0.0/them.php");
    exit;
}
?>
