<?php


session_start();

  include("connection.php");
  include("function.php");


  if($_SERVER['REQUEST_METHOD']== "POST")
  {
      $user_name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $password=$_POST['password'];
      $cpassword=$_POST['cpass'];

      if($Password!=$CPassword)
   {
       echo 'Password Not match';
   }

      if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($phone) && !empty($email) && !empty($cpassword))
      {
         // Save to database
         $user_id=random_num(20);
       
         $query= "insert into jobs (name,email,phone,password) values ('$user_name','$email','$phone','$password')";

         mysqli_query($con,$query);
         header("Location: logins.php");
         die;
      }
      else
      {
          echo "Please enter valid information!";
      }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
    <div class="container">
<form method="post">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="phone">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass">
  </div>
  <button type="submit" class="btn btn-primary" name="btn-save" value="Signup">Submit</button>
  <br><br>
  <p>Already Account?</p>
  <a href="logins.php">Login In</a>
</form>   
    </div>
</body>
</html>