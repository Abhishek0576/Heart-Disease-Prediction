<?php  
    error_reporting(E_ALL ^ E_NOTICE);
    include("../connection.php");
    if($_POST["action"] == "delete")
    {
        $query = "DELETE FROM doctor WHERE id = '".$_POST["id"]."'";
        $res = mysqli_query($conn,$query);
        $nr = mysqli_affected_rows($conn);
        if($nr == 1)
        {
            echo "<h5 class='lead px-2 mb-2'> <i class='fa fa-check-circle text-success mr-1'></i> Record Deleted successfully! </h5>";
            echo "<div class='d-flex flex-row-reverse'> <button class='btn btn-sm btn-danger float-right shadow-none' onclick='location.reload();'>Close</button> </div>";
        }
        else
        {
            echo "<h5 class='lead px-2 mb-2'> <i class='fa fa-times-circle text-danger mr-1'></i> Record Deletion Unsuccessfull! </h5>";
            echo "<div class='d-flex flex-row-reverse'> <button class='btn btn-sm btn-danger float-right shadow-none' onclick='location.reload();'>Close</button> </div>";     
        }
    }
    else
    {
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
    }    
?>