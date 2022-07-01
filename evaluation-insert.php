<?php include 'server.php';

    /*define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','impactt');

    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);*/

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>IAG-Evaluation Form</title>
</head>
<body>
    <div class='alert alert-warning' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Thank you</strong>&nbsp;for your honest feedback!</div>
    <?php
    } else {
    ?>
        <div class='alert alert-danger' style='width:80%; margin-left:10%; margin-right:10%;'><strong>Warning!</strong>&nbsp;Something went wrong.</div>
    <?php
    } 
    ?> 
</body>
</html>
