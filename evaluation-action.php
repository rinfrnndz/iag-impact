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

/* Style the tab */
.tab {
  float: left;
  border: 0px solid #fff;
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
  display: none;
}
</style>
<script type="text/javasript" src="jquery-3.6.0.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
</head>

<body>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Participants')" id="defaultOpen">Respondents</button>
  <button class="tablinks" onclick="openCity(event, 'Summary')">Summary</button>
  <button class="tablinks" onclick="openCity(event, 'Chart')">Chart</button>
</div>

<div id="Participants" class="tabcontent">
  
  <table class="table">
    <thead >
        <tr>
            <th></th>
            <th colspan="7" style="text-align: center;">Basic Information</th>
            <th colspan="6" style="text-align: center;">Activity Proper</th>
            <th colspan="4" style="text-align: center;">Sustainability</th>
            <th></th>
            <th colspan="3" style="text-align: center;">Other comments</th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th colspan="2" style="text-align: center;">Name</th>
            <!-- <th>Date of Birth</th> -->
            <th style="text-align: center;">Age Range</th>
            <th style="text-align: center;">Gender</th>
            <th style="text-align: center;">Ethnicity</th>
            <th style="text-align: center;">City/ Municipality</th>
            <th style="text-align: center;">Province</th>
            <th style="text-align: center;">Question 1</th>
            <th style="text-align: center;">Question 2</th>
            <th style="text-align: center;">Question 3</th>
            <th style="text-align: center;">Question 4</th>
            <th style="text-align: center;">Question 5</th>
            <th style="text-align: center;">Question 6</th>
            <th style="text-align: center;">Question 7</th>
            <th style="text-align: center;">Question 8</th>
            <th style="text-align: center;">Question 9</th>
            <th style="text-align: center;">Question 10</th>
            <th style="text-align: center;">Question 11</th>
            <th style="text-align: center;">Question 12</th>
            <th style="text-align: center;">Question 13</th>
            <th style="text-align: center;">Question 14</th>
            <th style="text-align: center;">Question 15</th>
        </tr>
    </thead>
      
    <tbody>
    <?php
        $results_per_page = 5; //number every page
        $page = '';
        if (isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 1; };
        $this_page_first_result = ($page-1)*$results_per_page;
          
        $evaluationsql = "SELECT *
                          FROM projectcode prj
                          INNER JOIN activities act ON  act.projects_id = prj.projects_id
                          INNER JOIN evaluation e ON act.id = e.acty_id
                          WHERE prj.project_code = '$progamadmin' AND e.acty_id = '$q'
                          ORDER BY e.id DESC "; //LIMIT $this_page_first_result, $results_per_page 
                    
        $evaluationresult = mysqli_query($connect, $evaluationsql);
        $number_of_results = mysqli_num_rows($evaluationresult);

        $no = 1;
        while($evaluationrow=mysqli_fetch_array($evaluationresult)) {
          
    ?>
        <tr>
          <td data-label=""><?php echo $no;?></td>
          <td data-label=""><?php echo ucfirst($evaluationrow['first_name']);?></td>
          <td ><?php echo ucfirst($evaluationrow['last_name']);?></td>
          <!-- <td><?php //echo ($evaluationrow['birthday']);?></td> -->
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
     
  </table>
  <!--<div align= "center">
    <?php
       $page_query = "SELECT COUNT(*) 
                      FROM projectcode prj
                      INNER JOIN activities act ON  act.projects_id = prj.projects_id
                      INNER JOIN evaluation e ON act.id = e.acty_id
                      WHERE prj.project_code = '$progamadmin' AND e.acty_id = '$q' ";
          
        $page_result = mysqli_query($connect, $page_query);
        $total_records = mysqli_fetch_array($page_result);
        $total_of_records = $total_records[0];
        $number_of_page = ceil($total_of_records/$results_per_page);
         
        for ($page=1; $page<=$number_of_page; $page++){
           echo '<a style="padding:7px; background:black; color:white; font-family:Helvetica; border:1px solid gray; border-radius:14px;" href="evaluation-report?' .$q. '&page=' .$page. ' ">' .$page. '</a>';
        }
    ?>
    </div> -->
</div> <!-- end div for Respondents-->

<div id="Summary" class="tabcontent">
  
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
            $agecount = "SELECT age_range,
                        COUNT(CASE age_range WHEN '15 - 25' THEN 1 ELSE NULL END) as '15-25',
                        COUNT(CASE age_range WHEN '26 - 35' THEN 1 ELSE NULL END) as '26-35',
                        COUNT(CASE age_range WHEN '36 - 45' THEN 1 ELSE NULL END) as '36-45',
                        COUNT(CASE age_range WHEN '46 - 55' THEN 1 ELSE NULL END) as '46-55',
                        COUNT(CASE age_range WHEN '56 - 65' THEN 1 ELSE NULL END) as '56-65',
                        COUNT(CASE age_range WHEN 'Over 65' THEN 1 ELSE NULL END) as 'Over 65'
                        FROM evaluation WHERE acty_id='$q' ";
            $qry_for_agerange = mysqli_query($connect, $agecount);
            $age_row = mysqli_fetch_array($qry_for_agerange);
            
            ?>
            <tr>
              <th>Age Range</th>
              <th>Frequency</th>
              <!-- <th>Percentage</th> -->
            </tr>
            <tr>
              <th>(15-25)</th>
              <td><?php echo $age_row['15-25'];?></td>
              <!--<td></td>-->
            </tr>
            <tr>
              <th>(26-35)</th>
              <td><?php echo $age_row['26-35'];?></td>
               <!--<td></td>-->
            </tr>
            <tr>
              <th>(36-45)</th>
              <td><?php echo $age_row['36-45'];?></td>
               <!--<td></td>-->
            </tr>
            <tr>
              <th>(46-55)</th>
              <td><?php echo $age_row['46-55'];?></td>
               <!--<td></td>-->
            </tr>
            <tr>
              <th>(56-65)</th>
              <td><?php echo $age_row['56-65'];?></td>
               <!--<td></td>-->
            </tr>
            <tr>
              <th>(Over 65)</th>
              <td><?php echo $age_row['Over 65'];?></td>
               <!--<td></td>-->
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
            <!-- <th>Percentage</th> -->
          </tr>
          <tr>
            <th>Male</th>
            <td><?php echo $gender_count['MALE'];?></td>
            <!--<td></td>-->
          </tr>
          <tr>
            <th>Female</th>
            <td><?php echo $gender_count['FEMALE'];?></td>
            <!--<td></td>-->
          </tr>
        </table>
      </div>
      <div class="card">
        <table class="subtable">
          <thead>
            <tr>
              <th>Ethnicity</th>
              <th>Frequency</th>
              <!-- <th>Percentage</th> -->
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
              <!-- <td><?php //echo $mean_ethnicity_row['ethnic_percent'];?></td> -->
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
              <!-- <th>Percentage</th> -->
            </tr>
          </thead>          
          <?php 
            $mean_for_city = "SELECT ct_municipality,CAST((COUNT(*)/SUM(ct_municipality)*100) AS DECIMAL(10,2)) AS MeanCity FROM `evaluation` WHERE acty_id='$q' ORDER BY id";
            $mean_city_qry = mysqli_query($connect, $mean_for_city);
            $mean_city_row = mysqli_fetch_array($mean_city_qry);
              
            foreach($connect->query("SELECT DISTINCT ct_municipality,COUNT(*) AS city_counts FROM `evaluation` WHERE acty_id='$q' GROUP BY `ct_municipality` ORDER BY id") as $city_row_counts) {
          ?>
          <tbody>
            <tr>
              <th><?php echo $city_row_counts['ct_municipality'];?></th>
              <td><?php echo ucfirst($city_row_counts['city_counts']);?></td>
              <!--<td><?php //echo $mean_city_row['MeanCity'];?></td>-->
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
              <!-- <th>Percentage</th> -->
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
              <!-- <td><?php //echo $mean_province_row['MeanProvince'];?></td> -->
            </tr>
            <?php  } ?>
          </tbody>
        </table> <!-- table for province counts -->
      </div> <!-- div for province counts -->

      <div class="card1" col-span-3>
        <table class="subtable">
          <?php
            //Question 1 Count
            $count_for_q1 = "SELECT q1, 
                                COUNT(CASE q1 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q1 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q1 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q1 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q1 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q1 = mysqli_query($connect, $count_for_q1);
            $number_of_counts_q1 = mysqli_fetch_array($count_qry_q1);
            
            //Total answers for Question 1
            $answers_for_q1 = "SELECT COUNT(q1) AS total_response_for_q1 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry1_for_total_answers = mysqli_query($connect, $answers_for_q1);
            $total_answers_for_q1 = mysqli_fetch_array($qry1_for_total_answers);

            //Question 2 Count
            $count_for_q2 = "SELECT q2, 
                                COUNT(CASE q2 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q2 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q2 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q2 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q2 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q2 = mysqli_query($connect, $count_for_q2);
            $number_of_counts_q2 = mysqli_fetch_array($count_qry_q2);

            //Total answers for Question 2
            $answers_for_q2 = "SELECT COUNT(q2) AS total_response_for_q2 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry2_for_total_answers = mysqli_query($connect, $answers_for_q2);
            $total_answers_for_q2 = mysqli_fetch_array($qry2_for_total_answers);

            //Question 3 Count
            $count_for_q3 = "SELECT q3, 
                                COUNT(CASE q3 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q3 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q3 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q3 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q3 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q3 = mysqli_query($connect, $count_for_q3);
            $number_of_counts_q3 = mysqli_fetch_array($count_qry_q3);

            //Total answers for Question 3
            $answers_for_q3 = "SELECT COUNT(q3) AS total_response_for_q3 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry3_for_total_answers = mysqli_query($connect, $answers_for_q3);
            $total_answers_for_q3 = mysqli_fetch_array($qry3_for_total_answers);

            //Question 4 Count
            $count_for_q4 = "SELECT q4, 
                                COUNT(CASE q4 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q4 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q4 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q4 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q4 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q4 = mysqli_query($connect, $count_for_q4);
            $number_of_counts_q4 = mysqli_fetch_array($count_qry_q4);

            //Total answers for Question 4
            $answers_for_q4 = "SELECT COUNT(q4) AS total_response_for_q4 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry4_for_total_answers = mysqli_query($connect, $answers_for_q4);
            $total_answers_for_q4 = mysqli_fetch_array($qry4_for_total_answers);

            //Question 5 Count
            $count_for_q5 = "SELECT q5, 
                                COUNT(CASE q5 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q5 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q5 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q5 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q5 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q5 = mysqli_query($connect, $count_for_q5);
            $number_of_counts_q5 = mysqli_fetch_array($count_qry_q5);

            //Total answers for Question 5
            $answers_for_q5 = "SELECT COUNT(q5) AS total_response_for_q5 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry5_for_total_answers = mysqli_query($connect, $answers_for_q5);
            $total_answers_for_q5 = mysqli_fetch_array($qry5_for_total_answers);

            //Question 6 Count
            $count_for_q6 = "SELECT q6, 
                                COUNT(CASE q6 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q6 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q6 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q6 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q6 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q6 = mysqli_query($connect, $count_for_q6);
            $number_of_counts_q6 = mysqli_fetch_array($count_qry_q6);

            //Total answers for Question 6
            $answers_for_q6 = "SELECT COUNT(q6) AS total_response_for_q6 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry6_for_total_answers = mysqli_query($connect, $answers_for_q6);
            $total_answers_for_q6 = mysqli_fetch_array($qry6_for_total_answers);

            //Question 7 Count
            $count_for_q7 = "SELECT q7, 
                                COUNT(CASE q7 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q7 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q7 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q7 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q7 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q7 = mysqli_query($connect, $count_for_q7);
            $number_of_counts_q7 = mysqli_fetch_array($count_qry_q7);

            //Total answers for Question 7
            $answers_for_q7 = "SELECT COUNT(q7) AS total_response_for_q7 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry7_for_total_answers = mysqli_query($connect, $answers_for_q7);
            $total_answers_for_q7 = mysqli_fetch_array($qry7_for_total_answers);

            //Question 8 Count
            $count_for_q8 = "SELECT q8, 
                                COUNT(CASE q8 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q8 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q8 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q8 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q8 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q8 = mysqli_query($connect, $count_for_q8);
            $number_of_counts_q8 = mysqli_fetch_array($count_qry_q8);

            //Total answers for Question 8
            $answers_for_q8 = "SELECT COUNT(q8) AS total_response_for_q8 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry8_for_total_answers = mysqli_query($connect, $answers_for_q8);
            $total_answers_for_q8 = mysqli_fetch_array($qry8_for_total_answers);

            //Question 9 Count
            $count_for_q9 = "SELECT q9, 
                                COUNT(CASE q9 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q9 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q9 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q9 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q9 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q9 = mysqli_query($connect, $count_for_q9);
            $number_of_counts_q9 = mysqli_fetch_array($count_qry_q9);

            //Total answers for Question 9
            $answers_for_q9 = "SELECT COUNT(q9) AS total_response_for_q9 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry9_for_total_answers = mysqli_query($connect, $answers_for_q9);
            $total_answers_for_q9 = mysqli_fetch_array($qry9_for_total_answers);

            //Question 10 Count
            $count_for_q10 = "SELECT q10, 
                                COUNT(CASE q10 WHEN '1' THEN 1 ELSE NULL END) AS StronglyDisagree,
                                COUNT(CASE q10 WHEN '2' THEN 1 ELSE NULL END) AS Disagree,
                                COUNT(CASE q10 WHEN '3' THEN 1 ELSE NULL END) AS Undecided,
                                COUNT(CASE q10 WHEN '4' THEN 1 ELSE NULL END) AS Agree,
                                COUNT(CASE q10 WHEN '5' THEN 1 ELSE NULL END) AS StronglyAgree
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q10 = mysqli_query($connect, $count_for_q10);
            $number_of_counts_q10 = mysqli_fetch_array($count_qry_q10);

            //Total answers for Question 10
            $answers_for_q10 = "SELECT COUNT(q10) AS total_response_for_q10 FROM evaluation eval WHERE eval.acty_id='$q' ";
            $qry10_for_total_answers = mysqli_query($connect, $answers_for_q10);
            $total_answers_for_q10 = mysqli_fetch_array($qry10_for_total_answers);

            //Question 11 Count
            $count_for_q11 = "SELECT q11, 
                                COUNT(CASE q11 WHEN 'Very Poor' THEN 1 ELSE NULL END) AS One,
                                COUNT(CASE q11 WHEN 'Poor' THEN 1 ELSE NULL END) AS Two,
                                COUNT(CASE q11 WHEN 'Okay' THEN 1 ELSE NULL END) AS Three,
                                COUNT(CASE q11 WHEN 'Good' THEN 1 ELSE NULL END) AS Four,
                                COUNT(CASE q11 WHEN 'Very Good' THEN 1 ELSE NULL END) AS Five
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q11 = mysqli_query($connect, $count_for_q11);
            $number_of_counts_q11 = mysqli_fetch_array($count_qry_q11);

            //Question 15 Count
            $count_for_q15 = "SELECT q15, 
                                COUNT(CASE q15 WHEN 'Not familiar at all' THEN 1 ELSE NULL END) AS NF,
                                COUNT(CASE q15 WHEN 'Slightly familiar' THEN 1 ELSE NULL END) AS SF,
                                COUNT(CASE q15 WHEN 'Moderately familiar' THEN 1 ELSE NULL END) AS MF,
                                COUNT(CASE q15 WHEN 'Very familiar' THEN 1 ELSE NULL END) AS VF
                                FROM evaluation eval WHERE eval.acty_id='$q' ";
            $count_qry_q15 = mysqli_query($connect, $count_for_q15);
            $number_of_counts_q15 = mysqli_fetch_array($count_qry_q15);
            
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
            <td><?php echo $number_of_counts_q1['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q2['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q3['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q4['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q5['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q6['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q7['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q8['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q9['StronglyDisagree'];?></td>
            <td><?php echo $number_of_counts_q10['StronglyDisagree'];?></td>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Disagree</th>
            <td><?php echo $number_of_counts_q1['Disagree'];?></td>
            <td><?php echo $number_of_counts_q2['Disagree'];?></td>
            <td><?php echo $number_of_counts_q3['Disagree'];?></td>
            <td><?php echo $number_of_counts_q4['Disagree'];?></td>
            <td><?php echo $number_of_counts_q5['Disagree'];?></td>
            <td><?php echo $number_of_counts_q6['Disagree'];?></td>
            <td><?php echo $number_of_counts_q7['Disagree'];?></td>
            <td><?php echo $number_of_counts_q8['Disagree'];?></td>
            <td><?php echo $number_of_counts_q9['Disagree'];?></td>
            <td><?php echo $number_of_counts_q10['Disagree'];?></td>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Undecided</th>
            <td><?php echo $number_of_counts_q1['Undecided'];?></td>
            <td><?php echo $number_of_counts_q2['Undecided'];?></td>
            <td><?php echo $number_of_counts_q3['Undecided'];?></td>
            <td><?php echo $number_of_counts_q4['Undecided'];?></td>
            <td><?php echo $number_of_counts_q5['Undecided'];?></td>
            <td><?php echo $number_of_counts_q6['Undecided'];?></td>
            <td><?php echo $number_of_counts_q7['Undecided'];?></td>
            <td><?php echo $number_of_counts_q8['Undecided'];?></td>
            <td><?php echo $number_of_counts_q9['Undecided'];?></td>
            <td><?php echo $number_of_counts_q10['Undecided'];?></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: right;">Agree</th>
            <td><?php echo $number_of_counts_q1['Agree'];?></td>
            <td><?php echo $number_of_counts_q2['Agree'];?></td>
            <td><?php echo $number_of_counts_q3['Agree'];?></td>
            <td><?php echo $number_of_counts_q4['Agree'];?></td>
            <td><?php echo $number_of_counts_q5['Agree'];?></td>
            <td><?php echo $number_of_counts_q6['Agree'];?></td>
            <td><?php echo $number_of_counts_q7['Agree'];?></td>
            <td><?php echo $number_of_counts_q8['Agree'];?></td>
            <td><?php echo $number_of_counts_q9['Agree'];?></td>
            <td><?php echo $number_of_counts_q10['Agree'];?></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: right;">Strongly Agree</th>
            <td><?php echo $number_of_counts_q1['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q2['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q3['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q4['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q5['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q6['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q7['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q8['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q9['StronglyAgree'];?></td>
            <td><?php echo $number_of_counts_q10['StronglyAgree'];?></td>
          </tr>

        </table> <!-- table for each question counts-->
      </div> <!-- div for each question counts-->
      
      <!-- for Percentage -->
      <div class="card1" col-span-3>
        <table class="subtable" style="height: 100%;">
          <?php
            //PERCENTAGE || Percentage for Question 1
            $percent_for_q1 = " SELECT q1,
                                  CONCAT(ROUND(COUNT(CASE q1 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q1 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q1 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q1 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q1 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q1 = mysqli_query($connect, $percent_for_q1);
            $percent_of_q1 = mysqli_fetch_array($percent_qry_q1);
            
            $percent_for_q2 = " SELECT q2,
                                  CONCAT(ROUND(COUNT(CASE q2 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q2 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q2 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q2 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q2 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q2 = mysqli_query($connect, $percent_for_q2);
            $percent_of_q2 = mysqli_fetch_array($percent_qry_q2);
            
            $percent_for_q3 = " SELECT q3,
                                  CONCAT(ROUND(COUNT(CASE q3 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q3 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q3 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q3 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q3 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q3 = mysqli_query($connect, $percent_for_q3);
            $percent_of_q3 = mysqli_fetch_array($percent_qry_q3);

            $percent_for_q4 = " SELECT q4,
                                  CONCAT(ROUND(COUNT(CASE q4 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q4 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q4 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q4 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q4 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q4 = mysqli_query($connect, $percent_for_q4);
            $percent_of_q4 = mysqli_fetch_array($percent_qry_q4);

            $percent_for_q5 = " SELECT q5,
                                  CONCAT(ROUND(COUNT(CASE q5 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q5 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q5 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q5 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q5 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q5 = mysqli_query($connect, $percent_for_q5);
            $percent_of_q5 = mysqli_fetch_array($percent_qry_q5);

            $percent_for_q6 = " SELECT q6,
                                  CONCAT(ROUND(COUNT(CASE q6 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q6 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q6 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q6 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q6 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q6 = mysqli_query($connect, $percent_for_q6);
            $percent_of_q6 = mysqli_fetch_array($percent_qry_q6);

            $percent_for_q7 = " SELECT q7,
                                  CONCAT(ROUND(COUNT(CASE q7 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q7 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q7 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q7 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q7 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q7 = mysqli_query($connect, $percent_for_q7);
            $percent_of_q7 = mysqli_fetch_array($percent_qry_q7);

            $percent_for_q8 = " SELECT q8,
                                  CONCAT(ROUND(COUNT(CASE q8 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q8 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q8 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q8 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q8 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q8 = mysqli_query($connect, $percent_for_q8);
            $percent_of_q8 = mysqli_fetch_array($percent_qry_q8);

            $percent_for_q9 = " SELECT q9,
                                  CONCAT(ROUND(COUNT(CASE q9 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q9 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q9 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q9 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q9 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q9 = mysqli_query($connect, $percent_for_q9);
            $percent_of_q9 = mysqli_fetch_array($percent_qry_q9);

            $percent_for_q10 = " SELECT q10,
                                  CONCAT(ROUND(COUNT(CASE q10 WHEN '1' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SD_percent,
                                  CONCAT(ROUND(COUNT(CASE q10 WHEN '2' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS D_percent,
                                  CONCAT(ROUND(COUNT(CASE q10 WHEN '3' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS U_percent,
                                  CONCAT(ROUND(COUNT(CASE q10 WHEN '4' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS A_percent,
                                  CONCAT(ROUND(COUNT(CASE q10 WHEN '5' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS SA_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q10 = mysqli_query($connect, $percent_for_q10);
            $percent_of_q10 = mysqli_fetch_array($percent_qry_q10);

            $percent_for_q11 = " SELECT q11,
                                  CONCAT(ROUND(COUNT(CASE q11 WHEN 'Very Poor' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS VP_percent,
                                  CONCAT(ROUND(COUNT(CASE q11 WHEN 'Poor' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS P_percent,
                                  CONCAT(ROUND(COUNT(CASE q11 WHEN 'Okay' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS O_percent,
                                  CONCAT(ROUND(COUNT(CASE q11 WHEN 'Good' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS G_percent,
                                  CONCAT(ROUND(COUNT(CASE q11 WHEN 'Very Good' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS VG_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q11 = mysqli_query($connect, $percent_for_q11);
            $percent_of_q11 = mysqli_fetch_array($percent_qry_q11);

            $percent_for_q15 = " SELECT q15,
                                  CONCAT(ROUND(COUNT(CASE q15 WHEN 'Not familiar at all' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS Not_familiar_percent,
                                  CONCAT(ROUND(COUNT(CASE q15 WHEN 'Slightly familiar' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS Slightly_familiar_percent,
                                  CONCAT(ROUND(COUNT(CASE q15 WHEN 'Moderately familiar' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS Moderately_familiar_percent,
                                  CONCAT(ROUND(COUNT(CASE q15 WHEN 'Very familiar' THEN 1 ELSE NULL END) * 100 / (SELECT COUNT(*) FROM evaluation), 0), '%') AS Very_familiar_percent
                                  FROM evaluation WHERE acty_id='$q' ";
            $percent_qry_q15 = mysqli_query($connect, $percent_for_q15);
            $percent_of_q15 = mysqli_fetch_array($percent_qry_q15);

          ?>
          <tr>
            <th style="text-align: center;">Questions</th>
            <th style="text-align: center;">Total</th>
            <th style="text-align: center;">Strongly Disagree</th>
            <th style="text-align: center;">Disagree</th>
            <th style="text-align: center;">Undecided</th>
            <th style="text-align: center;">Agree</th>
            <th style="text-align: center;">Strongly Agree</th>
            <th style="text-align: center;">Total Percentage</th>
            
          </tr>
          <tr>
            <th colspan="" style="text-align: left;">Question 1</th>
            <td><?php echo $total_answers_for_q1['total_response_for_q1'];?></td>
            <td><?php echo $percent_of_q1['SD_percent'];?></td>
            <td><?php echo $percent_of_q1['D_percent'];?></td>
            <td><?php echo $percent_of_q1['U_percent'];?></td>
            <td><?php echo $percent_of_q1['A_percent'];?></td>
            <td><?php echo $percent_of_q1['SA_percent'];?></td>
            <td></td>
          </tr>
          <tr>
          <th colspan="" style="text-align: left;">Question 2</th>
            <td><?php echo $total_answers_for_q2['total_response_for_q2'];?></td>
            <td><?php echo $percent_of_q2['SD_percent'];?></td>
            <td><?php echo $percent_of_q2['D_percent'];?></td>
            <td><?php echo $percent_of_q2['U_percent'];?></td>
            <td><?php echo $percent_of_q2['A_percent'];?></td>
            <td><?php echo $percent_of_q2['SA_percent'];?></td>
            <td></td>
          </tr>
          <tr>
          <th colspan="" style="text-align: left;">Question 3</th>
            <td><?php echo $total_answers_for_q3['total_response_for_q3'];?></td>
            <td><?php echo $percent_of_q3['SD_percent'];?></td>
            <td><?php echo $percent_of_q3['D_percent'];?></td>
            <td><?php echo $percent_of_q3['U_percent'];?></td>
            <td><?php echo $percent_of_q3['A_percent'];?></td>
            <td><?php echo $percent_of_q3['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
          <th colspan="" style="text-align: left;">Question 4</th>
            <td><?php echo $total_answers_for_q4['total_response_for_q4'];?></td>
            <td><?php echo $percent_of_q4['SD_percent'];?></td>
            <td><?php echo $percent_of_q4['D_percent'];?></td>
            <td><?php echo $percent_of_q4['U_percent'];?></td>
            <td><?php echo $percent_of_q4['A_percent'];?></td>
            <td><?php echo $percent_of_q4['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 5</th>
            <td><?php echo $total_answers_for_q5['total_response_for_q5'];?></td>
            <td><?php echo $percent_of_q5['SD_percent'];?></td>
            <td><?php echo $percent_of_q5['D_percent'];?></td>
            <td><?php echo $percent_of_q5['U_percent'];?></td>
            <td><?php echo $percent_of_q5['A_percent'];?></td>
            <td><?php echo $percent_of_q5['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 6</th>
            <td><?php echo $total_answers_for_q6['total_response_for_q6'];?></td>
            <td><?php echo $percent_of_q6['SD_percent'];?></td>
            <td><?php echo $percent_of_q6['D_percent'];?></td>
            <td><?php echo $percent_of_q6['U_percent'];?></td>
            <td><?php echo $percent_of_q6['A_percent'];?></td>
            <td><?php echo $percent_of_q6['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 7</th>
            <td><?php echo $total_answers_for_q7['total_response_for_q7'];?></td>
            <td><?php echo $percent_of_q7['SD_percent'];?></td>
            <td><?php echo $percent_of_q7['D_percent'];?></td>
            <td><?php echo $percent_of_q7['U_percent'];?></td>
            <td><?php echo $percent_of_q7['A_percent'];?></td>
            <td><?php echo $percent_of_q7['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 8</th>
            <td><?php echo $total_answers_for_q8['total_response_for_q8'];?></td>
            <td><?php echo $percent_of_q8['SD_percent'];?></td>
            <td><?php echo $percent_of_q8['D_percent'];?></td>
            <td><?php echo $percent_of_q8['U_percent'];?></td>
            <td><?php echo $percent_of_q8['A_percent'];?></td>
            <td><?php echo $percent_of_q8['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 9</th>
            <td><?php echo $total_answers_for_q9['total_response_for_q9'];?></td>
            <td><?php echo $percent_of_q9['SD_percent'];?></td>
            <td><?php echo $percent_of_q9['D_percent'];?></td>
            <td><?php echo $percent_of_q9['U_percent'];?></td>
            <td><?php echo $percent_of_q9['A_percent'];?></td>
            <td><?php echo $percent_of_q9['SA_percent'];?></td>
            <td></td>
          </tr>

          <tr>
            <th colspan="" style="text-align: left;">Question 10</th>
            <td><?php echo $total_answers_for_q10['total_response_for_q10'];?></td>
            <td><?php echo $percent_of_q10['SD_percent'];?></td>
            <td><?php echo $percent_of_q10['D_percent'];?></td>
            <td><?php echo $percent_of_q10['U_percent'];?></td>
            <td><?php echo $percent_of_q10['A_percent'];?></td>
            <td><?php echo $percent_of_q10['SA_percent'];?></td>
            <td></td>
          </tr>
        </table> <!-- table for each question percentage-->
      </div> <!-- div for each question percentage-->

      <div class="card">
        <table class="subtable">
          <tr><th style="text-align: center;">Question 11 (Overall rating)</th><th style="text-align: center;">Frequency</th><th>Percentage</th></tr>
          <tr>
            <th style="text-align: right;">Very Poor</th>
            <td><?php echo $number_of_counts_q11['One'];?></td> 
            <td><?php echo $percent_of_q11['VP_percent'];?></td>
          </tr>
          <tr>
            <th style="text-align: right;">Poor</th>
            <td><?php echo $number_of_counts_q11['Two'];?></td>
            <td><?php echo $percent_of_q11['P_percent'];?></td>
          </tr>
          <tr>
            <th style="text-align: right;">Okay</th>
            <td><?php echo $number_of_counts_q11['Three'];?></td>
            <td><?php echo $percent_of_q11['O_percent'];?></td>
          </tr>
          <tr>
            <th style="text-align: right;">Good</th>
            <td><?php echo $number_of_counts_q11['Four'];?></td>
            <td><?php echo $percent_of_q11['G_percent'];?></td>
          </tr>
          <tr>
            <th style="text-align: right;">Very Good</th>
            <td><?php echo $number_of_counts_q11['Five'];?></td>
            <td><?php echo $percent_of_q11['VG_percent'];?></td>
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
            <td><?php echo $number_of_counts_q15['NF'];?></td>
            <td><?php echo $percent_of_q15['Not_familiar_percent'];?></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Slightly familiar</th>
            <td><?php echo $number_of_counts_q15['SF'];?></td>
            <td><?php echo $percent_of_q15['Slightly_familiar_percent'];?></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Moderately familiar</th>
            <td><?php echo $number_of_counts_q15['MF'];?></td>
            <td><?php echo $percent_of_q15['Moderately_familiar_percent'];?></td>
          </tr>
          <tr>
            <th colspan="" style="text-align: right;">Very familiar</th>
            <td><?php echo $number_of_counts_q15['VF'];?></td>
            <td><?php echo $percent_of_q15['Very_familiar_percent'];?></td>
          </tr>
          
        </table> <!-- table for each question 15 counts-->
      </div> <!-- div for each question 15 counts-->
    </div> <!-- end of div cards-->
</div> <!-- end div for Summary-->

<div id="Chart" class="tabcontent">
  
  <p>Still in progress.</p>
</div> <!-- end div for Chart-->


</body>
</html>