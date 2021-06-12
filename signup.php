<?php
  session_start();

  include("connection.php");
  include("functions.php");

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    // something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username))
    {
      // save to database
      $query = "insert into users (username, password) values ('$username', '$password')";

      mysqli_query($con, $query);

      header("Location: login.php");
      die;
    } else 
    {
      echo "Please enter some valid information.";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<body>
  <div id="box">
    <form action="" method="post">
    <h1>Signup</h1>
      Username: <input type="text" name="username" ><br><br>
      Password: <input type="password" name="password" ><br><br>

      <input type="submit" value="Signup"><br><br>

      <a href="login.php">Click to Login</a><br><br>
    </form>
  </div>
</body>
</html>