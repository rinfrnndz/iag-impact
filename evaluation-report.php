<?php include 'server.php';
  error_reporting (0);
  session_start ();

  if(!isset($_SESSION['username'])) {
      header ("location: login.php");
  }
  $progamadmin = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin-Evaluation Report</title>
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
  padding: 30px;
  background-color: white;
  box-shadow: 5px 10px 20px grey;
  border-radius: 12px;

}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.previous {
  background-color: #f1f1f1;
  color: black;
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
        <li><a href="account" style="border-radius: 50%; font-size:22px;">&laquo;</a></li>
        <li><a href="activity">Add Activity</a></li>
        <li class="active"><a href="evaluation-report">Evaluation Report</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<?php echo "<h1><center>" .$_SESSION['username']. " Evaluation Report</center></h1>"; ?>
<hr><br/>
<script>
  function showUser(str) {
    if (str=="") {
      document.getElementById("evaluation_data").innerHTML="";
    return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("evaluation_data").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","evaluation-action.php?q="+str,true);
    xmlhttp.send();
  }
</script>
<form action="" method="POST">
  <select class="" name="evaluation_list" id="evaluation_list" onchange="showUser(this.value)" style="margin-left:75%;padding:10px; max-width:auto; width:25%; margin-bottom:1%;">
    <option disabled='disabled' selected='selected'>--Select--</option>
  <?php
   $select = mysqli_query($connect, "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' GROUP BY eval.acty_id ORDER BY `timestamp` DESC "); 
    while ($evaluation_row=mysqli_fetch_array($select)) {
  ?>
    <option value="<?php echo $evaluation_row['acty_id'];?>"><?php echo $evaluation_row['activity_title'];?></option>
  <?php } ?>
  </select>
</form>

<div id="evaluation_data"><b>Feedback Report will be displayed here....</b></div><br>

</body>
</html>