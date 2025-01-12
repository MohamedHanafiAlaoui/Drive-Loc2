<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/tags.php';

if (isset($_POST['submit'])) {
    $tag  = new tags();

    foreach ($_POST['vehicles'] as $vehicle) {
        $them  = $vehicle['modele'];

  
        // Appeler la méthode pour ajouter le véhicule
        $result = $tag ->AJOTERtags($them );

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
