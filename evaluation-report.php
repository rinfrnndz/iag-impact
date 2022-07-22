<?php include 'server.php';
  error_reporting (0);
  session_start ();

  if(!isset($_SESSION['username'])) {
      header ("location: login");
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
        <li><a href="account.php" style="font-size:16px; font-family: Calibri;">❮</a></li>
        <li><a href="activity.php" style="font-size:16px; font-family: Calibri;">Add Activity</a></li>
        <li class="active"><a href="evaluation-report.php" style="font-size:16px; font-family: Calibri;">Evaluation Report</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
    
  </div>
</nav>

<div class="container">
<?php echo "<h2><center>" .$_SESSION['username']. " Evaluation Report</center></h2>"; ?>
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
    xmlhttp.open("GET","evaluation-action?q="+str,true);
    xmlhttp.send();
  }
</script>

<div style="padding-top:10px; padding-bottom:10px; padding:10px; margin-left:37%; display: inline-flex; border: 1px solid white; width:63%;">
  <form action="" method="POST" >
    <button class="btn btn-info active" style="display:inline; padding:8.8px;">Generate PDF </button>
  </form>
&nbsp;&nbsp;
  <form action="" method="POST">
    <select class="" name="evaluation_list" id="evaluation_list" onchange="showUser(this.value)" style="padding:10.3px; display:inline; display: flex; width: 100%;">
      <option disabled='disabled' selected='selected'>Select Activity Title</option>
      <?php
        $select = mysqli_query($connect, "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' GROUP BY eval.acty_id ORDER BY activity.id DESC "); 
          while ($evaluation_row=mysqli_fetch_array($select)) {
      ?>
      <option value="<?php echo $evaluation_row['acty_id'];?>"><?php echo $evaluation_row['activity_title'];?></option>
    <?php } ?>
    </select>
  </form>
</div>

<br>
<br>
<div id="evaluation_data"><b>Evaluation Report will be displayed here....</b></div>

</body>
</html>