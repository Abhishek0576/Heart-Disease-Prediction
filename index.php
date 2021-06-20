<html>
  
    <head> 
        <title> Heart Disease Prediction | Home </title> 
        <link rel="stylesheet" href="./bootstrap5/css/bootstrap.min.css">
        <script src="./bootstrap5/js/bootstrap.bundle.js"> </script>

        <style>
            body { scroll-behavior: smooth;}
            body::-webkit-scrollbar {
              width: 4px; 
              height: 4px;              /* width of the entire scrollbar */
            }
             .sc { font-variant: small-caps;  }
             a { text-decoration: none; }
             .option:hover { opacity: 0.6; cursor: pointer; } 
        </style> 

    </head>
   
    <body class="p-5" style="background-color: #ff4d4d;">
        
        <div class="container mb-4 shadow rounded" style="background-color: white;">
            <div class="row text-center py-3">
                <div class="col p-0 ">     
                        <embed src="./Images/check_heart3.jpg" class="rounded mx-auto d-block mb-2" height="250" style="opacity:0.8;" />
                </div>   
                <div class="col align-self-center">     
                        <h2 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h2>
                        <label> <i> Know your disease - Save your life </i> </label>
                </div>
            </div>    
        </div>   

        <div class="container shadow rounded" style="background-color: white;">
            <div class="row text-center justify-content-center px-4 py-5">
                <h4 class="mb-4 sc text-secondary"> login portal </h4>
                <div class="col-md-4 shadow m-3 p-4 rounded option" onclick="location.href = 'Admin/login.php';"> 
                            <img src="./Images/admin1.jpg" height="100" width="140" /> 
                            <h5 class="text-secondary sc">  admin login  </h5> 
                </div>
                <div class="col-md-4 shadow m-3 p-4 rounded option" onclick="location.href = 'User/login.php';">  
                        <a href="User/login.php" class="mb-1"> 
                            <img src="./Images/user.jpg" height="100" width="140" /> 
                            <h5 class="text-secondary sc">  user login  </h5> 
                        </a>
                </div>
            </div>    
        </div> 

    </body> 
   
</html>