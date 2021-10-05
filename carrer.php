<?php

   session_start();
   include("connection.php");
   include("function.php");
   $user_data = check_login($con);

   if(isset($_POST['Submitt']))
   {
       $name=$_POST['name'];
       $qual=$_POST['qual'];
       $apply=$_POST['apply'];
       $year=$_POST['year'];

       $sql="INSERT INTO `table5`( `name`, `apply`, `qual`, `year`) VALUES ('$name','$apply','$qual','$year')";
       mysqli_query($con,$sql);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="carrer.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrer</title>
</head>
<body>
<div class="top">  
         <h1><b>Jobhub.com</b></h1><br>
       <h4>Where Jobs are Waiting For You!</h4>
</div>
<br><br><br>

    <div class="row">
        <?php
  $sql = "SELECT  name,position,job,ctc from table4";
  $result= mysqli_query($con,$sql);
  if($result -> num_rows>0)
  {
      while($rows = $result-> fetch_assoc())
      {
          echo '
          <div class="col">
          <div class="jobs">
          <h3 style="text-align: center;">'.$rows['position'].'</h3>
          <h4 style="text-align: center;">'.$rows['name'].'</h4>
          <p style="color: black; text-align:justify;"><b>Skills Required : </b>'.$rows['job'].'</p>
          <p style="color: black;"><b>CTC: </b>'.$rows['ctc'].'</p> 
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-expanded="false" aria-controls="collapseExample">Apply Now</button>
          </div>
        </div> ';
      }
  }


        ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for Jobs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" >
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="recipient-name" name="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Applying For</label>
          <input type="text"class="form-control" name="apply" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Qualification</label>
            <input type="text" class="form-control" id="recipient-name" name="qual">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Year Passout</label>
            <input type="text" class="form-control" id="recipient-name" name="year">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="Submitt">Apply</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>   
</body>
</html>