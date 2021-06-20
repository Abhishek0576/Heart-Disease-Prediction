<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(empty($_SESSION["admin"]))
   {
       echo "<script> location.replace('login.php'); </script>";
   }
?>

<html>
  
    <head> 
        <title> Admin | Doctors Details </title> 
        <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
        <script src="../bootstrap5/js/bootstrap.bundle.js"> </script>
        <link rel="stylesheet" href="../Font-Awesome/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        
        <style>
            body { scroll-behavior: smooth;}
            body::-webkit-scrollbar {
              width: 4px; 
              height: 4px;              /* width of the entire scrollbar */
            }
            .sc { font-variant: small-caps; }
            .card:hover { opacity: 0.8; } 
            #login_form { padding: 45px;}
            .link, span { cursor: pointer; }
            form label {
              font-weight: 630;
              font-size: 14px;
              color: #555;
            }
            table { border:1px solid seagreen; height: 360px; display: block; overflow-y: scroll; }

            th{
              font-weight: 500;
              font-size: 11px;
              padding: 25px;
              text-transform: uppercase;
              color: #555;
            }
            td{
              font-weight: 300;
              font-size: 10px;
            }
            table::-webkit-scrollbar {
              width: 4px;    
              height: 4px;               /* width of the entire scrollbar */
            }
            
            table::-webkit-scrollbar-track {
              background: white;        /* color of the tracking area */
            }
            
            table::-webkit-scrollbar-thumb {
              background-color: gray;    /* color of the scroll thumb */
              border-radius: 8px;       /* roundness of the scroll thumb */
              border: 1px solid gray;  /* creates padding around scroll thumb */
            }
            #addModal label 
            {  
                font-weight: normal;  
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
                
                <ul class="nav nav-tabs shadow-sm rounded mb-4 p-0">
                  <li class="nav-item">
                    <a class="nav-link"  href="admin.php"> <i class="fas fa-user-cog"></i> Admin </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page"> <i class="fas fa-user-md"></i> Doctors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="users.php"> <i class="fas fa-users"></i> Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="training_data.php"> <i class="fas fa-table"></i> Training Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="feedback.php"> <i class="fas fa-comment-dots"></i> Feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
                </ul>
                

                <div class="d-flex flex-row-reverse p-0 mt-2 mb-2"> 
                      <span class="badge bg-primary p-2" data-bs-toggle="modal" data-bs-target="#addModal">
                            <b> <i class="fas fa-plus-square rounded"></i> &nbsp;Doctor </b> 
                      </span>
                </div>

                <div class="table-responsive rounded p-0">	
   
                    <?php 
                       error_reporting(E_ALL ^ E_NOTICE);
                       include("../connection.php");
                       $sql = "select * from doctor";
                       $res = mysqli_query($conn,$sql);
                       $nr = mysqli_num_rows($res);
                       if($nr==0)
                       {
                          echo "<p class='text-center text-muted p-5'>No Doctors are available right now!!</p>";
                       }
                       else
                       { 
                         echo "<table class='table table-hover table-bordered m-0'>" ;
                         echo "<tr> <thead class='bg-warning sticky-top'>
                                  <th class='text-center px-4 py-3'>ID</th>
                                  <th class='text-center px-5 py-3'>Name</th>
                                  <th class='text-center px-4 py-3'>Age</th>
                                  <th class='text-center px-4 py-3'>Gender</th>
                                  <th class='text-center px-4 py-3'>Specialization</th>
                                  <th class='text-center px-4 py-3'>Mobile</th>
                                  <th class='text-center px-4 py-3'>Email</th>
                                  <th class='text-center px-4 py-3'>Address</th>
                                  <th class='text-center px-4 py-3'>Action</th>
                            </thead></tr>";
                         
                         echo "<tbody>";

                         while($row = mysqli_fetch_assoc($res))
                         {
                             $date = str_replace('-','/',$row['date']);
                               echo "<tr>
                                       <th class='text-center px-4 py-3'>".$row['id']."</th>
                                       <th class='text-center px-5 py-3'>".$row['name']."</th>
                                       <th class='text-center px-4 py-3'>".$row['age']."</th>
                                       <th class='text-center px-4 py-3'>".$row['gender']."</th>
                                       <th class='text-center px-4 py-3'>".$row['speciality']."</th>
                                       <th class='text-center px-4 py-3'>".$row['mobile']."</th> 
                                       <th class='text-center px-4 py-3'>".$row['email']."</th> 
                                       <th class='text-center px-4 py-3'>".$row['address']."</th>
                                       <th class='text-center px-4 py-3'> 
                                          <div class='btn-group'>  
                                             <a class='btn btn-sm btn-danger del_btn rounded' data-bs-toggle='modal' data-bs-target='#delModal' id='$row[id]'> <i class='fa fa-trash'></i> </a>
                                          </div>  
                                       </th>
                                    </td>   
                                   </tr>";
                         }
                         echo "</tbody> </table>";
                       }   
                      ?>
                </div>
            </div>
         </div>  

         <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               
             <div class="modal-header">
                 <h6 class="modal-title text-secondary" id="">Doctor details</h6>
                 <button type="button" class="btn-close btn-sm shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               
               <div class="modal-body">
                 <form class='p-3' id="doctor_form">  
                     <div class="row"> 
                         <div class="form-group mb-4">   
                                     <label class="mb-1"> Name </label>
                                     <input type="text" id="name" name="name" class="form-control form-control-sm shadow-none" required /> 
                         </div> 
                         <div class="form-group mb-4 col-md-6"> 
                                     <label class="mb-1"> Age </label>
                                     <input type="number" id="age" name="age" min="25" max="60" class="form-control form-control-sm shadow-none" required /> 
                         </div>     
                         <div class="form-group mb-4 col-md-6">           
                                     <label class="mb-1"> Gender </label>
                                     <select class="form-select form-select-sm form-control shadow-none" id="gender" name="gender">
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                     </select> 
                         </div>
                         <div class="form-group mb-4">           
                                     <label class="mb-1"> Specialization </label>
                                     <input type="text" id="speciality" name="speciality" class="form-control form-control-sm shadow-none" required />  
                         </div> 
                         <div class="form-group mb-4 col-md-6">           
                                     <label class="mb-1"> Mobile </label>
                                     <input type="text" id="mobile" name="mobile" class="form-control form-control-sm shadow-none" maxlength="10" required />  
                         </div>
                         <div class="form-group mb-4 col-md-6">           
                                     <label class="mb-1"> Email ID </label>
                                     <input type="text" id="emailid" name="emailid" class="form-control form-control-sm shadow-none" required />  
                         </div>
                         <div class="form-group mb-4">    
                                    <label class="mb-1"> Address </label>
                                    <textarea id="address" name="address" required size="120" maxlength="120" placeholder="" rows="6" class="shadow-none form-control form-control-sm" required></textarea>
                         </div>
                         <div class="form-group d-flex flex-row-reverse">
                              <input type="submit" class="btn-sm shadow-none btn-success mx-1" value="Submit" name="submit" />
                              <button type="button" class="btn-sm shadow-none btn-danger mx-1" data-bs-dismiss="modal">Cancel</button>
                         </div>
                    </div>

                  </form>
               </div>

               <div class="modal-footer border-0">
                 
               </div>

             </div>
           </div>
         </div>


         <div class="modal fade" id="delModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h6 class="modal-title text-secondary" id="exampleModalLabel">Doctor Record Deletion</h6>
                 <button type="button" class="btn-close btn-sm shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="delete_info">
                     <label class='text-muted alert-id'></label>
                </div>
                <div class="modal-footer border-0" id="delete_footer">
                     <button class='btn btn-sm btn-danger p-1 m-1 float-right shadow-none' data-bs-dismiss='modal'>Close</button>
                     <input type=submit name=submit value='Remove' class='btn btn-sm btn-primary p-1 m-1 del_confirm float-right shadow-none'/>
                </div>
              </div>
            </div>
         </div>


    </body>

</html>    


<script>
  $(document).ready(function()
  {     
     $('#addModal').modal({
           backdrop: 'static',
           keyboard: false
     });

     $('#delModal').modal({
           backdrop: 'static',
           keyboard: false
     });

     $("#doctor_form").on("submit",function(e){
         e.preventDefault();
         //alert('hello');
         var dataString = $(this).serialize();
         //alert(dataString);
         $.post("process_doctor.php",dataString,function(res)
         {
            if(res === "1")
            {
              //alert(res);
              $(".modal-body")
              .html("<div class=''> <h5 class='lead px-2'> <i class='fa fa-check-circle text-success mr-1'></i>  Record added successfully! </h5> </div>");
            } 
            else
            {
              //alert(res);
              $(".modal-body")
              .html("<div class=''> <h5 class='lead px-2'> <i class='fa fa-times-circle text-danger mr-1'></i> Record addition Unsuccessful! </h5> </div>");
            }
            $(".modal-footer")
              .html("<button class='btn btn-sm btn-danger float-right' onclick='location.reload();'>Close</button>"); 
         });
     });

     $(document).on('click','.del_btn',function()
     {
         var id = $(this).attr("id");
         //$(this).attr("id","none");
         $("#delete_info .alert-id").html("Do you really want to remove record with ID : "+id+" ?");
         $(".alert-id").attr("id",id);
         //$("#Delete_Modal").modal('show');  
     });

     $(document).on('click','.del_confirm', function()
     {
   	   var id = $(".alert-id").attr("id");
       //$(".alert-id").attr("id","none"); 
       $.ajax({
              url:"process_doctor.php",
              method:"POST",
              data:{action:'delete',id:id},
              success:function(data)
              {
              	 $('#delete_info').html(data);
                 $('#delete_footer').hide();
                 //$('#Delete_Modal').modal('show');                             
              }
           });   
     });

  });
</script>
    
