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
            table { border:1px solid seagreen; height: 380px; display: block; overflow: scroll; }
            th{
              font-weight: 500;
              font-size: 11px;
              padding: 24px;
              text-transform: uppercase;
            }
            td{
              font-weight: 300;
              font-size: 10px;
            }
            table::-webkit-scrollbar {
              width: 4px;    
              height: 4px;           /* width of the entire scrollbar */
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
                    <a class="nav-link"  href="admin.php"> <i class="fas fa-user-cog"></i> Admin </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="doctors.php"> <i class="fas fa-user-md"></i> Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-users"></i> Users</a>
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
                

                <div class="table-responsive-sm rounded mt-2 p-0">	
   
                <?php 
                   error_reporting(E_ALL ^ E_NOTICE);
                   include("../connection.php");
                   $sql = "select * from user";
                   $res = mysqli_query($conn,$sql);
                   $nr = mysqli_num_rows($res);
                   if($nr==0)
                   {
                      echo "<p class='text-center text-muted p-5'>No Users are available right now!!</p>";
                   }
                   else
                   { 
                     echo "<table class='table table-hover table-bordered m-0 rounded'>" ;
                     echo "<tr> <thead class='thead-dark bg-warning sticky-top'>
                              <th class='text-center px-4 py-3'>ID</th>
                              <th class='text-center px-5 py-3'>Name</th>
                              <th class='text-center px-5 py-3'>Age</th>
                              <th class='text-center px-5 py-3'>Gender</th>
                              <th class='text-center px-5 py-3'>Mobile</th>
                              <th class='text-center px-5 py-3'>Email</th>
                              <th class='text-center px-4 py-3'>Address</th>
                              <th class='text-center px-4 py-3'> Action</th>
                        </thead></tr>";
                     
                     echo "<tbody>";
             
                     while($row = mysqli_fetch_assoc($res))
                     {
                         $date = str_replace('-','/',$row['date']);
                           echo "<tr>
                                   <th class='text-center px-4 py-3'>".$row['id']."</th>
                                   <th class='text-center px-5 py-3'>".$row['name']."</th>
                                   <th class='text-center px-5 py-3'>".$row['age']."</th>
                                   <th class='text-center px-5 py-3'>".$row['gender']."</th>
                                   <th class='text-center px-5 py-3'>".$row['mobile']."</th> 
                                   <th class='text-center px-5 py-3'>".$row['email']."</th> 
                                   <th class='text-center px-4 py-3'>".$row['address']."</th>
                                   <th class='text-center px-4 py-3'> 
                                      <div class='btn-group'>   
                                         <a class='btn btn-sm btn-success msg_btn rounded' data-toggle='modal' data-target='#Message_Modal' id='$row[fid]'> <i class='fa fa-comment'></i> </a>
                                         &nbsp;
                                         <a class='btn btn-sm btn-danger del_btn rounded' data-toggle='modal' data-target='#Delete_Modal' id='$row[fid]'> <i class='fa fa-trash'></i> </a>
                                      </div>  
                                   </th>
                                </td>   
                               </tr>";
                     }
                     echo "</tbody> </table>";
                   }   
                  ?>
               </div>
             </div>
         </div>  

         <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               
             <div class="modal-header">
                 <h5 class="modal-title text-center" id="">Doctor details</h5>
                 <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               
               <div class="modal-body border-0">
                 <form class='p-4' id="doctor_form">  
                     <div class="row"> 
                         <div class="form-group mb-4">   
                                     <label class="mb-1"> Name </label>
                                     <input type="text" id="name" name="name" class="form-control form-control-sm" required /> 
                         </div> 
                         <div class="form-group mb-4 col-md-6"> 
                                     <label class="mb-1"> Age </label>
                                     <input type="number" id="age" name="age" min="25" max="60" class="form-control form-control-sm" required /> 
                         </div>     
                         <div class="form-group mb-4 col-md-6">           
                                     <label class="mb-1"> Gender </label>
                                     <select class="form-select form-select-sm form-control" id="gender" name="gender">
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                     </select> 
                         </div>
                         <div class="form-group mb-4">           
                                     <label class="mb-1"> Specialization </label>
                                     <input type="text" id="speciality" name="speciality" class="form-control form-control-sm" required />  
                         </div> 
                         <div class="form-group mb-4">           
                                     <label class="mb-1"> Mobile </label>
                                     <input type="text" id="mobile" name="mobile" class="form-control form-control-sm" maxlength="10" required />  
                         </div>
                         <div class="form-group mb-4">           
                                     <label class="mb-1"> Email ID </label>
                                     <input type="text" id="emailid" name="emailid" class="form-control form-control-sm" required />  
                         </div>
                         <div class="form-group mb-4">    
                                    <label class="mb-1"> Address </label>
                                    <textarea id="address" name="address" required size="120" maxlength="120" placeholder="" rows="6" class="form-control form-control-sm" required></textarea>
                         </div>
                         <div class="form-group d-flex flex-row-reverse">
                              <input type="submit" class="btn-sm shadow-none btn-success mx-1" value="submit" name="submit" />
                              <button type="button" class="btn-sm shadow-none btn-danger mx-1" data-bs-dismiss="modal">Cancel</button>
                         </div>
                    </div>

                  </form>
               </div>

               <div class="modal-footer">
                 
               </div>

             </div>
           </div>
         </div>
    </body>

</html>    
    
