<?php include 'server.php';
  error_reporting(0);
  session_start();
  
  $program_admin = $_SESSION['username'];

  $pcode = $_POST['pcodes'];
  $atitle = $_POST['title'];
  $adate = $_POST['actdate'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Activity Title</title>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  /*background-color: white;*/
  background-image: url("iag.jpg");
  height: 1000px; /* You must set a specified height */
  min-height: 100vh;
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
  display: flex;
  flex-direction: column;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 40px;
  background-color: white;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
  box-shadow: 5px 10px 20px grey;
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

input[type=text], input[type=date], select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=date]:focus {
  background-color: #ddd;
  outline: none;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-image: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));
  color: white;
  padding: 16px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  min-width: 100%;
  opacity: 0.9;
  width: 50%;
}

.registerbtn:hover {
  opacity: 1;
}

.clearbtn {
  background-color: #bdbdbd;
  color: white;
  padding: 16px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  min-width: 100%;
  width: 49.6%;
  opacity: 0.9;
}

.clearbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  padding-left: 20px;
  padding-right: 20px;
}

.footer {
  position: relative;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #F5FFFA;
  color: #2f2f2f;
  opacity: 0.9;
  text-align: left;
  height: 10%;
  padding: 25px;
  margin-top: auto;
  font-size: 13px;
}
</style>
    <script type="text/javasript" src="jquery-3.6.0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" style="font-family: calibri; letter-spacing: 1.1px; font-weight: bold;">
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
        <li class="active"><a href="account" >❮</a></li>
        <li><a href="activity" >Add Activity</a></li>
        <!--<li><a href="evaluation-report" style="font-size:16px; font-family: Calibri;">Evaluation Report</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"  onClick="return confirm('Are you sure you want to logout?')" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
    
  </div>
</nav>

<div class="container">
  <form action="" method="POST" class="signin">
    <?php
      if(isset($_POST['submit'])) {
        $sqlduplicate = mysqli_query($connect,"SELECT `activity_title`, `activity_date` FROM `activities` WHERE activity_title='$atitle' ");
          if(mysqli_num_rows($sqlduplicate) > 0 ) {
            echo "<div class='alert alert-danger' style='width:100%; margin-left:10%; margin-right:10%;'><strong>Warning!</strong>&nbsp;Activity Title already exists.</div>";
          } else {
            $insert = "INSERT INTO activities (projects_id, activity_title, activity_date) VALUES ('$pcode', '$atitle','$adate')";
            $querytitle = mysqli_query($connect, $insert);
              echo "<div class='alert alert-success' style='width:100%;'><strong>Success!</strong>&nbsp;Activity Title added.</div>";
          }
      }
    ?>
    <h1>Adding Activity Title</h1>
    <p>Please fill in this form to add activity title and date.</p>
    <hr>
      <?php 
      //SELECT * FROM projectcode projects, activities activity WHERE projects.projects_id=activity.projects_id AND projects.project_code = '$programadmin' AND activity.id='$actvtyID' ";
          $activitytable = mysqli_query($connect, "SELECT * FROM projectcode WHERE project_code = '$program_admin' ");
          while ($row=mysqli_fetch_array($activitytable)) {
        ?>
    <label for="pcode"><b>Project ID</b></label>
    <input type="text" value="<?php echo $row['projects_id'];?>" name="pcodes" id="pcodes" readonly>
      
    <label for="pcode"><b>Project Code</b></label>
    <input type="text" placeholder="<?php echo $row['project_code'];?>" disabled>
      <?php 
          }
      ?>
    
    <label for="title"><b>Activity Title</b></label>
    <input type="text" placeholder="Enter your Activity Title" name="title" id="title" required>

    <label for="actdate"><b>Activity Date</b></label>
    <input type="date" placeholder="Enter Activity Date" name="actdate" id="actdate" required>
         
    <button type="submit" name="submit" class="registerbtn">Add Title</button>
    <button type="reset" name="reset" class="clearbtn">Cancel</button>
  </form>
</div>
    


<!-- Footer -->
<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; ">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
    </label>
</div><!-- Footer -->
</body>
</html>
