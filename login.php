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
      // read from database
      $query = "select * from users where username = '$username' limit 1";

      $result = mysqli_query($con, $query);
      if ($result && mysqli_num_rows($result) > 0)
      {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] === $password)
        {
          $_SESSION['id'] = $user_data['id'];
          header("Location: index.php");
          die;
        }
      }

      echo "Wrong username or password.";
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
  <title>Login</title>
</head>
<body>
  <div id="box">
    <form action="" method="post">
      <h1>Login</h1>
      Username: <input type="text" name="username" ><br><br>
      Password: <input type="password" name="password" ><br><br>

      <input type="submit" value="Login"><br><br>

      <a href="signup.php">Click to Signup</a><br><br>
    </form>
  </div>
</body>
</html>