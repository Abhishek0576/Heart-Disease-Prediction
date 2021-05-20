<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include("../connection.php");
    $status="";
    extract($_POST);       
    $sql = "insert into user(id,name,pwd,age,gender,mobile,email,address) values('$id','$name','$pwd',$age,'$gender','$mobile','$emailid','$address')";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
      echo "<div class='text-light bg-success alert shadow-sm'>  
             <i class='fa fa-exclamation-triangle mr-1'></i> Registeration Successful!!
         </div>";
    }
    else
    {
      echo "<div class=' text-light bg-warning alert shadow-sm'>  
               <i class='fa fa-exclamation-triangle mr-1'></i> Registration Unsuccessful!!
            </div>";
    }   
?>    