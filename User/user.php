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
        <title> <?php echo $_SESSION["uname"] ?> | Profile </title> 
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
            .profile-img img{
                width: 50%;
                height: 40%;
            }
            .profile-head h5{
                color: #333;
            }
            .profile-edit-btn{
                border: none;
                border-radius: 1.5rem;
                width: 50%;
                padding: 2%;
                font-weight: 600;
                color: #6c757d;
                cursor: pointer;
            }
            .proile-rating{
                font-size: 12px;
                color: #818182;
            }
            .proile-rating span{
                color: #495057;
                font-size: 15px;
                font-weight: 600;
            }
            .profile-work a{
                text-decoration: none;
                color: #495057;
                font-weight: 600;
                font-size: 14px;
            }
            .profile-work ul{
                list-style: none;
            }
            .profile-tab label{
                font-weight: 400;
            }
            .profile-tab p{
                font-weight: 500;
                color: #0062cc;
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
                
                <ul class="nav nav-tabs shadow-sm rounded mb-5 p-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-user"></i> User</a>
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
                    <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul> 
                
                <?php 
                   
                    $sql = "select * from user where id = '".$_SESSION['user']."'";
                    $sql1 = "select score, result from health where id = '".$_SESSION['user']."'";
                    
                    $res = mysqli_query($conn,$sql);
                    
                    $res1 = mysqli_query($conn,$sql1);
                    
                    $nr = mysqli_num_rows($res);
                    if($nr == 1)
                    {  
                        $row = mysqli_fetch_assoc($res);
                        if($row['gender']=='Male')
                        {
                          $gender = 1;
                        }  
                        else if($row['gender']=='Female')
                        {
                          $gender = 0;  
                        }
                    } 
                   
                    $nr1 = mysqli_num_rows($res1);
                    $score = '';
                    $result = '';
                    
                    if($nr1 == 1)
                    {
                        $row1 = mysqli_fetch_assoc($res1);
                        $result = $row1['result'];
                        $score = $row1['score'];
                    }                    
                    
                ?>
                
                <div class="container rounded">
                    <div class="row justify-content-center px-0 py-3">
                        <div class="col-md-5">
                            <div class="text-center p-4">
                                <?php 
                                    if($gender == 1) 
                                       echo "<img src='../Images/male_user.jpg' alt='' height='200px' width='190px'/>";
                                    else 
                                       echo "<img src='../Images/female.jpg' height='180px' width='190px' alt=''/>";   
                                ?>     
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-sm btn-outline-success shadow-none" name="btnAddMore" onclick="location.href='editProfile.php';"> <i class="fas fa-edit"></i> Edit Profile</button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row p-3">
                                    <h4 class="text-primary mb-2">
                                        <?php echo $row['name']; ?>
                                    </h4>  
                                    <p class="proile-rating"> 
                                        Last Risk Score:  &nbsp; <span> <?php echo $score."&nbsp;&nbsp;"; ?> </span> <br>
                                        Last Test Result: &nbsp; 
                                        <span> 
                                            <?php 
                                                if($result == "POSITIVE")
                                                {
                                                    echo "<small class='text-danger'><b>".$result."</b></small>";  
                                                }
                                                else
                                                {
                                                    echo "<small class='text-success'><b>".$result."</b></small>";
                                                }  
                                            ?> 
                                        </span> 
                                    </p>
                            </div>
                            <div class="tab-content profile-tab" id="myTabContent">
                               <div class="tab-pane fade show active px-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     
                                     <div class="row">
                                        <div class="col-md-6">
                                             <label>ID</label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $_SESSION['user']; ?> </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label>Age</label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $row['age']; ?> </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label>Gender</label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $row['gender']; ?> </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label>Email</label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $row['email']; ?> </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label>Phone</label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $row['mobile']; ?> </p>
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <label> Address </label>
                                         </div>
                                         <div class="col-md-6">
                                             <p> <?php echo $row['address']; ?> </p>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                  </div>  
              </div>  
          </div>
       </div>
  </body>

</html>        