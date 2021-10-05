

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="jobs.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d864910407.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>

<?php

   session_start();
   include("connection.php");
   include("function.php");
   $user_data = check_login($con);

?>
<body>



<center>
  <div class="a">
      <ul>
          <li><a href="index.php" id="er">Jobs</a></li>
          <li><a href="jobs.php" id="er">Candidate Apply</a></li>
          <li><a href="contact.html" id="er">Contact</a></li>
          <li><a href="about.html" id="er">About</a></li>
           <li><a href="logout.php" id="er">Logout <i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
  </div>  
<br><br>
<h2>Admin Dashboard</h2>
<br><br>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SNo.</th>
                    <th scope="col">Candidate Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Year Passout</th>
                </tr>
            </thead>
            <tbody>
                <?php
                   $sql="SELECT name,apply,year FROM table5";
                   $result=mysqli_query($con,$sql);
                   $i=0;
                   if($result -> num_rows>0)
                   {
                       while($rows=$result -> fetch_assoc())
                       {
                           echo '
                         <tr>
                           <th scope="row">'.++$i.'</th>
                           <td>'.$rows['name'].'</td>
                           <td>'.$rows['apply'].'</td>
                           <td>'.$rows['year'].'</td>
                        </tr>';
                           
                           
                           
                       }
                   }
                   else
                   {
                       echo"not valid";
                   }
                ?>
            </tbody>
        </table>
    </div>
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