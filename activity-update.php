<?php include 'server.php';
  error_reporting(0);
  session_start();

  $programadmin = $_SESSION['username'];
  $actvtyID = $_GET['id'];
  
    $update_activity = "SELECT * FROM projectcode projects, activities activity WHERE projects.projects_id=activity.projects_id AND projects.project_code = '$programadmin' AND activity.id='$actvtyID' ";
    $update_qry_activity = mysqli_query($connect, $update_activity);
    $updates_of_activity = mysqli_num_rows($update_qry_activity);
    
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
.updatebtn {
  background: linear-gradient(to bottom, #669999 0%, #ccffcc 100%);
  color: white;
  padding: 16px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  min-width: 100%;
  opacity: 0.9;
  width: 50%;
}

.updatebtn:hover {
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
<nav class="navbar navbar-default" style="font-family: Calibri; letter-spacing: 1.1px; font-weight: bold; font-size:15px">
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
              <li class="disabled"><a href="#" class="disabled">Activity Update</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            </div>
        </div>
    </nav>

<div class="container">
  <?php
    if(isset($_POST['update'])) {
      $update_title = $_POST['update_activity_title'];
      $update_date = $_POST['update_activity_date'];
      $update_stat = $_POST['update_activity_status'];
      //$update_status = $_POST['status'];

      $update_of_activity_data = "UPDATE activities SET activities.activity_title='$update_title', activities.activity_date='$update_date', activities.status='$update_stat' WHERE `activities`.`id`='$actvtyID' ";
      $update_qry = mysqli_query($connect, $update_of_activity_data);

      if($update_qry) {
        echo "<div class='alert alert-success' style='width:100%;'><strong>Success!</strong>&nbsp;Updated succesfully.</div>";
        //header("location: account");
      } else {
          echo "<div class='alert alert-danger' style='width:100%; margin-left:10%; margin-right:10%;'><strong>Update failed!</strong>&nbsp;Please repeat the process.</div>";
        }
      }
    ?>

  <form action="" method="POST" class="signin">
    
    <h2>Update Activity Details</h2>
    <p>In this form, you can edit or update the visibility of the activity title</p>
    <hr>

    <?php
        while($retrieve_row = mysqli_fetch_assoc($update_qry_activity)) {
    ?>

    <label for="pcode"><b>Project Code</b></label>
    <input type="text" value="<?= $retrieve_row['project_code'] ?>" name="update_pcode" id="update_pcode" disabled>
    
    <label for="title"><b>Activity Title</b></label>
    <input type="text" value="<?= $retrieve_row['activity_title'] ?>" name="update_activity_title" id="update_activity_title" required>

    <label for="actdate"><b>Activity Date</b></label>
    <input type="text" value="<?= $retrieve_row['activity_date'] ?>" name="update_activity_date" id="update_activity_date" required>
    
    <label for="status"><b>Status</b></label><br>
    <input type="checkbox" name="update_activity_status" <?= $retrieve_row['status'] == '0' ? 'unchecked':'' ?> ><label style="font-weight:normal;">&nbsp;Check to hide the Activity Title from the lists</label>
    <hr>
    <button type="submit" name="update" class="updatebtn" >Update Title</button>
    <button type="reset" name="reset" class="clearbtn">Cancel</button>
    <?php
     }
    ?>
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
