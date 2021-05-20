<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(!empty($_SESSION["user"]))
   {
       echo "<script> location.replace('user.php'); </script>";
   }
?>

<html>
  
    <head> 
        <title> Heart Disease Prediction | Home </title> 
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
            #login_form { padding: 45; }
            .back { cursor: pointer; }
            @media (max-width: 1000px) 
            { 
               #login_form { padding: 25px 20px; }
            }
        </style> 

    </head>
   
    <body class="p-5 bg-danger">

        <?php
            //$output = shell_exec("python temp.py");
            //echo $output;
        ?> 

        <div class="container rounded shadow" style="background-color: white;">
            <div class="row text-center shadow py-4 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div> 
            <div class="row justify-content-center p-4">
                <div class="back" onclick="location.href = '../index.php';">  
                        <img src="../Images/back_button.jpg" class="rounded" height="25" width="25"  /> 
                        <label class="back text-primary">Back</label>
                </div>
                <div class="row h-100 justify-content-center align-items-center p-2 mb-2">
                    <div class="col-10 col-md-6 col-lg-4 p-0">
                        <form action="" method="post" id="login_form" class="font-weight-bold text-muted shadow border border-white rounded">
                            <div id="response" class="text-center my-4">  </div>
                            <h3 class="mb-5 text-center text-primary font-italic sc">user login</h3>
                            <div class="form-group mb-3 py-2">
                                <label for="username" class="mb-2 fw-bolder"> User ID </label>
                                <input type="text" class="form-control form-control-sm shadow-none" id="id" name="id">
                                <div class="invalid-feedback fd1 d-none">
                                  Please enter user id
                                </div>
                            </div>
                            <div class="form-group mb-2 py-2">
                                <label for="password" class="mb-2 fw-bolder"> Password <i class="fa fa-eye-slash ml-1" id="showhide"></i> </label>
                                <input type="password" class="form-control form-control-sm shadow-none" id="pwd" name="pwd">
                                <div class="invalid-feedback fd2 d-none">
                                  Please enter password
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse mb-2"> 
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-sm shadow mt-3">LOGIN <i class="fa"></i></button>
                            </div>  
                            <div class=""> 
                                <label class=""> <a href="register.php" class="text-danger sc">Create account</a></label> 
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
       $("#response").show(200);
       var dataString = $(this).serialize();
       //alert(dataString);
       $.post("process_login.php",dataString,function(res)
       {
          
          $(".fd1").addClass("d-none");
          $("#id").removeClass("is-invalid"); 
          $(".fd2").addClass("d-none");
          $("#pwd").removeClass("is-invalid");
          
          if(res.includes("enter id & pwd"))
          {
              $(".fd1").removeClass("d-none");
              $("#id").addClass("is-invalid");
              $(".fd2").removeClass("d-none");
              $("#pwd").addClass("is-invalid");
          }
          else if(res.includes("enter id"))
          {
              $(".fd1").removeClass("d-none");
              $("#id").addClass("is-invalid");
          }
          else if(res.includes("enter password"))
          {
              $(".fd2").removeClass("d-none");
              $("#pwd").addClass("is-invalid");
          }  

          else 
          {
            $("#response").html(res);
          }

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