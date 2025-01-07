<?php
require_once("../src/class/car.php");




session_start();



if (isset($_SESSION['user_id']) )
{
    header("Location: index.php");
}else {
  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        :root {
            --primary: #EA001E;
            --secondary: #1F2E4E;
            --light: #F2F2F2;
            --dark: #000C21;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            color: var(--secondary);
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-size: 0.875rem;
        }

        input {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid var(--secondary);
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(234, 0, 30, 0.2);
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        .toggle-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--secondary);
            font-size: 0.875rem;
            cursor: pointer;
            transition: color 0.2s;
            text-decoration: underline;
        }

        .toggle-link:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="../src/objecte/Regestratio.php" id="registerForm" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                 <span style="color:#EA001E;"> <?php if(isset($_GET['msg']))
                 {
                    $msg = $_GET['msg'];
                    echo $msg;
                 }?> </span>
                <input type="text" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="registerEmail">Email</label>
                <span style="color:#EA001E;"> <?php if(isset($_GET['msge']))
                 {
                    $msg = $_GET['msge'];
                    echo $msg;
                 }?> </span>
                <input type="email" id="registerEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="registerPassword">Password</label>
                <span style="color:#EA001E;"> <?php if(isset($_GET['msgp']))
                 {
                    $msg = $_GET['msgp'];
                    echo $msg;
                 }?> </span>
                <input type="password" id="registerPassword" name="password" required>
            </div>
            <button type="submit" name="submit">Register</button>
        </form>
        <a href="login.php" class="toggle-link">LOGIN</a>
    </div>

    <script>
        // document.getElementById('registerForm').addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     const formData = new FormData(e.target);
        //     const data = Object.fromEntries(formData);
        //     console.log('Registration submitted:', data);
        //     // Handle registration submission logic here
        // });
    </script>
</body>
</html>