<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require ("../src/class/them.php");
session_start();
if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == 1))
{


}else {
    header("Location: /car-rent-website-template/login.php");
}

session_start();

if (isset($_SESSION['user_id']) )
{
}else {
    header("Location: ../car-rent-website-template/login.php");
}


$them = new them();

$themS = $them->viewthem();




?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="./index.php" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
 
                     </li>
                     <li><a href="widgets.html"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li>
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-car"></i> <span>Elements</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="./addcar.php">> <span>add </span></a></li>
                           <li><a href="./viw.php">> <span>wies </span></a></li>
                        </ul>
                     </li>
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="./RESEVATION.php">> <span>RESEVER</span></a></li>
                           <li><a href="./tags.php">> <span>TAGS</span></a></li>
                           <li><a href="./them.php">> <span>THEME</span></a></li>
                           <li><a href="./ARTICLE.php">> <span>ARTICLE</span></a></li>
                        </ul>
                     </li>
                     <li><a href="../car-rent-website-template/loguot.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Logut</span></a></li>

                   
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
               <div class="container-fluid">
    <form action="../src/objecte/regestretionthem.php" method="post">
        <div id="vehicles-container">
            <!-- Groupe de champs pour un véhicule -->
            <div class="vehicle-group">
                <!-- Model -->
                <div class="mb-3">
                    <label for="modele" class="form-label">Model</label>
                    <input type="text" class="form-control" name="vehicles[0][modele]" required>
                </div>
                
                
                
                <hr>
            </div>
        </div>

        <!-- Boutons -->
        <button type="button" id="add-vehicle" class="btn btn-secondary">Add Another Vehicle</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <hr>

    </form>
</div>

<form action="../src/objecte/editthem.php" method="post">
        <div id="vehicles-container">
            <!-- Groupe de champs pour un véhicule -->
            <div class="vehicle-group">
                <!-- Model -->
                <div class="mb-3">
                    <label for="them" class="form-label">them</label>
                    <input type="text" class="form-control" id = "namethem" name="them" required>
                </div>
                
                <input type="hidden" class="form-control" id="id_them" name="id_them" required>
                
                
                
            </div>
        </div>

        <!-- Boutons -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <hr>

    </form>

<div class="midde_cont">
               <table class="table table-striped table-bordered align-middle" style="margin-top: 20px;">
  <thead class="table-light " >
    <tr>
      <th scope="col">them Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($themS as $thems): ?>

    <tr>

     
    <td> <?=  htmlspecialchars($thems["namethem"])?></td>


         <td>
               <button class="btn btn-success btn-sm me-2 modfier" onclick="modfier('<?php  echo $thems['namethem'];?>', '<?php  echo ($thems['id_them']);?>')"><i class="bi bi-check-circle"></i>  modifier</button>
               <!-- <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i>en_attente</button> -->
         </td>

         

      
    </tr>

 <?php endforeach ?>
  </tbody>
</table>

                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
                  </div>
               </div>
                  <!-- footer -->
                  <div class="container-fluid">
     
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>

<script>
    document.getElementById('add-vehicle').addEventListener('click', function () {
        const container = document.getElementById('vehicles-container');
        const vehicleGroups = container.getElementsByClassName('vehicle-group');
        const index = vehicleGroups.length;

        const newGroup = vehicleGroups[0].cloneNode(true);

       
        const inputs = newGroup.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            const name = input.name.replace(/\[\d+\]/, `[${index}]`);
            input.name = name;

            if (input.id) {
                input.id = input.id.replace(/_\d+$/, `_${index}`);
            }
            input.value = ''; 
        });

        container.appendChild(newGroup);
    });



   
    function modfier(name,id) {

      document.getElementById('namethem').value = name;
      document.getElementById('id_them').value = id ;
      console.log(id);
      
      
    }


</script>
   </body>
</html>