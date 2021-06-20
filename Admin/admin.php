<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(empty($_SESSION["admin"]))
   {
       echo "<script> location.replace('login.php'); </script>";
   }
?>

<html>
  
    <head> 
        <title> Admin </title> 
        <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
        <script src="../bootstrap5/js/bootstrap.bundle.js"> </script>
        <link rel="stylesheet" href="../Font-Awesome/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        
        <style>
            .sc { font-variant: small-caps; }
            .card:hover { opacity: 0.8; } 
            #login_form { padding: 45px;}
            .back { cursor: pointer; }
            @media (max-width: 576px) 
            { 
               #login_form { padding: 20px; }
            }
        </style> 

    </head>
   
    <body class="p-5" style="background-color: #ff4d4d;">

        <?php
            $output =  shell_exec("python temp.py");
        ?> 

        <div class="container rounded shadow" style="background-color: #fefefe;"> 
            
            <div class="row text-center shadow py-3 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div>
            
            <div class="row p-5">
                
                <div class="col-md-12 d-none">
                    <label class="text-right">
                    <?php 
                         echo "Last Login: ".date("F d Y H:i:s", fileatime("admin.php"));   
                    ?>
                    </label>
                </div>

                <ul class="nav nav-tabs shadow-sm rounded">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-user-cog"></i> Admin </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="doctors.php"> <i class="fas fa-user-md"></i> Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="users.php"> <i class="fas fa-users"></i> Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="training_data.php"> <i class="fas fa-table"></i> Training Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>
                
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-10 col-md-6 col-lg-4 p-0">
                                        
                    </div>
                </div>
            
            </div>
         </div>  
    
    </body> 

</html>