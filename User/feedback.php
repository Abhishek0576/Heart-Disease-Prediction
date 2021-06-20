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
        <title> <?php echo $_SESSION["uname"] ?> | Feedback </title> 
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
            #feedback_form { padding: 0px;}
            .link { cursor: pointer; }
            form label {
              font-weight: 630;
              font-size: 14px;
            }
            @media (max-width: 1000px) 
            { 
               #feedback_form { padding: 10px 0px; }
            }
        </style> 

    </head>
   
    <body class="p-5" style="background-color: #ff4d4d;">

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
            
            <div class="row p-5 pb-4">
                
                <ul class="nav nav-tabs shadow-sm rounded mb-3 p-0">
                  <li class="nav-item">
                    <a class="nav-link" href="user.php"> <i class="fas fa-user"></i> User </a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="tenyearrisk.php"> <i class="fas fa-chart-area"></i> TenYear CHD</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="heart_analysis.php"> <i class="fas fa-heartbeat"></i> Heart Analysis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="doctors.php"> <i class="fas fa-user-md"></i> Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul> 

                <div class="row justify-content-center align-items-center" style="margin-top: 40px;">
                    <div class="col-md-5">
                        <form action="" method="post" id="feedback_form" class="rounded text-muted">
                            <h3 class="mb-3 text-center text-primary font-italic sc ">feedback</h3>
                            <div class="form-group mb-4">
                                <label class="mb-1"> Name </label>
                                <input type="text" class="form-control form-control-sm input shadow-none" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-4">    
                                <label class="mb-1"> Feedback/Suggestions </label>
                                <textarea id="feedback" name="feedback" required size="120" maxlength="120" placeholder="" rows="5" class="form-control form-control-sm input shadow-none" required></textarea>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-sm mt-1 mb-0 shadow-sm">SUBMIT <i class="fa"></i></button>
                            </div>
                            <div class="col-md-6">
                              <div class="d-flex flex-row-reverse">
                                <embed src="../Images/feedback1.png" height="100" width="140"/>
                              </div>
                            </div>
                            </div>
                        </form>
                    </div> 
                </div>
                
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content p-1" style="background-color: white;">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-sm btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-5 px-0">
                        <div id="response">  </div>
                    </div>
                  </div>
                </div>
            </div>

    </body>

</html>     


<script>
  $(document).ready(function()
  {     
     $("#feedback_form").on("submit",function(e){
         e.preventDefault();
         $("#submit i").addClass("fa-spinner fa-spin");
         //alert('hello');
         var dataString = $(this).serialize();
         //alert(dataString);
         $.post("process_feedback.php",dataString,function(res)
         {
            $("#response").html(res);
            $("#modal").modal('show');
            window.scrollTo(0,0);
            $("#submit i").removeClass("fa-spinner fa-spin");
            $('input').val('');
            $('textarea').val('');
         });
     });

  });
</script>