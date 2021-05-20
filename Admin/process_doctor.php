<?php  
    error_reporting(E_ALL ^ E_NOTICE);
    include("../connection.php");
    $status="";
    extract($_POST);       
    $sql = "insert into doctor(name,age,gender,speciality,mobile,email,address) values('$name',$age,'$gender','$speciality','$mobile','$emailid','$address')";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $status = 1;
    } 
    else { $status = 0; }
    echo $status;
?>