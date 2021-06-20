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
        <title> Admin | TrainingData Details </title> 
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
            th{
              font-weight: 650;
              font-size: 12px;
              text-transform: uppercase;
              text-align: center;
              padding: 50px;
              color: #555;
            }
            td{
              font-weight: 300;
              font-size: 13px;
              text-align: center;
            }

            table { 
              border: 0.5px solid gray; 
              height: 380px; 
              overflow: scroll; 
              border-radius: 5px; 
              scroll-behavior: smooth; 
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
   
    <body class="p-5" style="background-color: #ff4d4d;"> 

        <div class="container rounded shadow" style="background-color: #fefefe;"> 
            
            <div class="row text-center shadow py-3 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div>
            
            <div class="row p-5">

                <ul class="nav nav-tabs shadow-sm rounded mb-5">
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
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-table"></i> Training Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>
                
                <div class="d-flex flex-row-reverse"> 
                      <form id="form">
                          <select id="select_tdata" class="form-select form-select-sm shadow-none">
                              <option value="heart_statlog_cleveland_hungary_final.csv">1.&nbsp; Heart Analysis Dataset</option>
                              <option value="framingham.csv">2.&nbsp; Ten Year CHD &nbsp;Dataset</option>
                          </select>
                      </form>
                </div>

                <div class="rounded d-flex justify-content-center" id="tData1"> 
                    <?php
                        include('tdata1.html');
                    ?>
                </div>

                <div class="rounded d-flex justify-content-center d-none" id="tData2"> 
                    <?php
                        include('tdata2.html');
                    ?>
                </div>
            
            </div>
         </div>  
    
         <div class="modal fade" id="LoadingModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content border-0" style="background-color: transparent;">
              <div class="modal-body text-center">
                 <embed src="../Images/loading.gif" class="img-fluid" height="125" width="125">
              </div>
            </div>
          </div>
        </div>

    </body> 

</html>

<script>
$(document).ready(function()
{    
    $('#LoadingModal').modal({
        backdrop: 'static',
        keyboard: false,
    });

    $("#select_tdata").change(function()
    {
       var tableName = $.trim($("#select_tdata option:selected").val());
       if(tableName === 'heart_statlog_cleveland_hungary_final.csv')
       {
          $("#tData1").removeClass('d-none');
          $("#tData2").addClass('d-none');
       }
       else
       {
          $("#tData2").removeClass('d-none');
          $("#tData1").addClass('d-none');
       }
    });
});      
</script>
