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
  background-color: white;
  padding-left: 60px;
  padding-right: 60px;
  padding: 50px;
  width: 90%;
  box-shadow: 5px 10px 20px grey;
  border-radius: 12px;
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
  font-family: Calibri;
  background-color: white;
}
.r th, .r td {
  padding:7px 10px;
  border: 0.7px solid #F0F0F0;
}
.r th {
  font-size: 13px;
  font-family: Calibri;
  background-color: #A8bdbc;
  
}

.r td {
  font-size: 13px;
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
  width: 90%;
  border-collapse: collapse;
  margin-left: auto;
  margin-right: auto;
  margin-top:10px;
}

.counts th {
  background-color: #567572FF;
  color: white; /* #F5F5F5 */
}

.counts td, .counts th {
  padding:7px 10px;
  border: 1px solid #ddd;
  font-size: 12px;
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

.mytabs {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin: 15px auto;
  padding: 20px;
  background-color: white; /* #F5F5F5 */
  
}

.mytabs input[type="radio"] {
  display: none;
}

.mytabs label {
  padding: 10px;
  background-color: whtie;
  font-weight: semibold;
  font-size: 12px;
  
}

.mytabs .tab {
  width: 100%;
  padding: 15px;
  background-color: #F5F5F5;
  order: 1;
  display: none;
}

.tab {
  margin-top: -5px;
}

.mytabs input[type='radio']:checked + label + .tab {
  display: block;
}

.mytabs input[type='radio']:checked + label {
  background-color: #F5F5F5;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

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
        <li class="active"><a href="account.php" style="font-size:16px; font-family: Calibri;">❮</a></li>
        <li><a href="activity" style="font-size:16px; font-family: Calibri;">Add Activity</a></li>
        <li><a href="evaluation-report" style="font-size:16px; font-family: Calibri;">Evaluation Report</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>

  </div>
</nav>

<div class="container">
  <!--<br/><a href="account.php" class="btn btn-danger">Back</a>-->
  <h3><center>Participants' Information</center></h3>
  <hr>

  <div style="padding:10px; margin-left: 85%; display: inline-flex; border: 1px solid white; width:auto;">
    <form action="excel-generator" method="POST" >
      <!--<input type="text" name="from_date" id="from_date" class="datepicker" placeholder="Date From" style="padding:10px; width: auto;" readonly >
      <input type="text" name="to_date" id="to_date" class="datepicker" placeholder="Date To" style="padding:10px; width: auto;" readonly > -->
      <input type="submit" name="export_in_excel" class="btn btn-warning active" style="display:inline; padding:10px;" value="Export as Excel file">
    </form>
  </div>

  <div class="mytabs">
    <input type="radio" id="tabparticipants" name="mytabs" checked="checked">
    <label for="tabparticipants">Participants</label>
    <div class="tab">
      <h3>Registered Participants</h3><br>
        <table class="r">
          <thead>
            <tr>
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
          <tbody>

            <?php
              $results_per_page = 10; //number every page
              //$page = '';
              if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 1; };
              $this_page_first_result = ($page-1)*$results_per_page;

              $qryforthreetables = "SELECT * FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' ORDER BY p.id ASC LIMIT $this_page_first_result, $results_per_page ";
              //SELECT * FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY p.id
              $qrytoshowparticipants = mysqli_query($connect, $qryforthreetables);
              $number_of_results = mysqli_num_rows($qrytoshowparticipants);
              
              $no = 1;
              while ($participants = mysqli_fetch_array($qrytoshowparticipants)) {
                $participants_fname = $participants['firstname'];
                $participants_lname = $participants['lastname'];
                $participants_age = $participants['agerange'];
                $participants_gender = $participants['gender'];
                $participants_ethnic = $participants['ethnicity'];
                $participants_c_m = $participants['city_municipality'];
                $participants_province = $participants['province'];
                $participants_mobile_no = $participants['mobileno'];
                $participants_email = $participants['email'];
                $participants_education = $participants['education'];
                $participants_others = $participants['othereduc'];
                $participants_office = $participants['org_office'];
                $participants_position = $participants['position'];
                $participants_office_no = $participants['org_no'];
                $participants_office_email = $participants['org_email'];
            ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo ucfirst($participants_fname);?></td>
                <td><?php echo ucfirst($participants_lname);?></td>
                <!--<td><?php echo $participants['birthdate'];?></td>-->
                <td><?php echo $participants_age;?></td>
                <td><?php echo $participants_gender;?></td>
                <td><?php echo ucfirst($participants_ethnic);?></td>
                <td><?php echo ucfirst($participants_c_m);?></td>
                <td><?php echo ucfirst($participants_province);?></td>
                <td><?php echo $participants_mobile_no;?></td>
                <td><?php echo $participants_email;?></td>
                <td><?php echo ucfirst($participants_education);?></td>
                <td><?php echo ucfirst($participants_others);?></td>
                <td><?php echo ucfirst($participants_office);?></td>
                <td><?php echo ucfirst($participants_position);?></td>
                <td><?php echo $participants_office_no;?></td>
                <td><?php echo $participants_office_email;?></td>
              </tr>
            
          </tbody>
          <?php
                $no ++;
              }
             
            ?>
      </table><br/>
        <div align= "center" >
          <?php
            $page_query = "SELECT COUNT(*) FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' ORDER BY acty.id";
            $page_result = mysqli_query($connect, $page_query);
            $total_records = mysqli_fetch_array($page_result);
            $total_of_records = $total_records[0];
            $number_of_page = ceil($total_of_records/$results_per_page);
            
            for ($page=1; $page<=$number_of_page; $page++){
              echo '<a style="padding:8px; background:black; border-radius:11px; margin: 0 2px; color:white; font-family: Arial;" href="display?id=' .$actvtyID. '&page=' .$page. ' ">' .$page. '</a>';
            }
          ?>
        </div>

        <!-- Script for excel generator //script for datepicker textbox
        <script type="text/javascript">
          $(document).ready(function() {
            $('#from_date').datepicker({
              dateFormat: 'yy-mm-dd',
              changeYear: true,
              onSelect: function(selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate()+1);
                $('#to_date').datepicker("option","minDate",dt);
              }
            });

            $('#to_date').datepicker({
              dateFormat: 'yy-mm-dd',
              changeYear: true,
              onSelect: function(selected) {
                var dt = new Date(selected);
                dt.setDate(dt.getDate()-1);
                $('#from_date').datepicker("option","maxDate",dt);
              }
            });
          })
        </script> -->
    </div><!-- div for tab-->

    <input type="radio" id="tabsummary" name="mytabs">
    <label for="tabsummary">Summary</label>
    <div class="tab">
      <h3>Summary Report</h3><hr>

      <table class="counts">
        <!-- PARTICIPANTS COUNT -->
        <?php //For total number of Participants for selected Activity
          $participants_count = "SELECT COUNT(*) AS Total FROM projectcode projcode, activities acty, participants p WHERE p.act_id='$actvtyID' AND projcode.projects_id=acty.projects_id AND projcode.project_code='$programadmin' GROUP BY acty.id ";
          $sqlforcategory = mysqli_query($connect, $participants_count);
          $row_count = mysqli_fetch_array($sqlforcategory);
        ?>
        <tr><th style="letter-spacing: 1px;"><b>Total Number of Participants:</label>&nbsp;&nbsp;<?php echo $row_count['Total'];?></th></tr>
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
        <tr><th colspan="2"><b>Ethnicity:</th></tr>
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
        <tr><th colspan="2"><b>City/Municipality:</th></tr>
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
        <tr><th colspan="2"><b>Province:</td></th>
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
        <?php }
          
        ?>
        </tr>
      </table>
    
    </div><!-- div for tab-->

    <input type="radio" id="tabchart" name="mytabs">
    <label for="tabchart">Charts</label>
    <div class="tab">
      <h3>Charts</h3><hr>
            Still on progress.
    </div><!-- div for tab-->
  </div><!-- div for mytabs-->
  
</div> <!-- div for container-->
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