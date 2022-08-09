<?php include 'server.php';
    error_reporting(0);
    session_start();
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Login</title>
    
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
  /*background-image: url("iag.jpg");*/
  /* height: 1000px;  You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  
}

img {
  max-width: 100%;
  
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 50px;
  background-color: white;
  width: 70%;
  position: center;
  box-shadow: rgba(0, 0, 0, 0.2) 0px 40px 60px -7px;
  background: rgba(255,255,255,1);
  border-radius: 15px;
}

/* Full-width input fields */
input[type=text], input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}

input[type=text], input[type=date] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #f1f1f1;
  outline: none;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f6f6f6;
}

input[type=text]:focus, input[type=date]:focus {
  background-color: #f1f1f1;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: hsla(19,89%,65%,1);
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-size: 14px;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #fff;
  text-align: center;
}

.footer {
  position: relative;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #fff;
  color: #2f2f2f;
  opacity: 0.9;
  text-align: left;
  height: 9%;
  padding: 25px;
  margin-top: auto;
  margin-top: 35px;
  font-size: 13px;
}
</style>
</head>
<body>

<nav class="navbar navbar-default" style="font-family: Calibri; letter-spacing: 0.6px; font-weight: bold; font-size:15.8px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav" >
        <li><a href="index">Home</a></li>
        <li><a href="registration">Registration Form</a></li>
        <li><a href="evaluation-form">Evaluation Form</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<form action="" method="POST">
  <div class="container">
  <?php
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $qry = "SELECT * FROM projectcode WHERE project_code='$username' and password='$password' ";
        $login = mysqli_query($connect, $qry);
  
        if($login->num_rows > 0) {
          $account = mysqli_fetch_assoc($login);
          $_SESSION['username'] = $account['project_code'];
          header("location: account");
        } else {
          echo "<div class='alert alert-warning' style='width:100%; margin-left:auto; margin-right:auto;'><strong>Warning!</strong>&nbsp;Username and Password doesn't exist!</div>";
        }
        
    }
    ?>
    <h1>Login</h1>
    <hr>
    <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter your Username" name="username" id="username" value="<?php echo $username;?>" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter your Password" name="password" id="password" value="<?php echo $password;?>" required>
    <hr>
    
    <button type="submit" name="login" class="registerbtn">Login</button>
    
  </div>
    
  </form>

  <div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; ">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
    </label>
</div>
</body>
</html>
