<?php
    include("../connection.php");
    session_start();
    extract($_POST); 
    $sql = "update user set name='$name', age=$age, gender='$gender', email='$email', mobile='$mobile', address='$address' where id = '".$_SESSION["user"]."'";    
    $res = mysqli_query($conn,$sql);
    if($res)
    {
      echo "<div class='text-light bg-success alert shadow-sm'>  
             <i class='fa fa-check-circle mr-1'></i> Profile Updation Successful!!
         </div>";
    }
    else
    {
      echo "<div class=' text-light bg-warning alert shadow-sm'>  
               <i class='fa fa-exclamation-triangle mr-1'></i> Profile Updation Unsuccessful!!
            </div>";
    }   
?>    