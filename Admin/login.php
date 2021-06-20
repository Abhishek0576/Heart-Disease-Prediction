<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(!empty($_SESSION["admin"]))
   {
       echo "<script> location.replace('admin.php'); </script>";
   }
?>

<html>
  
    <head> 
        <title> Admin | Login </title> 
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
            .back { cursor: pointer; }
            @media (max-width: 1000px) 
            { 
               #login_form { padding: 20px 30px; margin-top: 15px; }
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
            <div class="row justify-content-center p-4">
                <div class="back" onclick="location.href = '../index.php';">  
                        <img src="../Images/back_button.jpg" class="rounded" height="25" width="25"  /> 
                        <label class="text-primary back">Back</label>
                </div>
                <div class="row h-100 justify-content-center align-items-center p-2 mb-2">
                    <div class="col-10 col-md-6 col-lg-4 p-0">
                        <div id="response" class="text-center my-4">  </div>
                        <form action="" method="post" id="login_form" class="font-weight-bold text-muted shadow rounded">
                            <h3 class="mb-5 text-center text-primary font-italic sc">admin login</h3>
                            <div class="form-group mb-3 py-2">
                                <h6 for="username" class="mb-2"><b>Admin ID</b></h6>
                                <input type="text" class="form-control form-control-sm shadow-none" id="id" name="id">
                            </div>
                            <div class="form-group mb-2 py-2">
                                <h6 for="password" class="mb-2"><b> Password </b><i class="fa fa-eye-slash ml-1" id="showhide"></i> </h6>
                                <input type="password" class="form-control form-control-sm shadow-none" id="pwd" name="pwd">
                            </div>
                            <div class="d-flex flex-row-reverse mt-4 mb-1">
                                <button type="submit" name="submit" class="btn btn-primary btn-block btn-sm shadow">LOGIN <i class="fa"></i></button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
         </div>  
    
    </body> 


<script>
$(document).ready(function(){
   $("form").on("submit",function(e)
   {
       e.preventDefault();
       $("#submit i").addClass("fa-spinner fa-spin");
       $("#response").show(200);
       var dataString = $(this).serialize();
       //alert(dataString);
       $.post("process_login.php",dataString,function(res){
          $("#response").html(res);
          $("#submit i").removeClass("fa-spinner fa-spin");
       });
   });
   
   $("#showhide").on("click",function(){
    var input = document.getElementById('pwd');
    if(input.type=="password")
    {
      input.type = "text";
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    }
    else 
    {
      input.type = "password";
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    }
   });

   $("#forgot").on("click",function(){
   });

});
</script>

</html>