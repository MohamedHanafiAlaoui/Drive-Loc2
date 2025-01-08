<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../class/them.php';

if (isset($_POST['submit'])) {
    $thems  = new them();
    $them=$_POST['them'];
    $id_them=$_POST['id_them'];
   var_dump($_POST);
   
 

        
        $result = $thems ->mdfthem($id_them,$them );

        if (!$result) {
            $error = "Failed to add vehicle: " . htmlspecialchars($them );
            var_dump($error);
            header("Location: /pluto-1.0.0/them.php?msg=" . urlencode($error));
            exit;
        }
    

 
    header("Location: /pluto-1.0.0/them.php");
    exit;
}
?>
