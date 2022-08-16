<?php include 'server.php';
  error_reporting(0);
  session_start();

  if(!isset($_SESSION['username'])) {
    header ("location: login.php");
  } 
  //SQL for displaying the participants of specific activity
    $programadmin = $_SESSION['username'];
    $actvtyID = $_GET['id'];
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin-Participants Page</title>

<style>
* {
  box-sizing: border-box;
  background-color: white;
}

body {
  font-family: "Lato", sans-serif;
  background-color: white;
  /*background-image: url("iag.jpg");*/
  /*height: 1000px; /* You must set a specified height */
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

.r {
  display: flex; 
  display: inherit; 
  overflow-x:auto;
  width: 100%;
  font-family: Tahoma;
  background-color: white;
  letter-spacing: 1px;
}
.r th, .r td {
  padding:7px 10px;
  border: 0.7px solid #F0F0F0;
}
.r th {
  font-size: 12px;
  background-color: #A8bdbc;
  
}

.r td {
  font-size: 12px;
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

.counts {
  width: 100%;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  margin-top:10px;
}

.counts th {
  background-color: #567572FF;
  color: #F5F5F5; /* #F5F5F5 */
}

.counts td, .counts th {
  padding:7px 10px;
  border: 1px solid #ddd;
  font-size: 13px;
}
 @media (max-width: 500px;) {
  .counts tr {
    display: none;
    
  }
  .counts, .counts tr, .counts td {
    display: block;
    width: 100%;
     
  }
  .counts tr {
    margin-bottom: 15px;
  }
  .counts td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }
  .counts td::before {
    content: after(data-label);
    position: absolute;
    left: 0;
    width: 45%;
    padding-left: 15px;
    font-size: 11px;
    text-align: left;
  }
}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #fff;
  background-color: #E5E4E2;
  width: 15%;
  /*height: 300px;*/
  
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: #36454F;
  padding: 16px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 15px;
  letter-spacing: 2px;
  font-family:;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #fff;
  color: #71797E;
  font-weight: bold;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 10px 10px;
  border: 1px solid #fff;
  width: 85%;
  border-left: none;
  /*height: 300px;*/
  background: white;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<script type="text/javasript" src="jquery-3.6.0.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

</head>
<body>
<nav class="navbar navbar-default" style="font-family: calibri; letter-spacing: 1.1px; font-weight: bold; font-size:15px">
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
        <li><a href="logout.php" onClick="return confirm('Are you sure you want to logout?')" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>

  </div>
</nav>

<div class="container" style="width: 99%; border: 0px solid grey; padding-bottom:10px;">
    <!--<br/><a href="account.php" class="btn btn-danger">Back</a>-->
    <h3><center>Participants' Information</center></h3>
  <hr>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Participants')" id="defaultOpen">Participants</button>
  <button class="tablinks" onclick="openCity(event, 'Summary')">Summary</button>
  <button class="tablinks" onclick="openCity(event, 'Chart')">Chart</button>
</div>

<div id="Participants" class="tabcontent">
  <h3>Participants</h3>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  <div style="padding:10px; margin-left: 85%; border: 1px solid black; margin-top:-55px;">
    <form action="excel-generator" method="POST" >
      <input type="submit" name="export_in_excel" class="btn btn-warning active" style="display:inline; padding:10px;" value="Export as Excel file">
    </form>
  </div> <!-- div end for excel-generator -->

  <table class="r">
    <thead>
      <tr >
        <th scope="row" style="text-align:center;">#</th>
        <th scope="row" colspan="2" style="text-align:center;">Full Name</th>
        <!--<th scope="row" style="text-align:center;">Date of Birth</th>-->
        <th scope="row" style="text-align:center;">Age Range</th>
        <th scope="row" style="text-align:center;">Gender</th>
        <th scope="row" style="text-align:center;">Ethnicity</th>
        <th scope="row" style="text-align:center;">City/ Municipality</th>
        <th scope="row" style="text-align:center;">Province</th>
        <th scope="row" style="text-align:center;">Mobile Number</th>
        <th scope="row" style="text-align:center;">Email Address</th>
        <th scope="row" colspan="2" style="text-align:center;">Education</th>
        <th scope="row" style="text-align:center;">Organization/ Office</th>
        <th scope="row" style="text-align:center;">Position</th>
        <th scope="row" style="text-align:center;">Organization/ Office No.</th>
        <th scope="row" style="text-align:center;">Organization's Email</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
        $results_per_page = 10; //number every page
        $page = '';
        if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 1; };
          $this_page_first_result = ($page-1)*$results_per_page;

          /*if (isset($_GET['search'])) {
            $search_for_participants = $_GET['search'];
            
          }*/
          $qryforthreetables = " SELECT * FROM projectcode pc 
                                 INNER JOIN activities a ON a.projects_id = pc.projects_id 
                                 INNER JOIN participants p ON p.act_id = a.id 
                                 WHERE pc.project_code = '$programadmin' && p.act_id = '$actvtyID' 
                                 ORDER BY p.id DESC 
                                 LIMIT $this_page_first_result, $results_per_page ";
          $qrytoshowparticipants = mysqli_query($connect, $qryforthreetables);
          $number_of_results = mysqli_num_rows($qrytoshowparticipants);
            
          $no = 1;
          while ($participants = mysqli_fetch_assoc($qrytoshowparticipants)) {
      ?>
      <tr class="header" >
        <td><?php echo $no;?></td>
        <td><?php echo ucfirst($participants['firstname']);?></td>
        <td><?php echo ucfirst($participants['lastname']);?></td>
        <!--<td><?php echo $participants['birthdate'];?></td>-->
        <td><?php echo $participants['agerange'];?></td>
        <td><?php echo $participants['gender'];?></td>
        <td><?php echo ucfirst($participants['ethnicity']);?></td>
        <td><?php echo ucfirst($participants['city_municipality']);?></td>
        <td><?php echo ucfirst($participants['province']);?></td>
        <td><?php echo $participants['mobileno'];?></td>
        <td><?php echo $participants['email'];?></td>
        <td><?php echo ucfirst($participants['education']);?></td>
        <td><?php echo ucfirst($participants['othereduc']);?></td>
        <td><?php echo ucfirst($participants['org_office']);?></td>
        <td><?php echo ucfirst($participants['position']);?></td>
        <td><?php echo $participants['org_no'];?></td>
        <td><?php echo $participants['org_email'];?></td>
      </tr>
    </tbody>
    <?php
        $no ++;
      } 
    ?>
  </table><br/>
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>
  <div align= "center" >
    <?php
      $page_query = "SELECT COUNT(*) FROM projectcode pr
                     INNER JOIN activities ac ON ac.projects_id = pr.projects_id
                     INNER JOIN participants pa ON pa.act_id = ac.id
                     WHERE pa.act_id = '$actvtyID' && pr.project_code = '$programadmin'
                     ORDER BY pa.id DESC ";
          
      $page_result = mysqli_query($connect, $page_query);
      $total_records = mysqli_fetch_array($page_result);
      $total_of_records = $total_records[0];
      $number_of_page = ceil($total_of_records/$results_per_page);
            
      for ($page=1; $page<=$number_of_page; $page++){
        echo '<a style="padding:5px 9px; background:black; border-radius:13px; margin: 0 2px; color:white; font-family: Tahoma;" href="display?id=' .$actvtyID. '&page=' .$page. ' ">' .$page. '</a>';
      }
    ?>
  </div>
  
</div> <!-- end div for Participants-->

<div id="Summary" class="tabcontent">
  <h3>Summary</h3>
  <table class="counts">
    <!-- PARTICIPANTS COUNT -->
    <?php //For total number of Participants for selected Activity
      $participants_count = "SELECT COUNT(*) AS Total FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY acty.id ";
      $sqlforcategory = mysqli_query($connect, $participants_count);
      $row_count = mysqli_fetch_array($sqlforcategory);
    ?>
    <tr><th style="letter-spacing: 1px;">Total Number of Participants:&nbsp;&nbsp;<?php echo $row_count['Total'];?></th></tr>
  </table>
      
  <table class="counts">
  <!-- GENDER COUNT -->
    <?php //For total number of Male and Female for selected Activity
      $gender_count = "SELECT COUNT(CASE WHEN gender='Male' THEN 1 END) AS 'MALE', COUNT(CASE WHEN gender='Female' THEN 1 END) AS 'FEMALE' FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY acty.id ";
      $sqlforgender = mysqli_query($connect, $gender_count);
      $gender_count = mysqli_fetch_array($sqlforgender);
    ?>
    <tr><th colspan="2" style="letter-spacing: 1px;">Total Number of Male and Female from Participants</th></tr>
    <tr>
      <td><b>Total Number of Male:</td>
      <td><?php echo $gender_count['MALE'];?></td>
    </tr>
    <tr>
      <td><b>Total Number of Female:</b></td>
      <td><?php echo $gender_count['FEMALE'];?></td>
    </tr>
  </table>
      
  <table class="counts">
    <?php //For Age Range COUNT
      $agecount = "SELECT agerange,
                   COUNT(CASE agerange WHEN '15 - 25' THEN 1 ELSE NULL END) as '15-25',
                   COUNT(CASE agerange WHEN '26 - 35' THEN 1 ELSE NULL END) as '26-35',
                   COUNT(CASE agerange WHEN '36 - 45' THEN 1 ELSE NULL END) as '36-45',
                   COUNT(CASE agerange WHEN '46 - 55' THEN 1 ELSE NULL END) as '46-55',
                   COUNT(CASE agerange WHEN '56 - 65' THEN 1 ELSE NULL END) as '56-65',
                   COUNT(CASE agerange WHEN 'Over 65' THEN 1 ELSE NULL END) as 'Over 65'
                   FROM projectcode projcode, activities acty, participants p 
                   WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY acty.id ";
      $sqlforagerange = mysqli_query($connect, $agecount);
      $age_count = mysqli_fetch_array($sqlforagerange);
    ?>
    <tr><th colspan="6" style="letter-spacing: 1px;">Age Range</th></tr>
    <tr>
      <td><b>(15-25)</td>
      <td><?php echo $age_count['15-25'];?></td>
    </tr>
    <tr>
      <td><b>(26-35)</td>
      <td><?php echo $age_count['26-35'];?></td>
    </tr>
    <tr>
      <td><b>(36-45)</td>
      <td><?php echo $age_count['36-45'];?></td>
    </tr>
    <tr>
      <td><b>(46-55)</td>
      <td><?php echo $age_count['46-55'];?></td>
    </tr>
    <tr>
      <td><b>(56-65)</td>
      <td><?php echo $age_count['56-65'];?></td>
    </tr>
    <tr>
      <td><b>(Over 65)</td>
      <td><?php echo $age_count['Over 65'];?></td>
    </tr>
  </table>
  <!-- //For Ethnicity COUNT -->
  <table class="counts">
    <tr><th colspan="2">Ethnicity:</th></tr>
    <?php
      foreach($connect->query("SELECT DISTINCT ethnicity,COUNT(ethnicity) FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY ethnicity,acty.id ORDER BY p.id ") as $ethnicity_row) {
    ?>
    <tr>
      <td><b><?php echo ucfirst($ethnicity_row['ethnicity']);?></td>
      <td><?php echo $ethnicity_row['COUNT(ethnicity)'];?></td>
    <?php }?>
    </tr>
  </table>
  <!-- //For City/Municipality COUNT -->
  <table class="counts">
    <tr><th colspan="2">City/Municipality:</th></tr>
    <?php 
      foreach($connect->query("SELECT DISTINCT city_municipality,COUNT(*) FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY city_municipality,acty.id ORDER BY p.id ") as $ctm_row) {
    ?>
    <tr>
      <td><b><?php echo ucfirst($ctm_row['city_municipality']);?></td>
      <td><?php echo $ctm_row['COUNT(*)'];?></td>
    <?php }?>
    </tr>
  </table>
  <!-- //For Province COUNT -->
  <table class="counts">
    <tr><th colspan="2">Province:</td></th>
    <?php 
      $province_sql = "SELECT DISTINCT province,COUNT(*) PCOUNT 
                       FROM projectcode projcode, activities acty, participants p 
                       WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' 
                       GROUP BY province,acty.id
                       ORDER BY p.id";
      $province_result = $connect->query($province_sql);
        
      while ($province_rows = mysqli_fetch_array($province_result)) {
      
      ?>
    <tr>
      <td><b><?php echo ucfirst($province_rows['province']);?></td>
      <td><?php echo $province_rows['PCOUNT'];?></td>
    <?php } ?>
    </tr>
  </table>
</div>

<div id="Chart" class="tabcontent">
  <h3>Chart</h3>
  <p>Still in progress.</p>
</div>

</div> <!-- div for container-->

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<br>
<!-- Footer -->
<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; ">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
    </label>
</div><!-- Footer -->
</body>
</html>