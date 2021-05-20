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
        <title> Heart Disease Prediction | Admin </title> 
        <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
        <script src="../bootstrap5/js/bootstrap.bundle.js"> </script>
        <link rel="stylesheet" href="../Font-Awesome/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        
        <style>
            body { scroll-behavior: smooth;}
            body::-webkit-scrollbar {
              width: 4px; 
              height: 4px;              /* width of the entire scrollbar */
            }
            .sc { font-variant: small-caps; }
            .card:hover { opacity: 0.8; } 
            #login_form { padding: 45px;}
            .link { cursor: pointer; }
            .form-control:focus 
            {
              border-color: #007bff;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 4px rgba(50, 50, 128, 0.6);
            }
            form label {
              font-weight: 630;
              font-size: 1rem;
              color: #555;
            }
            table { height: 360px; display: block; overflow-y: scroll; }
            th{
              font-weight: 500;
              font-size: 12px;
              text-transform: uppercase;
            }
            td{
              vertical-align:middle;
              font-weight: 300;
              font-size: 12px;
            }
            table::-webkit-scrollbar {
              width: 4px;  
              height: 4px;             /* width of the entire scrollbar */
            }
            
            table::-webkit-scrollbar-track {
              background: white;        /* color of the tracking area */
            }
            
            table::-webkit-scrollbar-thumb {
              background-color: gray;    /* color of the scroll thumb */
              border-radius: 8px;       /* roundness of the scroll thumb */
              border: 1px solid gray;  /* creates padding around scroll thumb */
            }
        </style>  

    </head>
   
    <body class="p-5 bg-danger">

        <?php
            //$output = shell_exec("python temp.py");
            //echo $output;
        ?> 

        <div class="container rounded shadow" style="background-color: #fefefe;"> 
            
            <div class="row text-center shadow py-3 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div>
            
            <div class="row p-5">
                
                <ul class="nav nav-tabs shadow-sm rounded mb-5 p-0">
                  <li class="nav-item">
                    <a class="nav-link" href="admin.php"> <i class="fas fa-user-cog"></i> Admin </a>
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
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>

                <div class="table-responsive rounded mt-2 p-0">	
   
                    <?php 
                       error_reporting(E_ALL ^ E_NOTICE);
                       include("../connection.php");
                       $sql = "select * from feedback";
                       $res = mysqli_query($conn,$sql);
                       $nr = mysqli_num_rows($res);
                       if($nr==0)
                       {
                          echo "<p class='text-center text-muted p-5'>No Feedbacks are available right now!!</p>";
                       }
                       else
                       { 
                         echo "<table class='table table-hover table-bordered m-0'>" ;
                         echo "<tr> <thead class='thead-dark bg-warning sticky-top'>
                                  <th class='text-center px-5 py-3'>ID</th>
                                  <th class='text-center px-5 py-3'>Name</th>
                                  <th class='text-center px-5 py-3'>Feedback</th>
                                  <th class='text-center px-5 py-3'>Date</th>
                                  <th class='text-center px-5 py-3'>Time</th>
                            </thead></tr>";
                         
                         echo "<tbody>";

                         while($row = mysqli_fetch_assoc($res))
                         {
                             $date = str_replace('-','/',$row['date']);
                               echo "<tr>
                                       <th class='text-center px-5 py-3'>".$row['id']."</th>
                                       <th class='text-center px-5 py-3'>".$row['name']."</th>
                                       <th class='text-center px-5 py-3'>".$row['feedback']."</th>
                                       <th class='text-center px-5 py-3'>".$row['date']."</th> 
                                       <th class='text-center px-5 py-3'>".$row['time']."</th> 
                                    </td>   
                                   </tr>";
                         }
                         echo "</tbody> </table>";
                       }   
                      ?>
                </div>
            </div>
         </div>  
    </body>

</html>    
    
