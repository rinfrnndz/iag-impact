<?php include 'server.php';

 if(isset($_POST['nextBtn'])) {
  $actvtytitle = $_POST['activity'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $dob = $_POST['dob'];
  $agerange = $_POST['age_range'];
  $sgender = $_POST['sgender'];
  $ethncty = $_POST['ethnic'];
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

  $sqlforeval = "INSERT INTO `evaluation`(`acty_id`, `first_name`, `last_name`, `birthday`, `age_range`, `gender`, `ethnicity`, `ct_municipality`, `provnce`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`) 
                VALUES ('$actvtytitle','$firstname','$lastname','$dob','$agerange','$sgender','$ethncty','$ctm','$province','$ques1','$ques2','$ques3','$ques4','$ques5','$ques6','$ques7','$ques8','$ques9','$ques10','$ques11','$ques12','$ques13','$ques14','$ques15' )";
  $qryforeval = mysqli_query($connect, $sqlforeval);

  if($qryforeval) {
    echo "Successful";
  } else {
    echo "Failed! Better luck next time.";
  }

 }
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="shorcut icon" type="image/png" href="favicon-32x32.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>IAG-Evaluation Form</title>
<style>
* {
  box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url("iag.jpg");
    height: 1000px; /* You must set a specified height */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Verdana;
  padding: 40px;
  width: 60%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input[type=text], input[type=date], input[type=email], select {
  width: 100%;
  padding: 14px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=date]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}

/* Mark input boxes that gets an error on validation: */
input.invalid, select.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
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
    height: 90px;
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
</style>
<body>
<nav class="navbar navbar-default" >
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
                <li class="active"><a href="index.php">Home</a></li>
                
                <li><a href="register.php">Registration Form</a></li>
                <li><a href="evaluation.php">Evaluation Form</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<form id="regForm" action="" method="POST">
  <h1>Evaluation Online Form</h1><br/>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Activity Title: <br/>
    <p>
    <select name="activity" oninput="this.className = ''" required>
        <option value="" disabled selected>---Select Activity---</option>
    <?php
        $activities = mysqli_query($connect, "select * from activities ORDER BY `timestamp` DESC");
        while ($row=mysqli_fetch_array($activities)) {
    ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
    <?php 
        }
    ?>
    </select>
    </p>
  </div>
  <div class="tab">
    <label>Personal Info</label><hr>
    <p>First Name<input type="text" placeholder="First name..." oninput="this.className = ''" name="fname"></p>
    <p>Last Name<input type="text" placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
    <p>Birthdate<input type="date" oninput="this.className = ''" name="dob" ></p>
    <p>Age Range
    <select name="age_range" id="age_range" oninput="this.className = '' ">
        <option disabled="disabled" selected="selected">--Select Age Range--</option>
        <option>15 - 25</option>
        <option>26 - 35</option>
        <option>36 - 45</option>
        <option>46 - 55</option>
        <option>56 - 65</option>
        <option>Over 65</option>
      </select>  
    <p>Gender</p>
      <select name="sgender" id="sgender" oninput="this.className = '' " required>
        <option disabled="disabled" selected="selected">--Select Gender--</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    <p>Ethnicity<input type="text"  name="ethnic"></p>
    <p>City/Municipality<input type="text" oninput="this.className = ''" name="ctm" ></p>
    <p>Province<input type="text" oninput="this.className = ''" name="province" ></p>
  </div>
  
  <div class="tab">    
    <p><center>The statements below are answerable by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</center></p>  
    <br/>
    <table class="table" style="width: 95%; margin-left:auto; margin-right: auto;">
    <tr><td><b>Activity Proper</td></tr>
        <tr>
            <th>Questions</th>
            <th>Strongly Disagree (1)</th>
            <th>Disagree (2)</th>
            <th>Undecided (3)</th>
            <th>Agree (4)</th>
            <th>Strongly Agree (5)</th>
        </tr>
        
        <tr>
            <td style="width:55%;">1. The topics discussed are relevant to my role as a member of civil society/as elected official/member of other sectors/etc.</td>
            <th><input type="radio" name="ques1" value="ques1" ></th>
            <th><input type="radio" name="ques1" value="ques2" ></th>
            <th><input type="radio" name="ques1" value="ques3" ></th>
            <th><input type="radio" name="ques1" value="ques4" ></th>
            <th><input type="radio" name="ques1" value="ques5" ></th>
        </tr>
        
        <tr>
            <td style="width:55%;">2. The topics discussed are relevant to the current socio-political realities in the Bangsamoro (ongoing transition, new political framework, etc.)</td>
            <th><input type="radio"  name="ques2" value="1"></th>
            <th><input type="radio"  name="ques2" value="2"></th>
            <th><input type="radio"  name="ques2" value="3"></th>
            <th><input type="radio" name="ques2" value="4"></th>
            <th><input type="radio" name="ques2" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">3. The activity contributed to improving my skills & competence as a member of civil society, a leader in my community/etc.</td>
            <th><input type="radio"  name="ques3" value="1"></th>
            <th><input type="radio"  name="ques3" value="2"></th>
            <th><input type="radio"  name="ques3" value="3"></th>
            <th><input type="radio" name="ques3" value="4"></th>
            <th><input type="radio"  name="ques3" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">4. The activity contributed to enhancing my knowledge and awareness of current social and political developments in the Bangsamoro.</td>
            <th><input type="radio"  name="ques4" value="1"></th>
            <th><input type="radio"  name="ques4" value="2"></th>
            <th><input type="radio"  name="ques4" value="3"></th>
            <th><input type="radio" name="ques4" value="4"></th>
            <th><input type="radio"  name="ques4" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">5. The activity taught me the importance of dialogue between civil society and government leaders.</td>
            <th><input type="radio"  name="ques5" value="1"></th>
            <th><input type="radio" name="ques5" value="2"></th>
            <th><input type="radio"  name="ques5" value="3"></th>
            <th><input type="radio"  name="ques5" value="4"></th>
            <th><input type="radio" name="ques5" value="5"></th>
        </tr>

        <tr>
            <td style="width:55%;">6. The activity underscored the important concepts behind the new Bangsamoro government as well as the need for continued political and civic education.</td>
            <th><input type="radio"  name="ques6" value="1"></th>
            <th><input type="radio"  name="ques6" value="2"></th>
            <th><input type="radio"  name="ques6" value="3"></th>
            <th><input type="radio"  name="ques6" value="4"></th>
            <th><input type="radio"  name="ques6" value="5"></th>
        </tr>
    </table>
  </div>
  <div class="tab">
  <p><center>The statements below are answerable by Strongly Disagree (1), Disagree (2), Undecided (3), Agree (4), or Strongly Agree (5).</center></p>
    <br/>
    <table class="table" style="width: 95%; margin-left:auto; margin-right: auto;">
    <tr><td><b/>Sustainability</td></tr>
        <tr>
            <th>Questions</th>
            <th>Strongly Disagree (1)</th>
            <th>Disagree (2)</th>
            <th>Undecided (3)</th>
            <th>Agree (4)</th>
            <th>Strongly Agree (5)</th>
        </tr>
        <tr>
            <td style="width:55%;">7. I will share my learnings from this activity with members of my community.</td>
            <th><input type="radio"  name="ques7" value="1"></th>
            <th><input type="radio"  name="ques7" value="2"></th>
            <th><input type="radio"  name="ques7" value="3"></th>
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
            <th><input type="radio"  name="ques9" value="1"></th>
            <th><input type="radio"  name="ques9" value="2"></th>
            <th><input type="radio"  name="ques9" value="3"></th>
            <th><input type="radio" name="ques9" value="4"></th>
            <th><input type="radio"  name="ques9" value="5"></th>
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
  </div>
  <div class="tab">
  <label>Overall rating of the program, logistics, secretariat, resource person</label><br/><br/>
    <p>11. How would you rate the event overall?</p><br/>
        <div class="rating">
            <input id="star1" name="ques11" type="radio" value="1" class="radio-btn hide" />
            <label for="star1">☆</label>
            <input id="star2" name="ques11" type="radio" value="2" class="radio-btn hide" />
            <label for="star2">☆</label>
            <input id="star3" name="ques11" type="radio" value="3" class="radio-btn hide" />
            <label for="star3">☆</label>
            <input id="star4" name="ques11" type="radio" value="4" class="radio-btn hide" />
            <label for="star4">☆</label>
            <input id="star5" name="ques11" type="radio" value="5" class="radio-btn hide" />
            <label for="star5">☆</label>
            <div class="clear"></div>
        </div>
    </div>
    <div class="tab">
    <label>Other comments (Please type your answers below.)</label><br/><br/>
        <p>12. Which topics or aspects of the seminar/activity did you find most interesting or useful?</p>
        <input type="text"  name="ques12" id="q12" />
        <p>13. I intend to apply the knowledge gained in this training by doing the following:</p>
        <input type="text"  name="ques13" id="q13" />
        <p>14. To be able to apply the knowledge gained from this training effectively, I would also need the following:</p>
        <input type="text"  name="ques14" id="q14" />
        <br/>
    </div>
    <div class="tab">
    <table class="table" style="width: 95%; margin-left:auto; margin-right: auto;">
        <tr>
            <td></td>
            <th>Not familiar at all</th>
            <th>Slightly familiar</th>
            <th>Moderately familiar</th>
            <th>Very familiar</th>
        </tr>
        <tr>
            <td style="width:55%;">15. Rate your level of familiarity with IAGs' work</td>
            <th><input type="radio"  name="ques15" value="Not familiar at all"></th>
            <th><input type="radio"  name="ques15" value="Slightly familiar"></th>
            <th><input type="radio"  name="ques15" value="Moderately familiar"></th>
            <th><input type="radio"  name="ques15" value="Very familiar"></th>
        </tr>
    </table>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" name="submit" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>