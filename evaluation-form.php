<?php include 'server.php';
    error_reporting(0);
    //session_start();
  
?>

<!DOCTYPE html>
<html>
<head>
<title>Evaluation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  /*background-image: url("iag.jpg");*/
   /*height: 1000px; You must set a specified height */
  background-color: white;
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}

img {
  max-width: 100%;
  
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 50px;
  background-color: white;
  margin-left: auto;
  margin-right: auto;
  width: 80%;
  box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
  background: rgba(255,255,255,1);
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
  background-image: linear-gradient(-20deg, #00cdac 0%, #8ddad5 100%);
  font-size: 15px;
  color: white;
  padding: 16px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  width: 49%;
  min-width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

.clearbtn {
  background-color: #bdbdbd;
  font-size: 15px;
  color: white;
  padding: 16px 20px;
  margin: 10px 0;
  border: none;
  cursor: pointer;
  width: 49%;
  min-width: 100%;
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
  background-color: #f1f1f1;
  text-align: center;
}

p {
  font-weight: bold;
  font-size: 14px;
  text-align: center;
}

th {
    text-align: center;
}

.rating {
    width: 100px;
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    position: relative;
    
}

.rating > label {
    float: right;
    display: inline;
    padding: 0;
    margin: 0;
    position: relative;
    width: 1.1em;
    cursor: pointer;
    color: #000;
}

.rating > label:hover,
.rating > label:hover ~ label,
.rating > input.radio-btn:checked ~ label {
    color: transparent;
}

.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating > input.radio-btn:checked ~ label:before,
.rating > input.radio-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 0;
    color: #FFD700;
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
  margin-top: 80px;
  font-size: 13px;
}

</style>
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
                <li><a href="index" style="font-size:16px; font-family: Calibri;">Home</a></li>
                
                <li><a href="register" style="font-size:16px; font-family: Calibri;">Registration Form</a></li>
                <li class="active" style="font-size:16px; font-family: Calibri;"><a href="evaluation-form">Evaluation Form</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            </div>
        </div>
    </nav>
<?php
    
  ?>
<div class="container">
  <?php
    if(isset($_POST['submit'])) {
      $actvtytitle =  $_POST['activity']; //mysqli_real_escape_string($connect,
        $firstname = $_POST['fname']; //mysqli_real_escape_string($connect,);
        $lastname = $_POST['lname']; //mysqli_real_escape_string($connect,);
        //$dob = $_POST['birthdate']; //mysqli_real_escape_string($connect,);
        $agerange = $_POST['age_range']; //mysqli_real_escape_string($connect,);
        $sgender = $_POST['sgender']; //mysqli_real_escape_string($connect,);
        $ethncty = $_POST['ethnic']; //mysqli_real_escape_string($connect,);
        $ctm = $_POST['ctm'];
        $province = $_POST['province'];
        $ques1 = $_POST['ques1'];
        $ques2 = $_POST['ques2'];
        $ques3 = $_POST['ques3'];
        $ques4 = $_POST['ques4'];
        $ques5 = $_POST['ques5'];
        $ques6 = $_POST['ques6'];
        $ques7 = $_POST['ques7'];
        $ques8 = $_POST['ques8'];
        $ques9 = $_POST['ques9'];
        $ques10 = $_POST['ques10'];
        $ques11 = $_POST['ques11'];
        $ques12 = $_POST['ques12'];
        $ques13 = $_POST['ques13'];
        $ques14 = $_POST['ques14'];
        $ques15 = $_POST['ques15'];
  
          /*$insertforeval = "INSERT INTO evaluation (`acty_id`, `first_name`, `last_name`, `birthday`, `age_range`, `gender`, `ethnicity`, `ct_municipality`, `provnce`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`) 
          VALUES ('$actvtytitle','$firstname','$lastname','$dob','$agerange','$sgender','$ethncty','$ctm','$province','$ques1','$ques2','$ques3','$ques4','$ques5','$ques6','$ques7','$ques8','$ques9','$ques10','$ques11','$ques12','$ques13','$ques14','$ques15')";*/
          
        $insertforeval = 'INSERT INTO `evaluation` (`acty_id`, `first_name`, `last_name`, `age_range`, `gender`, `ethnicity`, `ct_municipality`, `provnce`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`) 
          VALUES ("'.$actvtytitle.'","'.$firstname.'","'.$lastname.'","'.$agerange.'","'.$sgender.'","'.$ethncty.'","'.$ctm.'","'.$province.'","'.$ques1.'","'.$ques2.'","'.$ques3.'","'.$ques4.'","'.$ques5.'","'.$ques6.'","'.$ques7.'","'.$ques8.'","'.$ques9.'","'.$ques10.'","'.$ques11.'","'.$ques12.'","'.$ques13.'","'.$ques14.'","'.$ques15.'")';
        $qryforeval = mysqli_query($connect, $insertforeval);
        //echo "$qryforeval";
        if($qryforeval) {
          echo "<div class='alert alert-warning' style='width:100%; margin-left:auto; margin-right:auto;'><strong>Thank you</strong>&nbsp;for your honest feedback.</div>";
          } else {
            echo "<div class='alert alert-danger' style='width:100%; margin-left:auto; margin-right:auto;'><strong>Warning!</strong>&nbsp;Something went wrong.</div>";
        }
    }
  ?>
  <form action="" method="POST">
  <h1>Evaluation Online Form</h1><br/>
    <p>Please fill in this form to give feedback.</p>
    <hr>

    <label for="activity"><b>Activity Ttitle</b></label>
    <select name="activity" id="activity" required>
      <option value="" disabled='disabled' selected='selected'>Select Activity Title</option>
        <?php
            $activities = mysqli_query($connect, "SELECT * FROM activities WHERE activities.status='1' ORDER BY `id` DESC ");
            while ($row=mysqli_fetch_array($activities)) {
        ?>
            <option value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
        <?php 
            }
        ?>
    </select>
    <br><br>
    <p style="text-align:left;font-size:15px;color:orange;">Personal Info</p>
    <br/>
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter your First Name" name="fname" id="fname" required>
    
    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your Last Name" name="lname" id="lname" required>

    <!--<label for="dob"><b>Date of Birth</b></label>
    <input type="date" placeholder="Enter Activity Date" name="birthdate" id="birthdate" >-->
      
    <br>
    <label for="age"><b>Age Range</b></label>
      <select name="age_range" id="age_range" >
        <option disabled="disabled" selected="selected">--Select Age Range--</option>
        <option>15 - 25</option>
        <option>26 - 35</option>
        <option>36 - 45</option>
        <option>46 - 55</option>
        <option>56 - 65</option>
        <option>Over 65</option>
      </select>
    
    <label for="gender"><b>Gender</b></label>
      <select name="sgender" id="sgender" required>
        <option disabled="disabled" selected="selected">--Select Gender--</option>
        <option>Male</option>
        <option>Female</option>
      </select>

    <label for="ethnic"><b>Ethnicity</b></label>
    <input type="text" placeholder="Enter your Ethnicity" name="ethnic" id="ethnic" required>
    
    <label for="city_municipality"><b>City/Municipality</b></label>
    <input type="text" placeholder="Enter your City/Municipality" name="ctm" id="ctm" required>

    <label for="province"><b>Province</b></label>
    <input type="text" placeholder="Enter your Province" name="province" id="province" required>
    
    <hr>
    
    <p style="font-size:16px;text-align:center;">The statements below are answerable <br> by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</p>  
    <br/>
    <table class="table-responsive" style="min-width: 100%; display: flex; display: inherit; overflow-x: auto; margin-left:auto; margin-right: auto; background-color:white; ">
    <tr style="text-align:left;font-size:15px;color:orange;"><td><b>Activity Proper</td></tr>
        <tr>
            <th>Questions</th>
            <th>Strongly Disagree <br> (1)</th>
            <th>Disagree <br>(2)</th>
            <th>Undecided <br>(3)</th>
            <th>Agree <br>(4)</th>
            <th>Strongly Agree <br> (5)</th>
        </tr>
        
        <tr>
            <td style="width:55%;">1. The topics discussed are relevant to my role as a member of civil society/as elected official/member of other sectors/etc.</td>
            <th><input type="radio" name="ques1" id="ques1" value="1" ></th>
            <th><input type="radio" name="ques1" id="ques1" value="2" ></th>
            <th><input type="radio" name="ques1" id="ques1" value="3" ></th>
            <th><input type="radio" name="ques1" id="ques1" value="4" ></th>
            <th><input type="radio" name="ques1" id="ques1" value="5" ></th>
        </tr>
        
        <tr>
            <td style="width:55%;">2. The topics discussed are relevant to the current socio-political realities in the Bangsamoro (ongoing transition, new political framework, etc.)</td>
            <th><input type="radio" name="ques2" id="ques2" value="1"></th>
            <th><input type="radio" name="ques2" id="ques2" value="2"></th>
            <th><input type="radio" name="ques2" id="ques2" value="3"></th>
            <th><input type="radio" name="ques2" id="ques2" value="4"></th>
            <th><input type="radio" name="ques2" id="ques2" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">3. The activity contributed to improving my skills & competence as a member of civil society, a leader in my community/etc.</td>
            <th><input type="radio" name="ques3" id="ques3" value="1"></th>
            <th><input type="radio" name="ques3" id="ques3" value="2"></th>
            <th><input type="radio" name="ques3" id="ques3" value="3"></th>
            <th><input type="radio" name="ques3" id="ques3" value="4"></th>
            <th><input type="radio" name="ques3" id="ques3" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">4. The activity contributed to enhancing my knowledge and awareness of current social and political developments in the Bangsamoro.</td>
            <th><input type="radio" name="ques4" id="ques4" value="1"></th>
            <th><input type="radio" name="ques4" id="ques4" value="2"></th>
            <th><input type="radio" name="ques4" id="ques4" value="3"></th>
            <th><input type="radio" name="ques4" id="ques4" value="4"></th>
            <th><input type="radio" name="ques4" id="ques4" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">5. The activity taught me the importance of dialogue between civil society and government leaders.</td>
            <th><input type="radio" name="ques5" id="ques5" value="1"></th>
            <th><input type="radio" name="ques5" id="ques5" value="2"></th>
            <th><input type="radio" name="ques5" id="ques5" value="3"></th>
            <th><input type="radio" name="ques5" id="ques5" value="4"></th>
            <th><input type="radio" name="ques5" id="ques5" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">6. The activity underscored the important concepts behind the new Bangsamoro government as well as the need for continued political and civic education.</td>
            <th><input type="radio" name="ques6" id="ques6" value="1"></th>
            <th><input type="radio" name="ques6" id="ques6" value="2"></th>
            <th><input type="radio" name="ques6" id="ques6" value="3"></th>
            <th><input type="radio" name="ques6" id="ques6" value="4"></th>
            <th><input type="radio" name="ques6" id="ques6" value="5"></th>
        </tr>
    </table>

  <!--<p><center>The statements below are answerable by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</center></p>-->
    <hr>
    <table class="table-responsive" style="width: 100%; display: flex; display: inherit; overflow-x: auto; margin-left:auto; margin-right: auto; background-color:white;">
    <tr style="text-align:left;font-size:15px;color:orange;"><td><b>Sustainability</td></tr>
        <tr>
            <th>Questions</th>
            <th>Strongly <br> Disagree <br> (1)</th>
            <th>Disagree <br>(2)</th>
            <th>Undecided<br> (3)</th>
            <th>Agree <br>(4)</th>
            <th>Strongly <br> Agree <br> (5)</th>
        </tr>
        <tr>
            <td style="width:55%;">7. I will share my learnings from this activity with members of my community.</td>
            <th><input type="radio" name="ques7" value="1"></th>
            <th><input type="radio" name="ques7" value="2"></th>
            <th><input type="radio" name="ques7" value="3"></th>
            <th><input type="radio" name="ques7" value="4"></th>
            <th><input type="radio" name="ques7" value="5"></th>
        </tr>
        
        <tr>
            <td style="width:55%;">8. I hope to be invited again to similar activities in the future.</td>
            <th><input type="radio"  name="ques8" value="1"></th>
            <th><input type="radio"  name="ques8" value="2"></th>
            <th><input type="radio"  name="ques8" value="3"></th>
            <th><input type="radio"  name="ques8" value="4"></th>
            <th><input type="radio"  name="ques8" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">9. I will continue to work with civil society groups and other sectors within my area and seek future engagements with them.</td>
            <th><input type="radio" name="ques9" value="1"></th>
            <th><input type="radio" name="ques9" value="2"></th>
            <th><input type="radio" name="ques9" value="3"></th>
            <th><input type="radio" name="ques9" value="4"></th>
            <th><input type="radio" name="ques9" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">10. I will communicate and collaborate with other participants that I met during this activity.</td>
            <th><input type="radio" name="ques10" value="1"></th>
            <th><input type="radio" name="ques10" value="2"></th>
            <th><input type="radio" name="ques10" value="3"></th>
            <th><input type="radio" name="ques10" value="4"></th>
            <th><input type="radio" name="ques10" value="5"></th>
        </tr>
    </table>
    <hr>
  <label style="text-align:left;font-size:15px;color:orange;">Overall rating of the program, logistics, secretariat, resource person</label><br/><br/>
    <p style="text-align:left;font-weight: normal;">11. How would you rate the activity overall?</p><br/>
        <div class="rating">
          <input id="star1" name="ques11" type="radio" value="Very Good" class="radio-btn hide" /><label for="star1">☆</label>
          <input id="star2" name="ques11" type="radio" value="Good " class="radio-btn hide" /><label for="star2">☆</label>
          <input id="star3" name="ques11" type="radio" value="Okay" class="radio-btn hide" /><label for="star3">☆</label>
          <input id="star4" name="ques11" type="radio" value="Poor" class="radio-btn hide" /><label for="star4">☆</label>
          <input id="star5" name="ques11" type="radio" value="Very Poor" class="radio-btn hide" /><label for="star5">☆</label>
          <div class="clear"></div>
        </div><br>
    <hr>
    <label style="text-align:left;font-size:15px;color:orange;">Other comments (Please type your answers below.)</label><br/><br/>
        <p style="text-align:left;font-weight: normal;">12. Which topics or aspects of the activity did you find most interesting or useful?</p>
        <input type="text"  name="ques12" id="ques12" />
        <p style="text-align:left;font-weight: normal;">13. I intend to apply the knowledge gained in this activity by doing the following:</p>
        <input type="text"  name="ques13" id="ques13" />
        <p style="text-align:left;font-weight: normal;">14. To be able to apply the knowledge gained from this activity effectively, I would also need the following:</p>
        <input type="text"  name="ques14" id="ques14" />
        <br/>

    <table class="table-responsive" style="width: 100%; display: flex; display: inherit; overflow-x: auto; display: block; margin-left:auto; margin-right: auto; background-color:white;">
        <tr>
            <td></td>
            <th>Not familiar<br> at all</th>
            <th>Slightly<br>familiar</th>
            <th>Moderately<br> familiar</th>
            <th>Very familiar</th>
        </tr>
        <tr>
            <td style="width:55%;">15. Rate your level of familiarity with Institute for Autonomy and Governance (IAG) and its work</td>
            <th><input type="radio"  name="ques15" value="Not familiar at all"></th>
            <th><input type="radio"  name="ques15" value="Slightly familiar"></th>
            <th><input type="radio"  name="ques15" value="Moderately familiar"></th>
            <th><input type="radio"  name="ques15" value="Very familiar"></th>
        </tr>
    </table>
   
    <hr>
    <button type="submit" name="submit" class="registerbtn" id="myRadio">Submit</button>
    <button type="reset" name="reset" class="clearbtn">Cancel</button>
  </form>
</div>

<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; font-size:13px;">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
    </label>
</div>  
</body>
</html>