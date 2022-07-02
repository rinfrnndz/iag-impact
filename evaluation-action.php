<?php include 'server.php';
    
  error_reporting (0);
  session_start ();

  if(!isset($_SESSION['username'])) {
    header ("location: login.php");
  }
  $progamadmin = $_SESSION['username'];
  $q = intval($_GET['q']);
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

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.card {
  background-color: white;
  color: #62929E;
  padding: 1rem;
  height: 25rem;
}
.cards {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-gap: 1rem;
}
/* Screen larger than 600px? 2 column */
@media (min-width: 600px) {
  .cards { grid-template-columns: repeat(2, 1fr); }
}
/* Screen larger than 600px? 3 column */
@media (min-width: 900px) {
  .cards { grid-template-columns: repeat(3, 1fr); }
}
.card1 {
  background-color: white;
  color: #62929E;
  padding: 10px 10px;
  height: 30rem;
  grid-column: span 3;
  display: flex; 
  display: inherit;
  overflow-x: auto;
}
.card2 {
  background-color: white;
  color: #62929E;
  padding: 10px 10px;
  height: 5rem;
  grid-column: span 3;
  display: flex; 
  display: inherit; 
  overflow-x: auto;
}

.table {
  display: flex; 
  display: inherit; 
  overflow-x:auto;
  width: 100%;
  font-family: Calibri;
  background-color: white;
}
.table th, .table td {
  padding:7px 10px;
  border: 0.7px solid #F0F0F0;
}
.table th {
  font-size: 13px;
  font-family: Calibri;
  background-color: #A8bdbc;  
}
.table td {
  font-size: 13px;
}

.subtable {
  min-width: 280px; 
  width: 100%; 
  font-size: 13px; 
  padding: 20px;
  font-family: Calibri;
  font-weight: bold;
}
.subtable th, .subtable td {
  padding:7px 7px;
  border: 0.7px solid #d4d4ce;
}
.subtable th {
  font-size: 13px;
  font-family: Calibri;
  background-color: #287094;
  color: white;  
}

.mytabs {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin: 15px auto;
  padding: 20px;
  background-color: #F5F5F5;
  
}

.mytabs input[type="radio"] {
  display: none;
}

.mytabs label {
  padding: 10px;
  background-color: #F5F5F5;
  font-weight: semibold;
  font-size: 12px;
}

.mytabs .tab {
  width: 100%;
  padding: 15px;
  background-color: white;
  order: 1;
  display: none;
  border: 1px grey;
}

.tab {
  margin-top: -5px;
}

.mytabs input[type='radio']:checked + label + .tab {
  display: block;
}

.mytabs input[type='radio']:checked + label {
  background-color: white;
}

</style>
  <script type="text/javasript" src="jquery-3.6.0.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
</head>
<body>

<div class="mytabs">
  <input type="radio" id="tabparticipants" name="mytabs" checked="checked">
  <label for="tabparticipants">Respondents</label>
  <div class="tab">
    <h3>Respondents</h3><hr>
    <table class="table">
      <thead >
          <tr>
            <!--<th></th>-->
            <th colspan="8">Basic Information</th>
            <th colspan="6">Activity Proper</th>
            <th colspan="4">Sustainability</th>
            <th></th>
            <th colspan="3">Other comments</th>
            <th></th>
          </tr>
          <tr>
            <!--<th></th>-->
            <th colspan="2">Name</th>
            <th>Date of Birth</th>
            <th>Age Range</th>
            <th>Gender</th>
            <th>Ethnicity</th>
            <th>City/ Municipality</th>
            <th>Province</th>
            <th>Question 1</th>
            <th>Question 2</th>
            <th>Question 3</th>
            <th>Question 4</th>
            <th>Question 5</th>
            <th>Question 6</th>
            <th>Question 7</th>
            <th>Question 8</th>
            <th>Question 9</th>
            <th>Question 10</th>
            <th>Question 11</th>
            <th>Question 12</th>
            <th>Question 13</th>
            <th>Question 14</th>
            <th>Question 15</th>
          </tr>
      </thead>
      
      <tbody>
        <?php
          
          $result_per_page = 10;
          
          $evaluationsql = "SELECT * FROM projectcode projects, activities activity, evaluation eval WHERE activity.id=eval.acty_id AND eval.acty_id='$q' AND projects.projects_id=activity.projects_id AND projects.project_code = '$progamadmin' ORDER BY `timestamp` DESC";
          $evaluationresult = mysqli_query($connect, $evaluationsql);
          $number_of_results = mysqli_num_rows($evaluationresult);

          while($evaluationrow=mysqli_fetch_array($evaluationresult)) {
          $no = 1;
        ?>
        <tr>
          <!--<td data-label=""><?php echo $no;?></td>-->
          <td data-label=""><?php echo ucfirst($evaluationrow['first_name']);?></td>
          <td ><?php echo ucfirst($evaluationrow['last_name']);?></td>
          <td><?php echo ($evaluationrow['birthday']);?></td>
          <td><?php echo ($evaluationrow['age_range']);?></td>
          <td><?php echo ($evaluationrow['gender']);?></td>
          <td><?php echo ucfirst($evaluationrow['ethnicity']);?></td>
          <td><?php echo ucfirst($evaluationrow['ct_municipality']);?></td>
          <td><?php echo ucfirst($evaluationrow['provnce']);?></td>
          <td><?php echo ($evaluationrow['q1']);?></td>
          <td><?php echo ($evaluationrow['q2']);?></td>
          <td><?php echo ($evaluationrow['q3']);?></td>
          <td><?php echo ($evaluationrow['q4']);?></td>
          <td><?php echo ($evaluationrow['q5']);?></td>
          <td><?php echo ($evaluationrow['q6']);?></td>
          <td><?php echo ($evaluationrow['q7']);?></td>
          <td><?php echo ($evaluationrow['q8']);?></td>
          <td><?php echo ($evaluationrow['q9']);?></td>
          <td><?php echo ($evaluationrow['q10']);?></td>
          <td><?php echo ($evaluationrow['q11']);?></td>
          <td style="text-transform: normal; text-align: left;"><?php echo ($evaluationrow['q12']);?></td>
          <td style="text-transform: normal; text-align: left;"><?php echo ($evaluationrow['q13']);?></td>
          <td style="text-transform: normal; text-align: left;"><?php echo ($evaluationrow['q14']);?></td>
          <td><?php echo ($evaluationrow['q15']);?></td>
        <?php
            $no++;
          }
          
        ?>
      </tr>
      </tbody>
      
    <!--  <tfoot>
      <?php
        //Total for Question1
        $total1 = "SELECT q1,SUM(q1) AS TOTALQ1 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q1ttl = mysqli_query($connect, $total1);
        $q1_total = mysqli_fetch_array($q1ttl);

        //Total for Question2
        $total2 = "SELECT q2,SUM(q2) AS TOTALQ2 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q2ttl = mysqli_query($connect, $total2);
        $q2_total = mysqli_fetch_array($q2ttl);

        //Total for Question3
        $total3 = "SELECT q3,SUM(q3) AS TOTALQ3 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q3ttl = mysqli_query($connect, $total3);
        $q3_total = mysqli_fetch_array($q3ttl);

        //Total for Question4
        $total4 = "SELECT q4,SUM(q4) AS TOTALQ4 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q4ttl = mysqli_query($connect, $total4);
        $q4_total = mysqli_fetch_array($q4ttl);

        //Total for Question5
        $total5 = "SELECT q5,SUM(q5) AS TOTALQ5 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q5ttl = mysqli_query($connect, $total5);
        $q5_total = mysqli_fetch_array($q5ttl);

        //Total for Question6
        $total6 = "SELECT q6,SUM(q6) AS TOTALQ6 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q6ttl = mysqli_query($connect, $total6);
        $q6_total = mysqli_fetch_array($q6ttl);

        //Total for Question7
        $total7 = "SELECT q7,SUM(q7) AS TOTALQ7 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q7ttl = mysqli_query($connect, $total7);
        $q7_total = mysqli_fetch_array($q7ttl);

        //Total for Question8
        $total8 = "SELECT q8,SUM(q8) AS TOTALQ8 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q8ttl = mysqli_query($connect, $total8);
        $q8_total = mysqli_fetch_array($q8ttl);

        //Total for Question9
        $total9 = "SELECT q9,SUM(q9) AS TOTALQ9 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q9ttl = mysqli_query($connect, $total9);
        $q9_total = mysqli_fetch_array($q9ttl);

        //Total for Question10
        $total10 = "SELECT q10,SUM(q10) AS TOTALQ10 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q10ttl = mysqli_query($connect, $total10);
        $q10_total = mysqli_fetch_array($q10ttl);

        //Total for Question11
        $total11 = "SELECT q11,SUM(q11) AS TOTALQ11 FROM evaluation eval WHERE eval.acty_id='$q' ";
        $q11ttl = mysqli_query($connect, $total11);
        $q11_total = mysqli_fetch_array($q11ttl);
      ?>
        <tr>
          <th colspan="9" style="text-align: right;">Total:</th>
          <td><?php echo $q1_total['TOTALQ1'];?></td>
          <td><?php echo $q2_total['TOTALQ2'];?></td>
          <td><?php echo $q3_total['TOTALQ3'];?></td>
          <td><?php echo $q4_total['TOTALQ4'];?></td>
          <td><?php echo $q5_total['TOTALQ5'];?></td>
          <td><?php echo $q6_total['TOTALQ6'];?></td>
          <td><?php echo $q7_total['TOTALQ7'];?></td>
          <td><?php echo $q8_total['TOTALQ8'];?></td>
          <td><?php echo $q9_total['TOTALQ9'];?></td>
          <td><?php echo $q10_total['TOTALQ10'];?></td>
          <td><?php echo $q11_total['TOTALQ11'];?></td>
        </tr>
      </tfoot> -->    
    </table>
  </div> <!-- div for tab -->

  <input type="radio" id="tabsummary" name="mytabs">
  <label for="tabsummary">Summary</label>
  <div class="tab">
    <h3>Summary</h3><hr>
      <div class="cards">
        <div class="card2"><!-- PARTICIPANTS COUNT -->
        <?php //For total number of Participants for selected Evaluation
          $e_count = "SELECT COUNT(*) AS totalcount FROM evaluation WHERE acty_id='$q' ";
          $e_query = mysqli_query($connect, $e_count);
          $e_array = mysqli_fetch_array($e_query);
        ?>
        <p>Total Number of Respondents:&nbsp;&nbsp;<?php echo $e_array['totalcount'];?></p>
      </div> <!-- END PARTICIPANTS COUNT -->

      <div class="card">
        <table class="subtable">
          <?php //For Age Range COUNT
            $agecount = "SELECT 
                        SUM(IF(age_range BETWEEN 15 and 25,1,0)) as '15-25',
                        SUM(IF(age_range BETWEEN 26 and 35,1,0)) as '26-35',
                        SUM(IF(age_range BETWEEN 36 and 45,1,0)) as '36-45',
                        SUM(IF(age_range BETWEEN 46 and 55,1,0)) as '46-55',
                        SUM(IF(age_range BETWEEN 56 and 65,1,0)) as '56-65',
                        SUM(IF(age_range >= 65, 1, 0)) as 'Over 65'
                        FROM evaluation WHERE acty_id='$q' ";
            $qry_for_agerange = mysqli_query($connect, $agecount);
            $age_row = mysqli_fetch_array($qry_for_agerange);
            
            ?>
            <tr>
              <th>Age Range</th>
              <th>Frequency</th>
              <th>Percentage</th>
            </tr>
            <tr>
              <th>(15-25)</th>
              <td><?php echo $age_row['15-25'];?></td>
              <td></td>
            </tr>
            <tr>
              <th>(26-35)</th>
              <td><?php echo $age_row['26-35'];?></td>
              <td></td>
            </tr>
            <tr>
              <th>(36-45)</th>
              <td><?php echo $age_row['36-45'];?></td>
              <td></td>
            </tr>
            <tr>
              <th>(46-55)</th>
              <td><?php echo $age_row['46-55'];?></td>
              <td></td>
            </tr>
            <tr>
              <th>(56-65)</th>
              <td><?php echo $age_row['56-65'];?></td>
              <td></td>
            </tr>
            <tr>
              <th>(Over 65)</th>
              <td><?php echo $age_row['Over 65'];?></td>
              <td></td>
            </tr>
        </table> <!-- table for AGE RANGE counts -->

      </div>
      <div class="card">
        <?php
          $gender_count = "SELECT COUNT(CASE WHEN gender='Male' THEN 1 END) AS 'MALE', COUNT(CASE WHEN gender='Female' THEN 1 END) AS 'FEMALE' FROM evaluation WHERE acty_id='$q' ";
          $sqlforgender = mysqli_query($connect, $gender_count);
          $gender_count = mysqli_fetch_array($sqlforgender);
        ?>
        <table class="subtable">
          <tr>
            <th>Gender</th>
            <th>Frequecy</th>
            <th>Percentage</th>
          </tr>
          <tr>
            <th>Male</th>
            <td><?php echo $gender_count['MALE'];?></td>
            <td></td>
          </tr>
          <tr>
            <th>Female</th>
            <td><?php echo $gender_count['FEMALE'];?></td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="card">
        <table class="subtable">
          <thead>
            <tr>
              <th>Ethnicity</th>
              <th>Frequency</th>
              <th>Percentage</th>
            </tr>
          </thead>
          
          <?php 
          //MEAN - CAST((COUNT(ethnicity)/COUNT(ethnicity)*100) AS DECIMAL(10,2)) AS ethnic_percent FROM `evaluation` WHERE acty_id='$q' ORDER BY id";
            $mean_for_ethnicity = "SELECT ethnicity,CAST((COUNT(ethnicity)/COUNT(ethnicity)*100) AS DECIMAL(10,2)) AS ethnic_percent FROM `evaluation` WHERE acty_id='$q' ORDER BY id";
            $mean_ethnicity_qry = mysqli_query($connect, $mean_for_ethnicity);
            $mean_ethnicity_row = mysqli_fetch_array($mean_ethnicity_qry);
            
            foreach($connect->query("SELECT DISTINCT ethnicity,COUNT(*) AS ethnic_counts FROM `evaluation` WHERE acty_id='$q' GROUP BY `ethnicity` ORDER BY id") as $ethnic_row_counts) {
          ?>
          <tbody>
            <tr>
              <th><?php echo $ethnic_row_counts['ethnicity'];?></th>
              <td><?php echo ucfirst($ethnic_row_counts['ethnic_counts']);?></td>
              <td><?php echo $mean_ethnicity_row['ethnic_percent'];?></td>
            </tr>
            <?php  } ?>
          </tbody>
        </table> <!-- table for ethnicity counts -->
      </div> <!-- div for ethnicity counts -->

      <div class="card">
        <table class="subtable">
          <thead>
            <tr>
              <th>City/Municipality</th>
              <th>Frequency</th>
              <th>Percentage</th>
            </tr>
          </thead>          
          <?php 
            $mean_for_city = "SELECT ct_municipality,CAST((COUNT(ct_municipality)/COUNT(ct_municipality)*100) AS DECIMAL(10,2)) AS MeanCity FROM `evaluation` WHERE acty_id='$q' ORDER BY id";
            $mean_city_qry = mysqli_query($connect, $mean_for_city);
            $mean_city_row = mysqli_fetch_array($mean_city_qry);
              
            foreach($connect->query("SELECT DISTINCT ct_municipality,COUNT(*) AS city_counts FROM `evaluation` WHERE acty_id='$q' GROUP BY `ct_municipality` ORDER BY id") as $city_row_counts) {
          ?>
          <tbody>
            <tr>
              <th><?php echo $city_row_counts['ct_municipality'];?></th>
              <td><?php echo ucfirst($city_row_counts['city_counts']);?></td>
              <td><?php echo $mean_city_row['MeanCity'];?></td>
            </tr>
            <?php  } ?>
          </tbody>
        </table> <!-- table for city/municipality counts -->
      </div> <!-- div for city/municipality counts -->

      <div class="card">
        <table class="subtable">
          <thead>
            <tr>
              <th>Province</th>
              <th>Frequency</th>
              <th>Percentage</th>
            </tr>
          </thead>
          <?php 
            $mean_for_province = "SELECT provnce,CAST((COUNT(provnce)/COUNT(provnce)*100) AS DECIMAL(10,2)) AS MeanProvince FROM `evaluation` WHERE acty_id='$q' ORDER BY id";
            $mean_province_qry = mysqli_query($connect, $mean_for_province);
            $mean_province_row = mysqli_fetch_array($mean_province_qry);
              
            foreach($connect->query("SELECT DISTINCT provnce,COUNT(*) AS province_counts FROM `evaluation` WHERE acty_id='$q' GROUP BY `provnce` ORDER BY id") as $province_row_counts) {
          ?>
          <tbody>
            <tr>
              <th><?php echo $province_row_counts['provnce'];?></th>
              <td><?php echo ucfirst($province_row_counts['province_counts']);?></td>
              <td><?php echo $mean_province_row['MeanProvince'];?></td>
            </tr>
            <?php  } ?>
          </tbody>
        </table> <!-- table for province counts -->
      </div> <!-- div for province counts -->

      <div class="card1" col-span-3>
        <table class="subtable">
          <?php
            //Question 1 Count
            //$percentagesql1 = "SELECT q1,(SUM(q1)/COUNT(q1))*100 AS PERCENTAGE1 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentagesql1 = "SELECT q1, 
                                COUNT(CASE q1 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q1 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q1 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q1 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q1 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage1 = mysqli_query($connect, $percentagesql1);
            $percentage_q1 = mysqli_fetch_array($percentage1);
            
            //Question 2 Count
            $percentagesql2 = "SELECT q2, 
                                COUNT(CASE q2 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q2 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q2 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q2 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q2 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage2 = mysqli_query($connect, $percentagesql2);
            $percentage_q2 = mysqli_fetch_array($percentage2);

            //Question 3 Count
            $percentagesql3 = "SELECT q3, 
                                COUNT(CASE q3 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q3 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q3 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q3 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q3 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage3 = mysqli_query($connect, $percentagesql3);
            $percentage_q3 = mysqli_fetch_array($percentage3);

            //Question 4 Count
            $percentagesql4 = "SELECT q4, 
                                COUNT(CASE q4 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q4 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q4 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q4 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q4 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage4 = mysqli_query($connect, $percentagesql4);
            $percentage_q4 = mysqli_fetch_array($percentage4);

            //Question 5 Count
            $percentagesql5 = "SELECT q5, 
                                COUNT(CASE q5 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q5 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q5 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q5 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q5 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage5 = mysqli_query($connect, $percentagesql5);
            $percentage_q5 = mysqli_fetch_array($percentage5);

            //Question 6 Count
            $percentagesql6 = "SELECT q6, 
                                COUNT(CASE q6 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q6 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q6 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q6 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q6 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage6 = mysqli_query($connect, $percentagesql6);
            $percentage_q6 = mysqli_fetch_array($percentage6);

            //Question 7 Count
            $percentagesql7 = "SELECT q7, 
                                COUNT(CASE q7 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q7 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q7 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q7 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q7 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage7 = mysqli_query($connect, $percentagesql7);
            $percentage_q7 = mysqli_fetch_array($percentage7);

            //Question 8 Count
            $percentagesql8 = "SELECT q8, 
                                COUNT(CASE q8 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q8 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q8 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q8 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q8 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage8 = mysqli_query($connect, $percentagesql8);
            $percentage_q8 = mysqli_fetch_array($percentage8);

            //Question 9 Count
            $percentagesql9 = "SELECT q9, 
                                COUNT(CASE q9 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q9 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q9 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q9 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q9 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage9 = mysqli_query($connect, $percentagesql9);
            $percentage_q9 = mysqli_fetch_array($percentage9);

            //Question 10 Count
            $percentagesql10 = "SELECT q10, 
                                COUNT(CASE q10 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q10 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q10 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q10 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q10 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage10 = mysqli_query($connect, $percentagesql10);
            $percentage_q10 = mysqli_fetch_array($percentage10);

            //Question 11 Count
            $percentagesql11 = "SELECT q11, 
                                COUNT(CASE q11 WHEN 'Very Poor' THEN 1 ELSE NULL END) AS One,
                                COUNT(CASE q11 WHEN 'Poor' THEN 1 ELSE NULL END) AS Two,
                                COUNT(CASE q11 WHEN 'Okay' THEN 1 ELSE NULL END) AS Three,
                                COUNT(CASE q11 WHEN 'Good' THEN 1 ELSE NULL END) AS Four,
                                COUNT(CASE q11 WHEN 'Very Good' THEN 1 ELSE NULL END) AS Five
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage11 = mysqli_query($connect, $percentagesql11);
            $percentage_q11 = mysqli_fetch_array($percentage11);

            $percentagesql15 = "SELECT q15, 
                                COUNT(CASE q15 WHEN 'Not familiar at all' THEN 1 ELSE NULL END) AS NF,
                                COUNT(CASE q15 WHEN 'Slightly familiar' THEN 1 ELSE NULL END) AS SF,
                                COUNT(CASE q15 WHEN 'Moderately familiar' THEN 1 ELSE NULL END) AS MF,
                                COUNT(CASE q15 WHEN 'Very familiar' THEN 1 ELSE NULL END) AS VF
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $percentage15 = mysqli_query($connect, $percentagesql15);
            $percentage_q15 = mysqli_fetch_array($percentage15);
            
            //MEAN || Percentage for Question 1
            $meanq1 = "SELECT q1,ROUND(AVG(q1), 3) AS MEAN1 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq1 = mysqli_query($connect, $meanq1);
            $meanforq1 = mysqli_fetch_array($meanqryq1);

            //MEAN || Percentage for Question 2
            $meanq2 = "SELECT q2,ROUND(AVG(q2), 3) AS MEAN2 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq2 = mysqli_query($connect, $meanq2);
            $meanforq2 = mysqli_fetch_array($meanqryq2);

            //MEAN || Percentage for Question 3
            $meanq3 = "SELECT q3,ROUND(AVG(q3), 3) AS MEAN3 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq3 = mysqli_query($connect, $meanq3);
            $meanforq3 = mysqli_fetch_array($meanqryq3);

            //MEAN || Percentage for Question 4
            $meanq4 = "SELECT q4,ROUND(AVG(q4), 3) AS MEAN4 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq4 = mysqli_query($connect, $meanq4);
            $meanforq4 = mysqli_fetch_array($meanqryq4);

            //MEAN || Percentage for Question 5
            $meanq5 = "SELECT q5,ROUND(AVG(q5), 3) AS MEAN5 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq5 = mysqli_query($connect, $meanq5);
            $meanforq5 = mysqli_fetch_array($meanqryq5);

            //MEAN || Percentage for Question 6
            $meanq6 = "SELECT q6,ROUND(AVG(q6), 3) AS MEAN6 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq6 = mysqli_query($connect, $meanq6);
            $meanforq6 = mysqli_fetch_array($meanqryq6);

            //MEAN || Percentage for Question 7
            $meanq7 = "SELECT q7,ROUND(AVG(q7), 3) AS MEAN7 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq7 = mysqli_query($connect, $meanq7);
            $meanforq7 = mysqli_fetch_array($meanqryq7);

            //MEAN || Percentage for Question 8
            $meanq8 = "SELECT q8,ROUND(AVG(q8), 3) AS MEAN8 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq8 = mysqli_query($connect, $meanq8);
            $meanforq8 = mysqli_fetch_array($meanqryq8);

            //MEAN || Percentage for Question 9
            $meanq9 = "SELECT q9,ROUND(AVG(q9), 3) AS MEAN9 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq9 = mysqli_query($connect, $meanq9);
            $meanforq9 = mysqli_fetch_array($meanqryq9);

            //MEAN || Percentage for Question 10
            $meanq10 = "SELECT q10,ROUND(AVG(q10), 3) AS MEAN10 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq10 = mysqli_query($connect, $meanq10);
            $meanforq10 = mysqli_fetch_array($meanqryq10);

            //MEAN || Percentage for Question 11
            $meanq11 = "SELECT q11,ROUND(AVG(q11), 3) AS MEAN11 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq11 = mysqli_query($connect, $meanq11);
            $meanforq11 = mysqli_fetch_array($meanqryq11);

            //MEAN || Percentage for Question 15
            $meanq15 = "SELECT q15,ROUND(AVG(q15), 3) AS MEAN15 FROM evaluation WHERE acty_id='$q' ";
            $meanqryq15 = mysqli_query($connect, $meanq15);
            $meanforq15 = mysqli_fetch_array($meanqryq15);
          ?>
          <tr>
            <th></th>
            <th>Question 1</th>
            <th>Question 2</th>
            <th>Question 3</th>
            <th>Question 4</th>
            <th>Question 5</th>
            <th>Question 6</th>
            <th>Question 7</th>
            <th>Question 8</th>
            <th>Question 9</th>
            <th>Question 10</th>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Strongly Disagree</th>
            <td><?php echo $percentage_q1['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q2['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q3['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q4['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q5['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q6['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q7['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q8['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q9['StronglyDisagree'];?></td>
            <td><?php echo $percentage_q10['StronglyDisagree'];?></td>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Disagree</th>
            <td><?php echo $percentage_q1['Disagree'];?></td>
            <td><?php echo $percentage_q2['Disagree'];?></td>
            <td><?php echo $percentage_q3['Disagree'];?></td>
            <td><?php echo $percentage_q4['Disagree'];?></td>
            <td><?php echo $percentage_q5['Disagree'];?></td>
            <td><?php echo $percentage_q6['Disagree'];?></td>
            <td><?php echo $percentage_q7['Disagree'];?></td>
            <td><?php echo $percentage_q8['Disagree'];?></td>
            <td><?php echo $percentage_q9['Disagree'];?></td>
            <td><?php echo $percentage_q10['Disagree'];?></td>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Undecided</th>
            <td><?php echo $percentage_q1['Undecided'];?></td>
            <td><?php echo $percentage_q2['Undecided'];?></td>
            <td><?php echo $percentage_q3['Undecided'];?></td>
            <td><?php echo $percentage_q4['Undecided'];?></td>
            <td><?php echo $percentage_q5['Undecided'];?></td>
            <td><?php echo $percentage_q6['Undecided'];?></td>
            <td><?php echo $percentage_q7['Undecided'];?></td>
            <td><?php echo $percentage_q8['Undecided'];?></td>
            <td><?php echo $percentage_q9['Undecided'];?></td>
            <td><?php echo $percentage_q10['Undecided'];?></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: right;">Agree</th>
            <td><?php echo $percentage_q1['Agree'];?></td>
            <td><?php echo $percentage_q2['Agree'];?></td>
            <td><?php echo $percentage_q3['Agree'];?></td>
            <td><?php echo $percentage_q4['Agree'];?></td>
            <td><?php echo $percentage_q5['Agree'];?></td>
            <td><?php echo $percentage_q6['Agree'];?></td>
            <td><?php echo $percentage_q7['Agree'];?></td>
            <td><?php echo $percentage_q8['Agree'];?></td>
            <td><?php echo $percentage_q9['Agree'];?></td>
            <td><?php echo $percentage_q10['Agree'];?></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: right;">Strongly Agree</th>
            <td><?php echo $percentage_q1['StronglyAgree'];?></td>
            <td><?php echo $percentage_q2['StronglyAgree'];?></td>
            <td><?php echo $percentage_q3['StronglyAgree'];?></td>
            <td><?php echo $percentage_q4['StronglyAgree'];?></td>
            <td><?php echo $percentage_q5['StronglyAgree'];?></td>
            <td><?php echo $percentage_q6['StronglyAgree'];?></td>
            <td><?php echo $percentage_q7['StronglyAgree'];?></td>
            <td><?php echo $percentage_q8['StronglyAgree'];?></td>
            <td><?php echo $percentage_q9['StronglyAgree'];?></td>
            <td><?php echo $percentage_q10['StronglyAgree'];?></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: right;">Mean</th>
            <td><?php echo $meanforq1['MEAN1'];?></td>
            <td><?php echo $meanforq2['MEAN2'];?></td>
            <td><?php echo $meanforq3['MEAN3'];?></td>
            <td><?php echo $meanforq4['MEAN4'];?></td>
            <td><?php echo $meanforq5['MEAN5'];?></td>
            <td><?php echo $meanforq6['MEAN6'];?></td>
            <td><?php echo $meanforq7['MEAN7'];?></td>
            <td><?php echo $meanforq8['MEAN8'];?></td>
            <td><?php echo $meanforq9['MEAN9'];?></td>
            <td><?php echo $meanforq10['MEAN10'];?></td>
          </tr>
        </table> <!-- table for each question counts-->
      </div> <!-- div for each question counts-->

      <div class="card">
        <table class="subtable">
          <tr><th style="text-align: center;">Question 11 (Overall rating)</th><th style="text-align: center;">Frequency</th><th>Percentage</th></tr>
          <tr>
            <th style="text-align: right;">Very Poor</th>
            <td><?php echo $percentage_q11['One'];?></td>
            <td></td>
          </tr>
          <tr>
            <th style="text-align: right;">Poor</th>
            <td><?php echo $percentage_q11['Two'];?></td>
            <td></td>
          </tr>
          <tr>
            <th style="text-align: right;">Okay</th>
            <td><?php echo $percentage_q11['Three'];?></td>
            <td></td>
          </tr>
          <tr>
            <th style="text-align: right;">Good</th>
            <td><?php echo $percentage_q11['Four'];?></td>
            <td></td>
          </tr>
          <tr>
            <th style="text-align: right;">Very Good</th>
            <td><?php echo $percentage_q11['Five'];?></td>
            <td></td>
          </tr>
          <!--<tr><th>Mean</th><td><?php echo $meanforq11['MEAN11'];?></td></tr>-->
        </table> <!-- table for each question 11 counts-->
      </div> <!-- div for each question 11 counts-->

      <div class="card">
        <table class="subtable">
        <tr>
          <th>Question 15</th>
          <th style="text-align: center;">Frequency</th>
          <th>Percentage</th>
        </tr>
          <tr>
            <th colspan="" style="text-align: right;">Not familiar at all</th>
            <td><?php echo $percentage_q15['NF'];?></td>
            <td></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Slightly familiar</th>
            <td><?php echo $percentage_q15['SF'];?></td>
            <td></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Moderately familiar</th>
            <td><?php echo $percentage_q15['MF'];?></td>
            <td></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Very familiar</th>
            <td><?php echo $percentage_q15['VF'];?></td>
            <td></td>
          </tr>
          
        </table> <!-- table for each question 15 counts-->
      </div> <!-- div for each question 15 counts-->
    </div> <!-- end of div cards-->
      
      
  </div> <!-- div for tab -->

  <input type="radio" id="tabcharts" name="mytabs">
  <label for="tabcharts">Charts</label>
  <div class="tab">
    <h3>Charts</h3><hr>
    Still on progress....
  </div> <!-- div for tab -->

</div> <!-- div for mytab -->

<br>
</body>
</html>