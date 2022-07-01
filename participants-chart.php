<?php include 'server.php';
    error_reporting(0);
    //ession_start();

    $programadmin = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javasript" src="jquery-3.6.0.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script  src="Chart.min.js"></script>
    </head>
    <title>Bar Charts</title>
<style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url("iag.jpg");
    height: 1000px; /* You must set a specified height */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover; /* Resize the background image to cover the entire container */
    }

    * {
    box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
    padding: 50px;
    background-color: white;
    
    }

    /* Overwrite default styles of hr */
    hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
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
            <li class="active"><a href="account.php">Back to main</a></li>
            <li><a href="#.php">Add Activity</a></li>
            <li><a href="#.php">Evaluation Report</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
        </div>
    </div>
    </nav>

    <div class="container">
        <?php //include 'server.php';

            $qryforthreetables = "SELECT * FROM participants";
            $qrytoshowparticipants = mysqli_query($connect, $qryforthreetables);
            while ($participantsrow = mysqli_fetch_array($qrytoshowparticipants)) {
                $participant[] = $participantsrow['agerange'];
                $activity[] = $participantsrow['gender'];
            }
        ?>
        <canvas id="chartjs_bar"></canvas>
    </div>
    <script type="text/javascript">
        var ctx = document.getElementById("chartja_bar").getContent('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($participant);?>,
                    datasets: [{
                        backgroundColor: [
                            "#F0F8FF",
                            "#A52A2A",
                            "#DC143C",
                            "#B8860B",
                            "#2F4F4F",
                            "#F0E68C",
                            "#DB7093"
                        ],
                        data: <?php echo json_encode($activity);?>,
                    }]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',

                        labels: {
                            fontColor: '#71748d',
                            fontFamily; 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                }
            });
    </script>
</body>
</html>
