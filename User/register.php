<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(!empty($_SESSION["user"]))
   {
       echo "<script> location.replace('user.php'); </script>";
   }
   $sql = "select max(id) as new_id from user";
   $res = mysqli_query($conn,$sql);
   $nr = mysqli_num_rows($res);
   $row = mysqli_fetch_assoc($res);
   if($nr==1)
   {
       $new_id = $row['new_id'] + 1; 
   }
   else { $new_id = '101'; } 
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
            #reg_form { padding: 10px 40px;}
            .back { cursor: pointer; }
            form label
            {
                font-size: 14px;
                font-weight: 630px;
            }
            .form-control:focus 
            {
              border-color: #007bff;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 4px rgba(50, 50, 128, 0.6);
            }
            @media (max-width: 1000px) 
            { 
               #reg_form { padding: 10px; margin-top: 15px; }
            }
        </style> 

    </head>
   
    <body class="p-5 bg-danger">

        <?php
            //$output = shell_exec("python temp.py");
            //echo $output;
        ?> 

        <div class="container rounded shadow" style="background-color: #fefefe;">
            <div class="row text-center shadow py-4 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div> 
            <div class="row justify-content-center p-4">
                <div class="back mb-2" onclick="window.history.back();">  
                        <img src="../Images/back_button.jpg" class="rounded" height="25" width="25"  /> 
                        <label class="back text-primary">Back</label>
                </div>
                <div class="row h-100 justify-content-center align-items-center">
                  <div class="col-md-10 mb-0 p-0">        
                    <form method="post" id="reg_form" class="font-weight-bold rounded"> 
                       
                      <div id="response" class="col-md-12 p-2 text-center">  </div>
            
                      <h3 class="mb-4 text-primary font-italic sc text-center">user registration</h3> 
                      <div class="row">
                        
                        <div class="col-md-4 px-4 py-3">      
                            <div class="form-group">                
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm" required /> 
                            </div> 
                        </div>
                
                        <div class="col-md-4 px-4 py-3">      
                            <div class="form-group">                
                                <label>Age</label>
                                <input type="number" id="age" name="age" value="25" min="25" max="60" class="form-control form-control-sm" required />  
                            </div> 
                        </div>
                        
                        <div class="col-md-4 px-4 py-3">      
                            <div class="form-group">   
                               <label>Gender</label> 
                               <select class="form-select form-select-sm form-control" id="gender" name="gender" required>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                               </select>        
                            </div> 
                        </div>
                
                        <div class="col-md-6 px-4 py-3">      
                            <div class="form-group">           
                                <label>Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control form-control-sm" maxlength="10" required /> 
                            </div> 
                        </div>
                
                        <div class="col-md-6 px-4 py-3">      
                            <div class="form-group">  
                                <label>Email ID</label>
                                <input type="text" id="emailid" name="emailid" class="form-control form-control-sm" required />         
                            </div> 
                        </div>


                        <div class="col-md-6 px-4 py-3">      
                            <div class="form-group">
                                <label>User ID</label>
                                <input type="text" class="form-control form-control-sm" id="id" name="id" value="<?php echo $new_id; ?>" readonly>
                            </div> 
                        </div>
                
                        <div class="col-md-6 px-4 py-3">      
                            <div class="form-group"> 
                                <label>Password</label>
                                <div class="input-group"> 
                                    <input type="password" class="form-control form-control-sm" id="pwd" name="pwd" placeholder="" required>
                                    <span class="input-group-text fa fa-eye-slash" id="showhide"></span>  
                                </div>       
                            </div> 
                        </div>
                
                        <div class="col-md-12 px-4 py-3 mb-3">
                             <div class="form-group">    
                                <label>Address</label> </div>  
                                <textarea class="form-control" id="address" name="address" required style="resize: none; height: 100px"></textarea> 
                             </div>    
                        </div>

                        <div class="col-md-12 p-2">      
                            <button type="submit" id="submit" name="submit" size="20" class="btn btn-primary btn-sm"> SIGNUP&nbsp;<i class="fa"></i> </button> 
                        </div>

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
       $.post("process_register.php",dataString,function(res)
       {
          $("#response").html(res);
          window.scrollTo(0,0);
          $("#submit i").removeClass("fa-spinner fa-spin");
          //$('.input').attr('value') == ''
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