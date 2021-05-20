<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include("../connection.php");
    $status="";
    extract($_POST);
    $date = date("Y/m/d"); 
    $time = date("H:i");      
    $sql = "insert into feedback(name,feedback,date,time) values('$name','$feedback','$date','$time')";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        echo "<div class='text-center'>
                  <i class='fa fa-check-circle mb-3' style='font-size:175px; color:#06d19c;'></i>
                  <h4 class='text-muted mb-5'> Thank You!! </h4>
                  <p class='fw-normal fst-italic text-success'> Your response sumbitted successfully. </p> 
               </div>";      
    }
    else
    {
        echo "<div class='text-center'>
              <i class='fa fa-exclamation-triangle text-danger mb-5' style='font-size:150px;'></i>
              <p class='fw-normal fst-italic text-danger'> Feedback submission unsuccessful. </p>
           </div>";      
    }   
?>    