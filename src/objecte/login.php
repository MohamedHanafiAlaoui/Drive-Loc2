<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



require_once '../class/user.php';



if (isset($_POST["submit"])) {
   
    $nameError = $emailError = $passwordError = "";
    $isValid = true;
    $email = $_POST["email"];
    $password = $_POST["password"];
  
    if (empty($email)) {
        $emailError = "L'email est requis.";
        $isValid = false;

    } else {
        $email = trim($email);
        $email = htmlspecialchars($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Veuillez entrer un email valide.";
            header("Location: /car-rent-website-template/Registration.php?msge=$emailError");
            $isValid = false;
            exit;
        }
    }

    
    if (empty($password)) {
        $passwordError = "Le mot de passe est requis.";
        $isValid = false;
    } else {
        if (strlen($password) < 8) {
            $passwordError = "Le mot de passe doit contenir au moins 8 caractères.";
            header("Location: /car-rent-website-template/Registration.php?msgp=$emailError");
            $isValid = false;
            exit;
        } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
            $passwordError = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, et un chiffre.";
            header("Location: /car-rent-website-template/Registration.php?msgp=$emailError");

            $isValid = false;
        }
    }

    
    if ($isValid) {
        

        $users = new User();
        if ($users->Login( $email, $password)) {
            header("Location: /car-rent-website-template/index.php");
            exit;
        } else {
            $error = "Inscription échouée. Veuillez réessayer.";
            header("Location: /car-rent-website-template/login.php?msg=" . urlencode($error));
            exit;
        }
        
    }
}

