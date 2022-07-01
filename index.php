<!DOCTYPE html>
<html lang="en">
<head>
<title>IAG Impact</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
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

    .container {
        width: 80%;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
        background: rgba(255,255,255,1);
        height: 50%;
        border-radius: 15px;
        padding: 25px;
        margin: 12px auto;
        opacity: 1;
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
    
</head>
<body >
<nav class="navbar navbar-default" style="font-family: calibri; letter-spacing: 1.1px; font-weight: bold;">
    <div class="container-fluid" style="flex-grow: 1;">
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
                <li><a href="evaluation-form.php">Evaluation Form</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<div class="container" style="background-image: url('online.png'); background-position: center; background-size: auto 600px; background-repeat: no-repeat;">

</div>

<div class="footer">
    <label style="position: left; font-weight: normal; font-family: calibri; ">
        <b>&copy; 2022 <a href="https://iag.org.ph/">Institute for Autonomy and Governance</a></b><br/>
        Notre Dame University, Notre Dame Avenue, Cotabato City<br/>    
    </label>
</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>