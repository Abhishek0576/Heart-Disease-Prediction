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
             height: 4px;              /* width of the entire scrollbar */
           }
           .sc { font-variant: small-caps; }
           .title1 
           {  
             position: relative;
             pointer-events: none; 
             font-variant: small-caps; 
             font-weight: 600;
             font-size: 21.5px;
             color: #343642;
           } 
           .title1:after
           {
             content: '';
             display: block;
             width: 50px;
             height: 2.5px;
             background: #018edf;
             position: absolute;
             left: 1px;
             bottom: -4px;
           }
           .card:hover { opacity: 0.8; } 
           #analysis_form { padding: 10px 40px;}
           .back { cursor: pointer; }
           form label{
               font-size: 14px;
               font-weight: 400;
           }
           .btn:focus,.btn:active
           {
             border-color: none;
             box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 4px rgba(50, 50, 128, 0.6);
             outline: none;
           }
           table {
              border-collapse: collapse;
              margin: 10px 40px;
           }
           td, th { padding: 10px; }
           td.a { width: 40%; }
           td.c { width: 50%; }

           @media (max-width: 1000px) 
           { 
              #analysis_form { padding: 0px; margin-top: 15px; }
              label { margin-bottom: 5px; }
           }
       </style> 
    
    </head>

    <body class="p-5 bg-danger">
        <div class="container rounded shadow" style="background-color: #fefefe;"> 
            
            <div class="row text-center shadow py-3 rounded">
                <div class="col align-self-center">     
                    <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                    <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                </div>
            </div>
            
            <div class="row p-5">
                
                <ul class="nav nav-tabs shadow-sm rounded mb-5 p-0" >
                    <li class="nav-item">
                      <a class="nav-link" href="user.php"> <i class="fas fa-user"></i> User</a>
                    </li>  
                    <li class="nav-item">
                      <a class="nav-link" href="heart_analysis.php"> <i class="fas fa-heartbeat"></i> Heart Analysis</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page"> <i class="fas fa-chart-area"></i> TenYear CHD</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="doctors.php"> <i class="fas fa-user-md"></i> Doctors</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul> 
                
                <div class="row justify-content-center align-items-center mt-4">
                    <div class="col-md-8 p-0">
                        <form action="" method="post" id="analysis_form" class="">
                           
                            <div id="response" class="p-0 mb-1 text-center">  </div>

                                <div class="form-group p-4 py-0">
                                    <h3 class="mb-4 mt-4 title1">10year heart risk</h3> 
                                </div>

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Gender</label>             
                                        </div>
                                        <div class="col-md-6">
                                                <input type="radio" name="gender" id="male" value="1" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-danger shadow-none px-4" for="male">Male</label>
                                                <input type="radio" name="gender" id="female" value="0" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success shadow-none px-4" for="female">Female</label>
                                        </div>
                                    </div>  
                                </div> 
    
                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Age</label>             
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">  
                                              <input type="number" id="age" name="age" min="30" max="79" maxlength="2" class="form-control form-control-sm shadow-none" required>
                                              <span class="input-group-text">years</span>
                                            </div> 
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Total Cholesterol</label>             
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">  
                                                <input type="number" id="totcholestrol" name="totcholestrol" maxlength="3" placeholder="Norm: 150-200" class="form-control form-control-sm  shadow-none" required>
                                                <span class="input-group-text"><small>mg/dL</small></span>
                                            </div> 
                                        </div>
                                    </div>  
                                </div> 

                                <!-- <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>HDL Cholesterol</label>             
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">  
                                                <input type="number" id="hdlcholestrol" name="hdlcholestrol" maxlength="3" placeholder="" class="form-control form-control-sm  shadow-none" required>
                                                <span class="input-group-text"><small>mg/dL</small></span>
                                            </div> 
                                        </div>
                                    </div>  
                                </div> --> 
    
                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Systolic Blood Pressure</label>             
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-group-sm">  
                                                <input type="number" id="systolicbp" name="systolicbp" maxlength="3" placeholder="Norm: 100-120" class="form-control form-control-sm  shadow-none" required>
                                                <span class="input-group-text"><small>mm Hg</small></span>
                                            </div> 
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Smoker</label>             
                                        </div>
                                        <div class="col-md-6">
                                                <input type="radio" name="smoker" id="smoking" value="1" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-danger shadow-none px-4" for="smoking">Yes</label>
                                                <input type="radio" name="smoker" id="nonsmoking" value="0" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success shadow-none px-4" for="nonsmoking">No</label>
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Diabetic</label>             
                                        </div>
                                        <div class="col-md-6">
                                                <input type="radio" name="diabetes" id="diabetic" value="1" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-danger shadow-none px-4" for="diabetic">Yes</label>
                                                <input type="radio" name="diabetes" id="nondiabetic" value="0" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success shadow-none px-4" for="nondiabetic">No</label>
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Blood pressure being treated with medicines</label>             
                                        </div>
                                        <div class="col-md-6">
                                                <input type="radio" name="medication" id="medicating" value="1" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success shadow-none px-4" for="medicating">Yes</label>
                                                <input type="radio" name="medication" id="nonmedicating" value="0" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-danger shadow-none px-4" for="nonmedicating">No</label>
                                        </div>
                                    </div>  
                                </div> 

                                <div class="form-group p-4">
                                    <div class="row">   
                                        <div class="col-md-6 align-self-center">
                                            <label>Known Vascular Disease (CAD, PVD, Stroke)</label>             
                                        </div>
                                        <div class="col-md-6">
                                                <input type="radio" name="cvd" id="known" value="1" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-danger shadow-none px-4" for="known">Yes</label>
                                                <input type="radio" name="cvd" id="unknown" value="0" class="btn-check" autocomplete="off">
                                                <label class="btn btn-sm btn-outline-success shadow-none px-4" for="unknown">No</label>
                                        </div>
                                    </div>  
                                </div>

                                <div class="form-group p-4 mb-2">
                                    <div class="d-flex flex-row-reverse"> 
                                          <button type="submit" id="submit" name="submit" size="" class="btn btn-sm btn-primary shadow-none"> SUBMIT&nbsp;<i class="fa"></i> </button> 
                                    </div> 
                                </div>
    
                            </div> 
                            
                        </form>
                    </div>        
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

$(document).ready(function(){
   
   $('#LoadingModal').modal({
        backdrop: 'static',
        keyboard: false,
   });

   $("form").on("submit",function(e)
   {
       e.preventDefault();
       $("#response").hide();
       var dataString = $(this).serialize();

       // alert(dataString);

       $("#submit i").addClass("fa-spinner fa-spin");
       $("#LoadingModal").modal('show');

       $.post("process_tenyearrisk.php",dataString,function(res)
       {
              // alert(res);
              $("#LoadingModal").modal('hide');
              $("#submit i").removeClass("fa-spinner fa-spin");
              window.scrollTo(0,0);
              $("#response").html(res).show();
       });
   });
   
});
</script>   

