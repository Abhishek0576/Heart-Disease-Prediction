<?php
error_reporting(E_ALL ^ E_NOTICE);
include("../connection.php");
if(isset($_POST))
{  
  if(!empty($_POST['id']) && !empty($_POST['pwd']))
  {     
    $var1=$_POST['id'];  
    $var2=$_POST['pwd'];         
    $sql="SELECT * FROM Admin WHERE id='".$var1."' AND pwd='".$var2."'";

    $res = mysqli_query($conn,$sql);  
    $nr = mysqli_num_rows($res);    
    if($nr!=0)  
    {    
        $row = mysqli_fetch_assoc($res);
        session_start();
        $_SESSION["admin"] = $var1;
        $_SESSION["aname"] = $row['name'];
        echo "<script> location.replace('admin.php'); </script>";
    }     
    else
    {  
        echo "<div class='text-light bg-warning alert shadow-sm'>  
                <i class='fa fa-times-circle mr-1'></i> Incorrect Details 
              </div>";
    }
  }
  else if(empty($_POST['id']) && empty($_POST['pwd']))
  {
    echo "<div class='text-light bg-warning alert shadow-sm'>  
             <i class='fa fa-exclamation-triangle mr-1'></i> Enter ID & Password
         </div>";
  }
  else if(empty($_POST['id'])){
      echo "<div class=' text-light bg-warning alert shadow-sm'>  
               <i class='fa fa-exclamation-triangle mr-1'></i> Enter ID
            </div>";
  }
  else if(empty($_POST['pwd'])){
    echo "<div class='text-light bg-warning alert shadow-sm'>  
              <i class='fa fa-exclamation-triangle mr-1'></i> Enter Password
          </div>";
 }
 
}      
?>    