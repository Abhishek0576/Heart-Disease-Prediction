<?php
   error_reporting(E_ALL ^ E_NOTICE);
   include("../connection.php");
   session_start();
   if(empty($_SESSION["user"]))
   {
       echo "<script> location.replace('login.php'); </script>";
   }
   $sql = "select age,gender from user where id = '".$_SESSION['user']."'";
   $res = mysqli_query($conn,$sql);
   if($res)
   {     
        $nr = mysqli_num_rows($res);    
        if($nr!=0)  
        {    
            $row = mysqli_fetch_assoc($res);
            $age = $row['age'];
            $gender = $row['gender'];
        }
   }      
   $date = date("Y/m/d"); 
   $time = date("H:i"); 
?>

<html>
  
    <head> 
        <title> Heart Disease Prediction | Admin </title> 
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
            .title1 
            {  
              position: relative;
              pointer-events: none; 
              font-variant: small-caps; 
              font-weight: 600;
              font-size: 21.5px;
              color: #343642;
            } 
            .title1:after
            {
              content: '';
              display: block;
              width: 50px;
              height: 2.5px;
              background: #018edf;
              position: absolute;
              left: 1px;
              bottom: -4px;
            }
            .card:hover { opacity: 0.8; } 
            #analysis_form { padding: 10px 40px;}
            .back { cursor: pointer; }
            form label{
                font-size: 14px;
                font-weight: 400;
                margin-bottom: 8px;
            }
            .btn:focus,.btn:active
            {
              border-color: none;
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 4px rgba(50, 50, 128, 0.6);
              outline: none;
            }

            table {
               border-collapse: collapse;
               margin: 10px 40px;
            }
            td, th { padding: 10px; }
            td.a { width: 40%; }
            td.c { width: 50%; }

            @media (max-width: 1000px) 
            { 
               #analysis_form { padding: 0px; margin-top: 15px; }
            }
        </style> 

    </head>
   
    <body class="p-5 bg-danger">

        <?php
            //$output = shell_exec("python temp.py");
            //echo $output;
        ?> 

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
                    <a class="nav-link" href="user.php"> <i class="fas fa-user"></i> User </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link active"> <i class="fas fa-heartbeat"></i> Heart Analysis</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="tenyearrisk.php"> <i class="fas fa-chart-area"></i> TenYear CHD</a>
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
                
                <div class="row justify-content-center align-items-center mt-4">
                  <div class="col-md-8 p-0">
                      <form action="" method="post" id="analysis_form" class="">
        
                        <div id="response" class="col-md-12 p-0 mb-1 text-center">  </div>

                        <div class="form-group p-4 py-0">
                                    <h3 class="mb-4 mt-4 title1">heart analysis</h3> 
                        </div>
                            
                            <div class="form-group p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label>Chest Pain Type</label>         
                                    </div>
                                    <div class="col-md-6">             
                                        <select class="form-select form-select-sm shadow-none" id="cp" name="cp" required>
                                          <option value="1">Typical Angina</option>
                                          <option value="2">Atypical Angina</option>
                                          <option value="3">Non-Anginal Pain</option>
                                          <option value="4">Asympotatic</option>
                                        </select>  
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Rest Blood Pressure (mm Hg) </label>     
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="input-group input-group-sm">  
                                          <input type="number" id="restbps" name="restbps" maxlength="3" placeholder="Norm: 90-120" class="form-control form-control-sm shadow-none"  required>
                                          <span class="input-group-text" id="basic-addon2">mm Hg</span>
                                        </div> 
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Serum Cholestrol (mg/dL) </label>   
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="input-group input-group-sm">  
                                          <input type="number" id="cholestrol" name="cholestrol" maxlength="3" placeholder="Norm: 150-200" class="form-control form-control-sm shadow-none" required>
                                          <span class="input-group-text" id="basic-addon2">mg/dL</span>
                                        </div> 
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Fasting BloodSugar (>120 mg/dL) </label>   
                                    </div>
                                    <div class="col-md-6"> 
                                        <select class="form-select form-select-sm form-control shadow-none" id="fbs" name="fbs" required>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select> 
                                    </div>
                                </div>  
                            </div> 

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Resting ECG </label> 
                                    </div>
                                    <div class="col-md-6">   
                                        <select class="form-select form-select-sm form-control shadow-none" id="restecg" name="restecg" required>
                                          <option value="0">Normal</option>
                                          <option value="1">Abnormal - Elevation or Depression</option>
                                          <option value="2">Left ventricular Hypertrophy</option>
                                        </select> 
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Max HeartRate (71-202)</label>
                                    </div>
                                    <div class="col-md-6">   
                                        <input type="number" id="maxheartrate" name="maxheartrate" min="71" max="202" maxlength="3" 
                                          class="form-control form-control-sm shadow-none"  required>
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Exercise Angina </label> 
                                    </div>
                                    <div class="col-md-6">   
                                        <select class="form-select form-select-sm form-control shadow-none" id="exerangina" name="exerangina" required>
                                          <option value="1">Yes</option>
                                          <option value="0">No</option>
                                        </select> 
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group   p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> Oldpeak </label>
                                    </div>
                                    <div class="col-md-6">   
                                        <input type="text" id="oldpeak" name="oldpeak" class="form-control form-control-sm shadow-none" required>
                                    </div>
                                </div>  
                            </div>

                            <div class="form-group  p-4">
                                <div class="row">   
                                    <div class="col-md-6 align-self-center">
                                        <label> ST Slope </label> 
                                    </div>
                                    <div class="col-md-6">   
                                        <select class="form-select form-select-sm form-control shadow-none" id="slope" name="slope" required>
                                          <option value="1">Sloping up</option>
                                          <option value="2">Flat</option>
                                          <option value="3">Sloping down</option>
                                        </select>    
                                    </div>
                                </div>  
                            </div>
                
                            <div class="form-group p-4 mb-2">
                                <div class="d-flex flex-row-reverse"> 
                                      <button type="submit" id="submit" name="submit" size="" class="btn btn-sm btn-primary shadow-none"> SUBMIT&nbsp;<i class="fa"></i> </button> 
                                      <span id="download" class="btn btn-sm btn-success d-none mx-3" onclick="downloadReport()"> <i class="fas fa-download"></i> &nbsp;REPORT </span> 
                                </div> 
                            </div>

                          </div>    
                       </form> 
                       <div class="models-container d-flex justify-content-center my-4">
                             
                       </div>
                       <div class="img-container d-none">
                             <img src="../Images/barchart.png" class="img-fluid">
                             <img src="../Images/piechart.png" class="img-fluid">
                       </div>
                     </div>     
                </div>
            </div>

            <div class="pb-2" id="report-container" style="display: none;">
              <div class="container text-center p-0 border" id="report" style="display: none;">
                <div class="row text-center py-3 mb-3 rounded">
                    <div class="col align-self-center">     
                        <h4 class="mb-3"> <label style="color:red;"> Heart </label> Disease Prediction System</h4>
                        <label class="mb-2"> <i> Know your disease - Save your life </i> </label>
                    </div>
                </div> 
                <h4 class="mb-2 text-center text-primary font-italic sc">heart analysis report</h4>
                <div class="container">
                     <table>
                        <thead> <tr> <th>PATIENT DETAILS:</th> </tr> </thead>
                        <tbody> 
                                <tr> <td class="a"> Name  </td>  <td class="c"> <?php echo $_SESSION["uname"]; ?>  </td> </tr> 
                                <tr> <td class="a"> Age   </td>  <td class="c"> <?php echo $age; ?>                </td> </tr>
                                <tr> <td class="a"> Sex   </td>  <td class="c"> <?php echo $gender; ?>             </td> </tr>
                                <tr> <td class="a"> </td> <td> </td>  </tr>
                        </tbody>        
                        <thead> <tr> <th>TEST INDICATORS:</th> </tr> </thead>
                        <tbody> 
                                <tr> <td class="a"> Chest Pain Type     </td>  <td class="c"> <label id="lcp"></label>           </td> </tr>
                                <tr> <td class="a"> Resting BP          </td>  <td class="c"> <label id="lrestbps"></label>      </td> </tr>
                                <tr> <td class="a"> Serum Cholestrol    </td>  <td class="c"> <label id="lcholestrol"></label>   </td> </tr>
                                <tr> <td class="a"> Fasting Blood Sugar </td>  <td class="c"> <label id="lfbs"></label>          </td> </tr>
                                <tr> <td class="a"> Resting ECG         </td>  <td class="c"> <label id="lrestecg"></label>      </td> </tr>
                                <tr> <td class="a"> Max Heart Rate      </td>  <td class="c"> <label id="lmaxheartrate"></label> </td> </tr>
                                <tr> <td class="a"> Exercise Angina     </td>  <td class="c"> <label id="lexerangina"></label>   </td> </tr>
                                <tr> <td class="a"> Oldpeak             </td>  <td class="c"> <label id="loldpeak"></label>      </td> </tr>
                                <tr> <td class="a"> ST Slope            </td>  <td class="c"> <label id="lslope"></label>        </td> </tr>
                                <tr> <td class="a"> </td> <td> </td> </tr>
                        </tbody>
                        <thead> <tr> <th class="a">TEST RESULT:</th> </tr> </thead>
                        <tbody>
                              <tr> <td class="a"> Test   </td> <td class="b"> Testing on CardioVascular Disease (CVD) </td> </tr>
                              <tr> <td class="a"> Result </td> <td class="b">  <div id="result" class="p-0"> </div> </td> </tr>  
                              <tr> <td class="a"> Score  </td> <td class="b">  <div id="score"  class="p-0"> </div> </td> </tr>  
                              <tr> <td class="a"> </td> <td> </td> </tr>
                        </tbody> 
                     </table> 
                     <div class="d-flex flex-row-reverse" id="datetime">  </div>
                </div>
             </div>
             </div>

        </div>

        <div class="modal fade" id="LoadingModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content border-0" style="background-color: transparent;">
              <div class="modal-body text-center">
                 <embed src="../Images/loading.gif" class="img-fluid" height="125" width="125">
              </div>
            </div>
          </div>
        </div>

    </body>

</html>        


<script>

$(document).ready(function(){
   $('#LoadingModal').modal({
        backdrop: 'static',
        keyboard: false,
   });

   $("form").on("submit",function(e)
   {
       e.preventDefault();
       $("#response").hide();
       $("#download").addClass("d-none");
       var dataString = $(this).serialize();

       var value = $("#cp option:selected");
       $("#lcp").text(value.text());        
       
       value = $("#fbs option:selected");
       $("#lfbs").text(value.text());

       value = $("#restecg option:selected");
       $("#lrestecg").text(value.text());

       value = $("#exerangina option:selected");
       $("#lexerangina").text(value.text());

       value = $("#slope option:selected");
       $("#lslope").text(value.text());

       $("#lrestbps").text($("#restbps").val()+" mm Hg");
       $("#lcholestrol").text($("#cholestrol").val()+" mg/dl");
       $("#lmaxheartrate").text($("#maxheartrate").val());
       $("#loldpeak").text($("#oldpeak").val());

       $("#submit i").addClass("fa-spinner fa-spin");
       $("#LoadingModal").modal('show');

       $.post("process_analysis.php",dataString,function(res)
       {
              $("#LoadingModal").modal('hide');
              $("#response").html(res).show();
              window.scrollTo(0,0);
              $("#submit i").removeClass("fa-spinner fa-spin");
              $("#download").removeClass("d-none");
              $(".img-container").removeClass("d-none");
              $(".models-container").load("data.html");
              
              var result = $("#response .alert strong").text();
              if(result.includes("Healthy"))
              {
                  $("#result").html("<b class='text-success'> NEGATIVE </b>");  
                  result = "NEGATIVE"; 
              }
              else 
              {
                  $("#result").html("<b class='text-danger'> POSITIVE </b>");
                  result = "POSITIVE"; 
              }
              
              var score = $("#response .alert label").text();
              score = score.trim();
              score = score.slice(1,score.length-1); 
              $("#score").html("<b>"+score+"</b>");

              var d = new Date();
              var date =  String(d.getDate()).padStart(2,0)+"/"+String(d.getMonth()).padStart(2,0)+"/"+String(d.getFullYear()).padStart(2,0);
              var time =  String(d.getHours()).padStart(2,0)+":"+String(d.getMinutes()).padStart(2,0)+":"+String(d.getSeconds()).padStart(2,0);
              var dateTime = time+" &nbsp;"+date;
              //alert(dateTime);
              $("#datetime").html("<small class='p-1'>"+dateTime+"</small>");

              $.post("process_report.php",{result: result, score: score},function(res)
              {
                  // alert(res);
              });  

       });
   });
   
});
</script>   

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
    var pdf = this.document.getElementById("report");
    var con = this.document.getElementById("report-container");
    function downloadReport()
    {
            pdf.style.display = "block";
            con.style.display = "block";
            console.log(pdf);
            console.log(window);
            var opt = {
                margin: 0.28,
                filename: 'HeartReport.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(pdf).set(opt).save();
            closeReport();
    };
</script>

<script>
    function closeReport()
    {
        var con = document.getElementById("report-container");
        con.style.display = "none";    
    }  
</script>