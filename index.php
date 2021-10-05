

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/d864910407.js" crossorigin="anonymous"></script>
    <title>Index</title>
</head>

<?php

   session_start();
   include("connection.php");
   include("function.php");
   $user_data = check_login($con);

   if($_SERVER['REQUEST_METHOD']== "POST")
  {
      $name=$_POST['name'];
      $position=$_POST['position'];
      $job=$_POST['job'];
      $ctc=$_POST['ctc'];
    

      if(!empty($name) && !empty($position) && !is_numeric($name) && !empty($job) && !empty($ctc) )
      {
         // Save to database
         $user_id=random_num(20);
       
         $query= "insert into table4 (name,position,job,ctc) values ('$name','$position','$job','$ctc')";

         mysqli_query($con,$query);
      //   header("Location: logins.php");
      //   die;
      }
      else
      {
          echo "Please enter valid information!";
      }
  }

?>

<body>

<center>
  <div class="a">
      <ul>
          <li><a href="#" id="er">Jobs</a></li>
          <li><a href="jobs.php" id="er">Candidate Apply</a></li>
          <li><a href="contact.html" id="er">Contact</a></li>
          <li><a href="about.html" id="er">About</a></li>
           <li><a href="logout.php" id="er">Logout <i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
  </div>  



  <div class="con">
  <br><br>
<div class="content">
 Welcome  <?php echo $user_data['email']; ?>
</div>
  <br>
   <div class="container">
   <p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
   Post Job
  </a>
  
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <form method="POST">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Company Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Position</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="position">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Job Desciption</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="job">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CTC</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ctc">
  </div>
  <button type="submit" class="btn btn-primary" name="submit2">Submit</button>
 
</form>  
  </div>

</div>
<br><br>
<h3>Posted Jobs</h3><br>
<table class="table" border="1">
  <thead>
    <tr>
      <th scope="col">SNo.</th>
      <th scope="col">Company Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
    </tr>
</thead>
  <tbody>
<?php
   $sql= "SELECT name , position, ctc FROM table4 ";
   $result = mysqli_query($con,$sql);
   $i=0;
   if(!empty($result) &&   $result -> num_rows >0)
   {
       while($row = $result -> fetch_assoc())
       {
           echo "
          <tbody>
        <tr>
          <td>".++$i."</td>
          <td>".$row['name']."</td>
          <td>".$row['position']."</td>
          <td>".$row['ctc']."</td>
        </tr>";
       }
   }
 else
 {
     echo "not found";
 }


?>
  </tbody>
</table>

 
</div>
<br><br> 
<footer>
<div class="foot">
    <hr>
    <br>
    <p>Copyright &copy; 2021 Jobhub.com All rights reserved </p>
    <br><br>
</div> 
</footer>
</body>
</html> 