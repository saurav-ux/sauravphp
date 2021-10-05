<?php

session_start();

include("connection.php");
include("function.php");


if($_SERVER['REQUEST_METHOD']== "POST")
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    if( !empty($password) && !empty($email))
    {
       // Read from database

     
       $query= "select * from jobs where email = '$email' limit 1";
       $result = mysqli_query($con,$query);

       if($result)
       {
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data=mysqli_fetch_assoc($result);

            if($user_data['password'] === $password)
            {
                $_SESSION['email']= $user_data['email'];
                header("Location: index.php");
                die;
            }
            
        }
       }

       echo "Wrong username or password!"; 
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
    <title>Login</title>
</head>
<body>
    <div class="container">
  <form method="POST" action="#">
   
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" value="LOGIN">Submit</button>
  <br><br>
  <p>New User?</p>
  <p>Create Account</p>
  <a href="signup.php">Sign Up</a>
</form>   
    </div>
</body>
</html>