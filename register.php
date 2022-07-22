<?php include 'server.php';
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
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
  background-color: white;
  /*height: 1000px;  You must set a specified height */
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
  border-radius: 15px;
  box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
  background: rgba(255,255,255,1);
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
  /*background-image: linear-gradient(-20deg, #00cdac 0%, #8ddad5 100%);*/
  background-color: #C08081;
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

.registerbtn:disabled {
  background-color: gray;
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
  margin-top: 65px;
  font-size: 13px;
}

</style>
</head>
<body>
<nav class="navbar navbar-default" style="font-family: Calibri; letter-spacing: 1.1px; font-weight: bold;">
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
                
                <li class="active"><a href="register" style="font-size:16px; font-family: Calibri;">Registration Form</a></li>
                <li style="font-size:16px; font-family: Calibri;"><a href="evaluation-form">Evaluation Form</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login" style="font-size:16px; font-family: Calibri;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            </div>
        </div>
</nav>

<form action="" method="POST">
  <div class="container">
  <?php
    $acttitle = $_POST['activity_title'];
    $namef = $_POST['fname'];
    $namel = $_POST['lname'];
    //$birthday = $_POST['dob'];
    $age = $_POST['age_range'];
    $sex = $_POST['sgender'];
    $ethnici = $_POST['ethnic'];
    $ct = $_POST['city_municipality'];
    $prvince = $_POST['prov'];
    $mobile = $_POST['phoneno'];
    $emailad = $_POST['eadd'];
    $attainment = $_POST['educ'];
    $othereducation = $_POST['othereducation'];
    $org = $_POST['office'];
    $postion = $_POST['post'];
    $orgmobile = $_POST['officeno'];
    $orgemail = $_POST['office_email'];

    if(isset($_POST['submit'])) {
      $participant_duplicate = mysqli_query($connect, "SELECT act_id, firstname, lastname, agerange, gender, ethnicity  FROM `participants` WHERE  act_id='$acttitle' && firstname='$namef' && lastname='$namel' && agerange='$age' && gender='$sex' && ethnicity='$ethnici' ");
      
      if(mysqli_num_rows($participant_duplicate) > 0) {
        echo "<div class='alert alert-danger' style='width:100%; margin-left:auto; margin-right:auto;'><strong>Warning!</strong>&nbsp;You're already registered to this activity.</div>";
      } else {
        $register_sql = "INSERT INTO participants (act_id, firstname, lastname, agerange, gender, ethnicity, city_municipality, province, mobileno, email, education, othereduc, org_office, position, org_no, org_email)
                          VALUES ('$acttitle','$namef','$namel','$age','$sex','$ethnici','$ct','$prvince','$mobile','$emailad','$attainment','$othereducation','$org','$postion','$orgmobile','$orgemail')";
        $register = mysqli_query($connect, $register_sql); 
        echo "<div class='alert alert-warning' style='width:100%; margin-left:auto; margin-right:auto;'><strong>Thank you!</strong>&nbsp;You are now registered to this activity.</div>";
      }
    }
  ?>
    <h1>Participant's Registration Form</h1><br>
    <p>Please fill in this form to register.</p>
    <hr>

    <label for="activity"><b>Activity Ttitle</b></label>
    
    <select name="activity_title" required>
      <option value="" disabled='disabled' selected='selected'>Select Activity Title</option>
        <?php
            $activities = mysqli_query($connect, "SELECT * FROM activities WHERE activities.status='1' ORDER BY `id` DESC ");
            while ($row=mysqli_fetch_array($activities)) {
        ?>
            <option id="someTable" value="<?php echo $row['id'];?>"><?php echo $row['activity_title'];?></option>
        <?php 
            }
        ?>
    </select>
    <br><br>
    <p style="text-align:left;font-size:15px;color:orange;">Basic Background Information</p>
    <br/>
    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter your First Name" name="fname" id="fname" required>
    
    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your Last Name" name="lname" id="lname" required>

    <!--<label for="dob"><b>Date of Birth</b></label>
    <input type="date" placeholder="Enter Activity Date" name="dob" id="dob" >-->
      
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
      <select name="sgender" id="gender" required>
        <option disabled="disabled" selected="selected">--Select Gender--</option>
        <option>Male</option>
        <option>Female</option>
      </select>

    <label for="ethnic"><b>Ethnicity</b></label>
    <input type="text" placeholder="Enter your Ethnicity" name="ethnic" id="ethnic" required>
    
    <label for="city_municipality"><b>City/Municipality</b></label>
    <input type="text" placeholder="Enter your City/Municipality" name="city_municipality" id="city_municipality" required>

    <label for="province"><b>Province</b></label>
    <input type="text" placeholder="Enter your Province" name="prov" id="prov" required>
    
    <label for="phoneno"><b>Mobile Number</b></label>
    <input type="text" placeholder="09xxxxxxx" name="phoneno" id="phoneno" required>
    
    <label for="eadd"><b>Email Address</b></label>
    <input type="email" placeholder="example@email.com" name="eadd" id="eadd" required>
    
    <label for="education"><b>Educational Attainment</b></label>
      <select class="form-input" name="educ" id="educ" onchange='CheckColors(this.value);' required>
        <option disabled="disabled" selected="selected">--Choose Option--</option>
        <option>Bachelors/Baccalaureate Degree</option>
        <option>Graduate Degree (Masters Degree)</option>
        <option>Post Graduate (PhD, EdD)</option>
        <option value="OtherEducation">Others</option>
        <input type="text" name="othereducation" id="othereducation" style='display:none;'/>
        <!--script code for other option in Educational Attainment-->
        <script type="text/javascript">
          function CheckColors(val){
          var element=document.getElementById('othereducation');
            if(val=='OtherEducation')
              element.style.display='block';
            else  
              element.style.display='none';
          }
        </script>
      </select>
    <br><br>
    <p style="text-align:left;font-size:15px;color:orange;">Organizational Affiliation</p><br>
    <label for="office"><b>Name of Organization/Office</b></label>
    <input type="text" placeholder="Enter your Organization/Office" name="office" id="office" required>

    <label for="post"><b>Position in Organization/Office</b></label>
    <input type="text" placeholder="Enter your position" name="post" id="post" required>

    <label for="officeno"><b>Contact Number of Organization/Office</b></label>
    <input type="text" placeholder="Enter Organization No., if none simply put NA" name="officeno" id="officeno" required>

    <label for="office_email"><b>Email Address of Organization/Office </b></label>
    <input type="text" placeholder="Enter Organization Email Address., if none simply put NA" name="office_email" id="office_email" required>
    
    <div style="width: 90%; margin-left:auto; margin-right:auto;">
      <p style="text-align:justify;  ">Thank you for participating in this event. By filling-up this form, you consent IAG to collect and process your personal information. The information collected by the Institute for Autonomy and Governance (IAG) is stored and processed for internal and donor monitoring purposes. We take our responsibilities for protecting your data very seriously. Details of how your personal information is processed, is in accordance with the requirements of the Data Privacy Act of 2012.</p>
      <p style="text-align:justify;">Further, you also consent IAG full rights to use the images resulting from the photography/video filming, and any reproductions, or adaptations of the images for publicity, or other purposes to help achieve the organization’s aims. This might include (but is not limited to), the right to use them in their printed and online publicity, social media, press releases and funding applications.</p>
      <input type="radio" name="agree" onclick="disable()" style="">&nbsp;<b>I agree</b>
    </div>
    <br>
    <button type="submit" name="submit" class="registerbtn" id="myRadio" disabled>Register</button>
    <script>
      function disable() {
        document.getElementById("myRadio").disabled = false;
      }
    </script>
    <button type="reset" name="reset" class="clearbtn">Cancel</button>
  </div>
    
</form>

<div class="footer">
  <label style="position: left; font-weight: normal; font-family: calibri; font-size:13px;">
    <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
    Notre Dame University, Notre Dame Avenue, Cotabato City<br/>
    </label>
</div>
</body>
</html>