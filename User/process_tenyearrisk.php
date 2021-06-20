<?php
    include("../connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    // print_r($_POST);
    extract($_POST);
    session_start();
    $sql = "select age,gender from user where id = '".$_SESSION['user']."'";
    $res = mysqli_query($conn,$sql);
    if($res)
    {     
        //echo 'first if';
        $nr = mysqli_num_rows($res);    
        if($nr!=0)  
        {    
            //echo 'second if';
            $row = mysqli_fetch_assoc($res);
            /*
                $age = $row['age'];
                $gender = $row['gender'];
                if(strtolower($gender) == 'male')
                {
                    $gender = 1;
                }    
                else if(strtolower($gender) == 'female')
                {
                    $gender = 0;
                }
            */
            $output = shell_exec("python test1.py $age $gender $totcholestrol $systolicbp $smoker $diabetes $medication $cvd");
            // echo $output;
            $output = floatval(trim($output));
            if($output < 30.0)
            {
              echo "<div class='alert alert-success alert-dismissible fade show shadow-sm' role='alert'>  
                     <i class='fa fa-check-circle mr-1'></i> &nbsp; <strong> 
                     Heart status - Healthy </strong> <label>(TenYear Heart Risk - ".$output."%)</label>
                     <button type='button' class='btn-close btn-sm outline-none shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>";
            }
            else if($output >= 30.0)
            {
              echo "<div class='alert alert-danger alert-dismissible fade show shadow-sm' role='alert'>  
                       <i class='fa fa-exclamation-triangle mr-1'></i> &nbsp; 
                       <strong> Heart status - Suffering from Heart Disease </strong> <label>(TenYear Heart Risk - ".$output."%)</label>
                       <button type='button' class='btn-close btn-sm outline-none shadow-none' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            }
        }    
    }
?> 