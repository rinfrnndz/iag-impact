<?php include 'server.php';
    
  error_reporting(0);
  session_start();
  
  if(!isset($_SESSION['username'])) {
      header ("location: login");
  }

  $progamadmin = $_SESSION['username'];

    /*$evaluationsql = "SELECT * FROM `evaluation`";
    $evaluationACTIVITYID = $_GET['acty_id'];*/
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
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
  padding: 20px;
  background-color: white;
  box-shadow: 5px 10px 20px grey;
  border-radius: 12px;
  
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
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
  background-color: #f1f1f1;
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
  font-size: 13px;
}
</style>
  <meta charset="utf-8">
  <meta name="description" >  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default" style="font-family: Calibri; letter-spacing: 1.1px; font-weight: bold; font-size:15px;">
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
        <li class="active"><a href="account" >Main</a></li>
        <li><a href="activity" >Add Activity</a></li>
        <!--<li><a href="evaluation-report">Evaluation Report</a></li>-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" onClick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
    
  </div>
</nav>

  <div class="container" style="width: 90%; border: 0px solid grey;">
    <?php echo "<h2>" .$_SESSION['username']. " Admin</h2>"; ?>
    <hr>
    <h4>Lists of Activities Conducted</h4><br/>
    <table id="myTable" class="table " >
    <thead>
      <tr>
          <!--<th>Project Code</th>-->
          <th style="text-align: center;">#</th>
          <th style="text-align: center;">Activity</th>
          <th style="text-align: center;">Date</th>
          <th colspan="3" style="text-align: center;">Option/s</th>
      </tr>
    </thead>
        <?php
          $no = 1;
            $program = "SELECT *
                        from projectcode prj_code
                        join activities a on a.projects_id = prj_code.projects_id
                        where prj_code.project_code = '$progamadmin'
                        group by a.id
                        ORDER BY a.id
                        "; //LIMIT $this_page_first_result, $results_per_page
                      
            $progresult = mysqli_query($connect, $program);
            $number_of_results = mysqli_num_rows($progresult);

            while($progrow=mysqli_fetch_array($progresult)) {
       
        ?>
      <tbody> 
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo ucfirst($progrow['activity_title']);?></td>
          <td><?php echo $progrow['activity_date'];?></td>
          <td><a href="display?id=<?php echo $progrow['id'];?>" class="btn btn-info">View Participants</a></td>
          <td><a href="evaluation-display?id=<?php echo $progrow['id']; ?>" class="btn btn-primary">View Evaluation</a></td>
          <td><a href="activity-update?id=<?php echo $progrow['id']; ?>" class="btn btn-warning">Update Details</a></td>
          
        </tr>
        <?php
          $no++;
          }
        ?>
      </tbody>
    </table> <br/>
    <script>
      $(document).ready(function(){
          $('#myTable').dataTable();
      });
    </script>
  </div><br>

<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; font-size:13px;">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
  </label>
</div>

</body>
</html>
