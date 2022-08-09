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
  <script type="text/javasript" src="jquery-3.6.0.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <table class="table">
    <thead>
      <tr>
          <!--<th>Project Code</th>-->
          <th style="text-align: center;">#</th>
          <th style="text-align: center;">Activity</th>
          <th style="text-align: center;">Date</th>
          <th colspan="2" style="text-align: center;">Option/s</th>
      </tr>
    </thead>
        <?php

          $results_per_page = 10; //number every page
          $page = '';
          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }
          $this_page_first_result = ($page-1)*$results_per_page;

          $no = 1;
            $program = "SELECT * FROM projectcode projects, activities activity 
                    WHERE projects.projects_id=activity.projects_id 
                    AND projects.project_code = '$progamadmin' 
                    ORDER BY `timestamp` DESC
                    LIMIT $this_page_first_result, $results_per_page     
                        "; //

            /*  
            SELECT *
                        from projectcode prj_code
                        inner join activities a on a.projects_id = prj_code.projects_id
                        inner join participants p on p.act_id = a.id
                        inner join evaluation e on e.acty_id = p.act_id
                        where prj_code.project_code = '$progamadmin'
                        group by a.id            
                        
                        */
            
            $progresult = mysqli_query($connect, $program);
            $number_of_results = mysqli_num_rows($progresult);

            while($progrow=mysqli_fetch_array($progresult)) {
       
        ?>
        <tr>
          <td><?php echo $no;?></td>
          <td><?php echo ucfirst($progrow['activity_title']);?></td>
          <td><?php echo $progrow['activity_date'];?></td>
          <td><a href="display?id=<?php echo $progrow['id'];?>" class="btn btn-info">View Participants</a></td>
          <!--<td><a href="evaluation-display?id=<?php echo $progrow['acty_id']; ?>" class="btn btn-warning">View Evaluation</a></td>-->
          <td><a href="activity-update?id=<?php echo $progrow['id']; ?>" class="btn btn-danger">Update Details</a></td>
          
        </tr>
        <?php
          $no++;
          }
          
        ?>
    </table> <br/>
    <div align= "center">
      <?php
      
      /*
        SELECT * 
        FROM projectcode projects, activities activity 
        WHERE projects.projects_id=activity.projects_id 
        AND projects.project_code = '$progamadmin' ORDER BY activity.id

      */     

        $page_query = "SELECT COUNT(*)
                        from projectcode prj_code
                        inner join activities a on a.projects_id = prj_code.projects_id
                        inner join participants p on p.act_id = a.id
                        inner join evaluation e on e.acty_id = a.id
                        where prj_code.project_code = '$progamadmin'
                        ORDER BY a.id
                        ";

        $page_result = mysqli_query($connect,$page_query);
        $total_records = mysqli_num_rows($page_result);
        $number_of_page = ceil($total_records/$results_per_page);
        
        //starting_limit_number = (page_number-1)*results_per_page;
        for ($page=1;$page<=$number_of_page;$page++){
          echo '<a style="padding:5px 9px; background:black; border-radius:13px; margin: 0 2px; color:white; font-family: Tahoma;" href="account?' .$progrow['id']. 'page=' .$page. ' ">'. $page .'</a>';
        }
      ?>
    </div>
   
  
  </div><br>

<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; font-size:13px;">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
  </label>
</div>
</body>
</html>
