<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(empty($_SESSION["user"]))
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
              height: 4px; 
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
              font-size: 11px;
              padding: 24px;
              text-transform: uppercase;
            }
            table::-webkit-scrollbar {
              width: 4px; 
              height: 4px;              /* width of the entire scrollbar */
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
                    <a class="nav-link" href="user.php"> <i class="fas fa-user"></i> User </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="heart_analysis.php"> <i class="fas fa-heartbeat"></i> Heart Analysis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="tenyearrisk.php"> <i class="fas fa-chart-area"></i> TenYear CHD</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-user-md"></i> Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>     

                <div class="table-responsive rounded mt-2 p-0">	
   
                    <?php 
                       error_reporting(E_ALL ^ E_NOTICE);
                       include("../connection.php");
                       $sql = "select * from doctor";
                       $res = mysqli_query($conn,$sql);
                       $nr = mysqli_num_rows($res);
                       if($nr==0)
                       {
                          echo "<p class='text-center text-muted p-5'>No Doctors are available right now!!</p>";
                       }
                       else
                       { 
                         echo "<table class='table table-hover table-bordered m-0'>" ;
                         echo "<tr'> <thead class='thead-dark bg-warning sticky-top'>
                                  <th class='text-center p-3' width='5%'>ID</th>
                                  <th class='text-center p-3' width='15%'>Name</th>
                                  <th class='text-center p-3' width='5%'>Age</th>
                                  <th class='text-center p-3' width='10%'>Gender</th>
                                  <th class='text-center p-3' width='15%'>Specialization</th>
                                  <th class='text-center p-3' width='10%'>Mobile</th>
                                  <th class='text-center p-3' width='15%'>Email</th>
                                  <th class='text-center p-3' width='22%'>Address</th>
                            </thead></tr>";
                         
                         echo "<tbody>";

                         while($row = mysqli_fetch_assoc($res))
                         {
                             $date = str_replace('-','/',$row['date']);
                               echo "<tr>
                                       <th class='text-center p-3' width='5%'>".$row['id']."</th>
                                       <th class='text-center p-3' width='15%'>".$row['name']."</th>
                                       <th class='text-center p-3' width='5%'>".$row['age']."</th>
                                       <th class='text-center p-3' width='10%'>".$row['gender']."</th>
                                       <th class='text-center p-3' width='15%'>".$row['speciality']."</th>
                                       <th class='text-center p-3' width='10%'>".$row['mobile']."</th> 
                                       <th class='text-center p-3' width='15%'>".$row['email']."</th> 
                                       <th class='text-center p-3' width='20%'>".$row['address']."</th>
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