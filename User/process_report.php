<?php
    include("../connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    print_r($_POST);
    extract($_POST);
    session_start();
    
    $sql = "SELECT id from health where id='".$_SESSION['user']."'";
    $res = mysqli_query($conn,$sql);
    $nr = mysqli_num_rows($res);

    if($nr == 0)
    {
        $sql1 = "INSERT INTO health(id,result,score) values('".$_SESSION['user']."','$result','$score')";
        $res1 = mysqli_query($conn,$sql1);
        // if($res1) echo "success";     
        // else echo "failure";
    }
    else if($nr == 1)
    {
        $sql2 = "UPDATE health SET result='$result', score='$score' where id='".$_SESSION['user']."'";
        $res2 = mysqli_query($conn,$sql2);
        // if($res2) echo "success";     
        // else echo "failure";
    }  
?>   